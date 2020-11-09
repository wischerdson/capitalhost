@extends($layout)

@section('content')
	<ssl-page></ssl-page>
@endsection

@push('templates')
	<template id="template__ssl">
		<div id="template_domains" class="ssl">
			
			<div class="header">
				<div class="pretitle">{{ $user->company_name }}</div>
				<h1>Сертификат безопасности SSL</h1>
			</div>
			
			<div class="container">
				@if (!$user->purchasedSsl)
				<div class="white-block description">
					<p>Популярный поисковик изменил правила ранжирования: теперь сайты, использующие HTTPS-соединение, поднимаются выше в результатах поиска. Став обладателем SSL-сертификата, Вы сможете не только надежно защитить свой сайт, но и привлечь намного больше пользователей.</p>
				</div>
				@endif

				<div class="domains-search-block">
					<div class="white-block server-response success ssl-list">
						<div class="head">
							<div></div>
							<div class="support-suggestion">Для получения помощи с покупкой обращайтесь в <a href="#">чат с поддержкой</a></div>
						</div>
						<div class="body">
							@if ($user->purchasedSsl->isEmpty())
								<div class="row" v-for="sslDetails in ssl">
									<div class="availability-message"><span>@{{ sslDetails.name }}</span> @{{ sslDetails.description }}</div>
									<div class="right">
										<div class="pricing">
											<div class="currency">₽</div>
											<div class="value">@{{ sslDetails.amount }}</div>
											<div class="per">/год</div>
										</div>
											<button
												class="btn primary small"
												@click="buy(sslDetails)"
											>Приобрести</button>
									</div>
								</div>
							@else
								@foreach($user->purchasedSsl as $purchasedSsl)
									<div class="row">
										<div class="availability-message">Вы приобрели SSL-сертификат <span>{{ $purchasedSsl->ssl->name }}</span></div>
									</div>
								@endforeach
							@endif
						</div>
					</div>
				</div>
			</div>



			<transition name="fade" duration="500">
				<div class="modal buying-domain-confirmation-modal" v-if="selectedSSL">
					<div class="modal__inside">
						<div class="modal__blackout"></div>
						<div class="modal__close-area" @click="selectedSSL = null"></div>
						<div class="modal__tile">
							<button role="button" class="close" @click="selectedSSL = null">@include('svg.x')</button>
							<div class="modal__header">
								<div class="title">Подтвердите приобретение</div>
								<div class="subtitle">Внимательно проверьте данные и подтвердите покупку SSL-сертификата.</div>
							</div>
							<div class="modal__body">
								<table class="table table-striped">
									<tbody>
										<tr>
											<td>Тип SSL-сертификата</td>
											<td>@{{ selectedSSL.name }}</td>
										</tr>
										<tr>
											<td>Сумма</td>
											<td>@{{ selectedSSL.amount }}₽</td>
										</tr>
										<tr>
											<td>Текущий баланс</td>
											<td>{{ $user->balance() }}₽</td>
										</tr>
										<tr>
											<td>Номер лицевого счета</td>
											<td>{{ $user->id }}</td>
										</tr>
									</tbody>
								</table>
								<form
									id="form_confirmation"
									@submit.prevent="confirm"
									action="{{ route('account.ssl.buy') }}"
								>
									<div v-if="confirmationResult && confirmationResult.status == 'error'">
										<div
											class="fail-message"
											v-if="confirmationResult.code == 13037"
										>Недостаточно средств для совершения операции</div>
										<div
											class="fail-message"
											v-else
										>@{{ confirmationResult.message }}</div>
									</div>
									
									<div class="row">
										<div class="attention">
											После нажатия на кнопку "Оплатить", с баланса аккаунта снимется сумма в размере стоимости выбранного SSL-сертификата. Убедитесь в том, что текущий баланс превышает указанную стоимость, в противном случае Ваш сайт заморозится из-за нехватки средств.
										</div>
										<input type="hidden" name="ssl_id" v-model="selectedSSL.id">
										<div style="text-align: right;">
											<button type="submit" class="btn primary">
												<div class="loader" v-if="form_confirmation__wait"></div>
												<span>Оплатить</span>
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</transition>
		</div>
	</template>
@endpush


@php
	$jsData = '';
	foreach ($ssl as $sslDetails) {
		$jsData .= "{
			id: $sslDetails->id,
			name: '$sslDetails->name',
			description: '$sslDetails->description',
			amount: '$sslDetails->amount'
		},";
	}
@endphp

@push('data')
	ssl: [{!! $jsData !!}],
@endpush