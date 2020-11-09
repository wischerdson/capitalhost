<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use Phois\Whois\Whois;
use Auth;
use App\User;
use App\Domain;
use App\DnsZone;
use App\ViewedDomain;
use App\BalanceChangesHistory;

class DomainsController extends Controller
{
	public function index()
	{
		$this->template = 'domains';
		$this->title = 'Домены - CapitalHost';

		$this->user->load('persons');

		return $this->output();
	}

	public function check(Request $request) 
	{
		$domainName = $request->input('domain');
		$domainName = strtolower($domainName);

		$whois = $this->checkWhois($domainName);
		$dnsZone = $this->checkDnsZone($whois, $domainName);

		$viewedDomain = ViewedDomain::where('domain', $domainName)->where('user_id', $this->user->id)->first();


		if (!$viewedDomain) {
			$viewedDomain = new ViewedDomain;
			$viewedDomain->domain = $domainName;
			$viewedDomain->available = $whois->isAvailable();
			$this->user->viewedDomains()->save($viewedDomain);
		} else {
			$viewedDomain->times_checked++;

			if ($viewedDomain->viewed_at < now()->subHours(1)->unix()) {
				$viewedDomain->available = $whois->isAvailable();
				$viewedDomain->viewed_at = now()->unix();
			}
			$viewedDomain->save();
		}

		return [
			'status' => 'success',
			'domain' => $domainName,
			'available' => $viewedDomain->available,
			'reg_price' => $dnsZone->registration_amount,
			'renew_price' => $dnsZone->renew_amount,
		];
	}

	public function buy(Request $request)
	{
		$domainName = $request->input('domain');
		$domainName = strtolower($domainName);

		$whois = $this->checkWhois($domainName);
		$dnsZone = $this->checkDnsZone($whois, $domainName);

		if ($this->user->balance() < $dnsZone->registration_amount)
			throw new \App\Exceptions\InsufficientFundsException();

		$personId = $request->input('person_id');

		$this->user->load(['persons' => function ($query) use ($personId) {
			$query->find($personId);
		}]);

		if ($this->user->persons->isEmpty())
			throw new \App\Exceptions\PersonNotFoundException();

		$domain = new Domain;
		$domain->name = $domainName;
		$domain->dns_zone_id = $dnsZone->id;
		$domain->person_id = $personId;
		$this->user->domains()->save($domain);

		$this->user->balance -= $dnsZone->registration_amount;
		$this->user->save();

		$balanceHistory = new BalanceChangesHistory;
		$balanceHistory->description = 'Регистрация домена '.$domainName;
		$balanceHistory->amount = -$dnsZone->registration_amount;
		$this->user->balanceHistory()->save($balanceHistory);

		return [
			'status' => 'success'
		];
	}

	private function checkWhois($domainName)
	{
		$domainAscii = idn_to_ascii($domainName, 0, INTL_IDNA_VARIANT_UTS46);

		try {
			$whois = new Whois($domainAscii);
		} catch (\Exception $e) {
			throw new \App\Exceptions\InvalidDomainException();
		}

		if (!$whois->isValid())
			throw new \App\Exceptions\InvalidDomainException();

		return $whois;
	}

	private function checkDnsZone($whois, $domainName)
	{
		$dnsZone = DnsZone::where('tld_ascii', $whois->getTLDs())->first();
		if (!$dnsZone)
			throw new \App\Exceptions\InvalidDomainException();

		$this->user->load(['domains' => function ($query) use ($domainName) {
			$query->where('name', $domainName);
		}]);
		if ($this->user->domains->isNotEmpty())
			throw new \App\Exceptions\DomainAlreadyAddedException();


		return $dnsZone;
	}
}
