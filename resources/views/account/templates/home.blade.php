@extends($layout)

@section('content')
	<home-page></home-page>
@endsection

@push('templates')
	<template id="template__home">
		<div id="template_home">
			<div class="container">
				<div class="header">
					<div class="pretitle">{{ $user->company }}</div>
					<h1>Панель управления</h1>
				</div>

				<div class="white-block remaining">
					<div>
						{{ smart_ending($daysLeft, ['Остался', 'Осталось', 'Осталось']) }}
						<span class="weight-500">{{ $daysLeft }}</span>
						{{ smart_ending($daysLeft, ['день', 'дня', 'дней']) }}
					</div>
					<a href="{{ route('account.payment.index') }}" class="btn light small">Продлить</a>
				</div>

				@if (!$user->selected_plan_id)
				<div class="plans">
					
					<div class="plans-switch white-block">
						<div class="marker" :class="`mode-${switchMode}`"></div>
						@foreach($plansCategories as $category)
							<button
								class="plans-switch__item"
								data-id="{{ $category->id }}"
								:class="{active: switchMode === {{ $category->id }}}"
								@click="switchMode = {{ $category->id }}"
							>{{ $category->name }}</button>
						@endforeach
					</div>

					@foreach($plansCategories as $category)
						<ul class="plans__list" v-if="switchMode === {{ $category->id }}" key="plansCategory_{{ $category->id }}">
							@foreach($category->plans as $plan)
								<li class="plans__item white-block">
									<div class="plan-name"><div class="badge primary">{{ $plan->name }}</div></div>
									<div class="plan-price">
										<div class="currency">₽</div>
										<div class="value">{{ $plan->amount }}</div>
										<div class="per">/день</div>
									</div>
									<div class="text-muted center" style="margin-top: 5px">{!! $plan->description !!}</div>
									<ul class="advantage-list">
										@foreach($plan->advantages as $advantage)
											<li class="advantage-item @if($advantage->yes) yes @endif">{{ $advantage->text }}</li>
										@endforeach
									</ul>
									<button
										@click="selectPlan('{{ route('account.settings.select-plan', ['plan' => $plan->id]) }}', {{ $plan->id }})"
										class="btn primary"
									>
										<span v-if="!selectedPlan.wait || selectedPlan.planId != {{ $plan->id }}">Заказать</span>
										<span v-if="selectedPlan.wait && selectedPlan.planId == {{ $plan->id }}" class="loader"></span>
									</button>
								</li>
							@endforeach
						</ul>
					@endforeach
				</div>
				@endif
			</div>

			@if (!$user->selected_plan_id)
				<transition name="fade" duration="500">
					<div class="modal selecting-plan-success-modal" v-if="selectedPlan.successModal">
						<div class="modal__inside">
							<div class="modal__blackout"></div>
							<div class="modal__close-area" @click="reloadPage"></div>
							<div class="modal__tile">
								<button role="button" class="close" @click="reloadPage">@include('svg.x')</button>
								<div class="modal__body">
									<div class="gif-container">
										<img src="{{ asset('/image/gif/server.gif') }}">
									</div>
									<div class="text">
										<p class="main-text">Подключение хостинга <br>по тарифу <span class="text-primary">@{{ selectedPlan.details.name }}</span> было <br>успешно выполненно</p>
										<p class="secondary-text">Для того, чтобы активировать хостинг, <br>перейдите на страницу <a :href="selectedPlan.result.redirect">Оплаты</a> и далее <br>пополните баланс</p>
									</div>
									<div class="button">
										<a :href="selectedPlan.result.redirect" class="btn primary">Пополнить баланс</a>
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