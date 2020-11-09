@extends($layout)

@section('content')
	<pay-page></pay-page>
@endsection

@push('templates')
	<template id="template__pay">
		<div id="template_pay">
			<div class="container-fluid">
				<div class="header">
					<div class="pretitle">{{ $user->company_name }}</div>
					<h1>Оплата тарифа</h1>
				</div>
				
				<transition :name="`step-switching-${animation}`">
					<div class="step step-1 container" v-show="step === 1">
						<div class="block">
							<div class="block-title">Выберите способ оплаты</div>
							<ul class="payment-methods__list">
								<li class="payment-methods__item">
									<input
										v-model="paymentMethod"
										type="radio"
										name="payment-method"
										value="BankCard_1"
										id="payment_method_1"
									>
									<label for="payment_method_1" class="white-block link">
										<img src="{{ asset('image/payments/bank-card.svg') }}" alt="Bank card">
									</label>
								</li>
								<li class="payment-methods__item">
									<input
										v-model="paymentMethod"
										type="radio"
										name="payment-method"
										value="ApplePay"
										id="payment_method_6"
									>
									<label for="payment_method_6" class="white-block link">
										<img src="{{ asset('image/payments/apple-pay.svg') }}" alt="ApplePay logo">
									</label>
								</li>
								<li class="payment-methods__item">
									<input
										v-model="paymentMethod"
										type="radio"
										name="payment-method"
										value="SamsungPay"
										id="payment_method_7"
									>
									<label for="payment_method_7" class="white-block link">
										<img src="{{ asset('image/payments/samsung-pay.svg') }}" alt="SumsungPay logo">
									</label>
								</li>
								<li class="payment-methods__item">
									<input
										v-model="paymentMethod"
										type="radio"
										name="payment-method"
										value="BankCard_2"
										id="payment_method_2"
									>
									<label for="payment_method_2" class="white-block link">
										<img src="{{ asset('image/payments/sberbank.webp') }}" alt="Sberbank logo">
									</label>
								</li>
								<li class="payment-methods__item">
									<input
										v-model="paymentMethod"
										type="radio"
										name="payment-method"
										value="BankCard_3"
										id="payment_method_3"
									>
									<label for="payment_method_3" class="white-block link">
										<img style="width: 75%" src="{{ asset('image/payments/vtb.svg') }}" alt="ВТБ logo">
									</label>
								</li>
								<li class="payment-methods__item">
									<input
										v-model="paymentMethod"
										type="radio"
										name="payment-method"
										value="BankCard_4"
										id="payment_method_4"
									>
									<label for="payment_method_4" class="white-block link">
										<img style="width: 60%" src="{{ asset('image/payments/tinkoff.webp') }}" alt="Tinkoff logo">
									</label>
								</li>
								<li class="payment-methods__item">
									<input
										v-model="paymentMethod"
										type="radio"
										name="payment-method"
										value="BankCard_5"
										id="payment_method_5"
									>
									<label for="payment_method_5" class="white-block link">
										<img src="{{ asset('image/payments/alfa-bank.svg') }}" alt="Alfa bank logo">
									</label>
								</li>
								<li class="payment-methods__item">
									<input
										v-model="paymentMethod"
										type="radio"
										name="payment-method"
										value="QiwiWallet"
										id="payment_method_8"
									>
									<label for="payment_method_8" class="white-block link">
										<img src="{{ asset('image/payments/qiwi.png') }}" alt="Qiwi logo">
									</label>
								</li>
								<li class="payment-methods__item">
									<input
										v-model="paymentMethod"
										type="radio"
										name="payment-method"
										value="BankCard_6"
										id="payment_method_9"
									>
									<label for="payment_method_9" class="white-block link">
										<img src="{{ asset('image/payments/open.png') }}" alt="Otkryitie logo">
									</label>
								</li>
								<li class="payment-methods__item">
									<input
										v-model="paymentMethod"
										type="radio"
										name="payment-method"
										value="BankCard_7"
										id="payment_method_10"
									>
									<label for="payment_method_10" class="white-block link">
										<img src="{{ asset('image/payments/PSB.png') }}" alt="PSB logo">
									</label>
								</li>
								<li class="payment-methods__item">
									<input
										v-model="paymentMethod"
										type="radio"
										name="payment-method"
										value="AlfaBank"
										id="payment_method_11"
									>
									<label for="payment_method_11" class="white-block link">
										<img src="{{ asset('image/payments/alfa-click.png') }}" alt="Alfa click logo" style="width:90%;">
									</label>
								</li>
								<li class="payment-methods__item">
									<input
										v-model="paymentMethod"
										type="radio"
										name="payment-method"
										value="BankCard_8"
										id="payment_method_12"
									>
									<label for="payment_method_12" class="white-block link">
										<img src="{{ asset('image/payments/trust.webp') }}" alt="Trust logo">
									</label>
								</li>
								<li class="payment-methods__item">
									<input
										v-model="paymentMethod"
										type="radio"
										name="payment-method"
										value="BankCard_9"
										id="payment_method_13"
									>
									<label for="payment_method_13" class="white-block link">
										<img src="{{ asset('image/payments/sovkombank.png') }}" alt="Sovkombank logo">
									</label>
								</li>
							</ul>
						</div>
					</div>
				</transition>

				<transition :name="`step-switching-${animation}`">
					<div class="step step-2 container" v-show="step === 2">
						<div class="top-row">
							<div class="block amount">
								<div class="block-title">Укажите сумму пополнения счета</div>
								<div class="input-group white-block">
									<div class="total-label">Итого:</div>
									<input
										v-model="amount"
										@blur="blurListener_amountInput"
										@focus="focusListener_amountInput"
										@input="paymentPeriod = null"
										type="text"
										class="form-control"
										id="payment_amount"
									>
									@if ($user->allow_discounts)
									<div class="saving-badge badge success" v-if="!amountInputFocused && discount">Экономия: @{{ saving }}₽</div>
									@endif
								</div>
							</div>
						</div>
						
						<div class="block payment-period">
							<div class="block-title">Или выберите период на который вы хотите оплатить услуги</div>
							<ul class="payment-period__list">
								<li class="payment-period__item">
									<label for="payment_amount" class="white-block link form-check-label">
										<span class="period-value">N</span>
										<span class="period-subject">своя сумма</span>
									</label>
								</li>
								<li class="payment-period__item" v-for="(period, key) in periods" v-if="period.period != 0">
									<input
										v-model="paymentPeriod"
										type="radio"
										name="payment_period"
										:value="period"
										:id="`payment_period_${key}`"
										class="form-check-input"
									>
									<label :for="`payment_period_${key}`" class="white-block link form-check-label">
										<div class="check-body">@include('svg.check-bold')</div>
										<span class="period-value">@{{ period.period }}</span>
										<span class="period-subject">дней</span>
										@if ($user->allow_discounts)
										<div class="sale" v-if="period.discount">-@{{ period.discount }}%</div>
										<span class="benefit" v-if="period.discount">
											<span class="price">@{{ period.price }}</span>
											<span class="compare-at-price">@{{ period.compareAtPrice }}</span>
										</span>
										@endif
									</label>
								</li>
							</ul>
						</div>
						<div class="step-controls">
							<button class="btn link come-back" @click="step--">
								<span class="arrow-left">@include('svg.chevron-left')</span>
								<span>Выбрать другой способ оплаты</span>
							</button>
							<button v-if="amountInt" class="btn primary next" @click="showModal">Подтвердить</button>
						</div>
					</div>
				</transition>

				<transition :name="`step-switching-${animation}`">
					<div class="step step-3 container" v-show="step === 3">
						<div class="block">
							<div class="block-title">Подтвердите платеж</div>
							<div class="white-block">
								<table class="table table-striped">
									<tbody>
										<tr>
											<td>Сумма платежа</td>
											<td>@{{ amountInt }}₽</td>
										</tr>
										<tr>
											<td>На срок</td>
											<td>@{{ term }} @{{ $smartEnding(term, ['день', 'дня', 'дней']) }}</td>
										</tr>
										<tr>
											<td>По тарифу</td>
											<td>{{ $user->plan->amount }}₽ /день</td>
										</tr>
										@if ($user->allow_discounts)
											<tr>
												<td>По тарифу с учетом скидки</td>
												<td>@{{ Math.floor(planAmountWithDiscount*100)/100 }}₽ /день</td>
											</tr>
											<tr>
												<td>Скидка действительна</td>
												<td>@{{ findPeriod().period }} @{{ $smartEnding(findPeriod().period, ['день', 'дня', 'дней']) }}</td>
											</tr>
										@endif
										<tr>
											<td>Текущий баланс</td>
											<td>{{ $user->balance() }}₽</td>
										</tr>
										<tr>
											<td>Осталось дней</td>
											<td>{{ floor($user->freeze_in/24) }}</td>
										</tr>
										<tr>
											<td>Номер лицевого счета</td>
											<td>{{ $user->id }}</td>
										</tr>
										<tr>
											<td>Тарифный план</td>
											<td>{{ $user->plan->name }}</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="step-controls">
							<button class="btn link come-back" @click="step--">
								<span class="arrow-left">@include('svg.chevron-left')</span>
								<span>Перейти на предыдущий шаг</span>
							</button>
							<button class="btn primary next" @click="registerPayment">Перейти к оплате</button>
						</div>
					</div>
				</transition>
			</div>

			@if ($user->allow_discounts)
			<transition name="fade" duration="500">
				<div class="modal sale-notification-modal" v-if="saleNotificationModal">
					<div class="modal__inside">
						<div class="modal__blackout"></div>
						<div class="modal__close-area" @click="saleNotificationModal = false"></div>
						<div class="modal__tile">
							<button role="button" class="close" @click="saleNotificationModal = false">@include('svg.x')</button>
							<div class="modal__body">
								<div class="alert-icon">@include('svg.alert-circle-fill')</div>
								<div class="text">
									<p><span class="text-primary">Внимание!</span> Вы уверены, что хотите пополнить счет на <span class="text-primary">@{{ term }} @{{ $smartEnding(term, ['день', 'дня', 'дней']) }}</span> и сэкономить <span class="text-primary">@{{ saving }} @{{ $smartEnding(saving, ['рубль', 'рубля', 'рублей']) }}</span>, будет выгоднее, если Вы пополните счет на более длительный период и сэкономите до <span class="text-primary">30%</span>.</p>
									<p>Обратите внимание, что эта скидка действует только при <span class="text-primary">первом пополнении</span> счета в течение выбранного периода, для повторных пополнений счета скидка будет <span class="text-primary">недействительна</span>.</p>
								</div>

								<div class="buttons">
									<button class="btn light" @click="saleNotificationModal = false">Купить выгодней</button>
									<button class="btn primary" @click="step++; saleNotificationModal = false">Оплатить на @{{ term }} @{{ $smartEnding(term, ['день', 'дня', 'дней']) }}</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</transition>
			@endif
		</div>
	</template>
@endpush


@push('data')
	planAmount: {{ $user->plan->amount }},
	createPaymentURI: '{{ route('account.payment.create') }}',
	allowDiscounts: {{ $user->allow_discounts }}
@endpush