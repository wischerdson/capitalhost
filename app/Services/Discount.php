<?php

namespace App\Services;

use App\User;

class Discount
{
	private $user;

	private $discounts = [
		['value' => 0, 'period' => 0],
		['value' => 5, 'period' => 30],
		['value' => 10, 'period' => 60],
		['value' => 20, 'period' => 180],
		['value' => 30, 'period' => 365],
	];

	public function __construct(User $user)
	{
		$user->loadMissing('plan');
		$this->user = $user;
	}

	public function getPeriodByAmount($amount)
	{
		return $this->getDiscountByAmount($amount)['period'];
	}

	public function getPercentByAmount($amount)
	{
		return $this->getDiscountByAmount($amount)['value'];
	}

	// Result in hours
	public function getTotalPeriod($amount = null)
	{
		$amount = $amount ?? $this->user->balance;
		$discountTimeRemaining = $this->discountTimeRemaining()/60/60;
		$planAmountPerHour = $this->getPlanAmount()/24;
		$a = $planAmountPerHour*$discountTimeRemaining;
		$b = $amount - $a;

		if ($b <= 0) {
			return $amount/$planAmountPerHour;
		}
		$c = $b/($this->user->plan->amount/24);

		return $c + $discountTimeRemaining;
	}

	// Plan amount with discount
	public function getPlanAmount()
	{
		$planAmount = $this->user->plan->amount;

		if (!$this->discountTimeRemaining())
			return $planAmount;
		
		return $planAmount * (1 - $this->user->discount/100);
	}

	// Result in seconds
	public function discountTimeRemaining()
	{
		$remaining = $this->user->discount_expire_at - now()->unix();
		return max(0, $remaining);
	}

	private function getDiscountByAmount($amount)
	{
		$result = [];
		$planAmount = $this->user->plan->amount;

		foreach ($this->discounts as $discount) {
			$a = $discount['period']*$planAmount;
			$b = $a*$discount['value']/100;
			$minAmount = ceil($a - $b);

			if ($amount >= $minAmount) {
				$result['value'] = $discount['value'];
				$result['period'] = $discount['period'];
			}
		}

		return $result;
	}
	
	public function getUser()
	{
		return $this->user;
	}
}