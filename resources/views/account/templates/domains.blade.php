@extends($layout)

@section('content')
	<domains-page></domains-page>
@endsection

@push('templates')
	<template id="template__domains">
		<div id="template_domains">
			<div class="header">
				<div class="pretitle">{{ $user->company }}</div>
				<h1>Домены</h1>
			</div>

			<div class="container">
				<div class="white-block description">
					<p>Если вам необходимо зарегистрировать уже добавленный ранее домен, обратитесь в нашу <a @click="" class="btn link">поддержку</a>.<br>Домен может быть добавлен только на один аккаунт, повторное его добавление завершится ошибкой.</p>
					<p>Для регистрации свободного домена укажите в поле ниже желаемый домен.</p>
				</div>
				<div class="domains-search-block">
					<form method="GET" action="{{ route('account.domains.check') }}" @submit.prevent="checkDomain">
						<label class="todo" for="form_domainsSearch">Регистрация домена</label>
						<div class="form-group" :success="domainAvailable">
							<div class="search-icon">@include('svg.search')</div>
							<input
								id="form_domainsSearch"
								type="text"
								name="domain"
								class="domains-search form-control"
								placeholder="Введите желаемый домен"
								v-model.lazy="domain"
							>
							<button type="submit" class="btn light small" v-if="!wait">Проверить</button>
							<button type="submit" class="btn light small" v-if="wait"><div class="loader"></div></button>
						</div>
					</form>

					<div v-if="domainCheckResult">

						<div v-if="domainCheckResult.status == 'success'">
							<div class="white-block server-response success" v-show="domainCheckResult.available">
								<div class="head">
									<div>Домен доступен</div>
									<div class="support-suggestion">Для получения помощи с покупкой обращайтесь в <a href="#">чат с поддержкой</a></div>
								</div>
								<div class="body">
									<div class="row">
										<div class="availability-message"><span>@{{ domainCheckResult.domain }}</span> доступен</div>
										<div class="right">
											<div class="pricing">
												<div class="currency">₽</div>
												<div class="value">@{{ domainCheckResult.reg_price }}</div>
												<div class="per">/год</div>
											</div>
											<button
												class="btn primary small"
												@click="desireToRegister = true"
											>Зарегистрировать</button>
										</div>
									</div>
								</div>
							</div>

							<div class="white-block server-response fail" v-show="!domainCheckResult.available">
								<div class="head">
									<div>Домен занят</div>
									<div class="support-suggestion">Для получения помощи с покупкой обращайтесь в <a href="#">чат с поддержкой</a></div>
								</div>
								<div class="body">
									<div class="domain-unavailable"><span>@{{ domainCheckResult.domain }}</span> занят</div>
								</div>
							</div>
						</div>

						<div v-if="domainCheckResult.status == 'error'">
							<div class="white-block server-response fail">
								<div class="head">
									<div>Произошла ошибка</div>
									<div></div>
								</div>
								<div class="body">
									<div class="fail-message" v-if="domainCheckResult.code == 13039">Домен @{{ domainCheckResult.request_data.domain }} уже находится на Вашем аккаунте</div>
									<div class="fail-message" v-else-if="domainCheckResult.code == 13036">Доменная зона не обслуживается или домен @{{ domainCheckResult.request_data.domain }} имеет неверный формат</div>
									<div class="fail-message" v-else>@{{ fail }}</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				@if ($user->domains->isNotEmpty())
				<div class="acquired-domains white-block">
					<ul class="domain-list">
						@foreach ($user->domains as $domain)
						<li class="domain-item">
							<a class="btn link" href="https://{{ $domain->name }}" target="_blank">{{ $domain->name }}</a>
						</li>
						@endforeach
					</ul>
				</div>
				@endif
			</div>

			@include('account.sections.modals.contact-details')
			@include('account.sections.modals.buying-domain-confirmation')
			{{-- 
			
			<div class="container">
				<div class="domains-search-block">
					

					
				</div>

				
			</div>

			@include('account.sections.modals.contact-details')
			 --}}
		</div>
	</template>
@endpush


@php
	$jsArray = '';
	foreach ($user->persons as $person) {
		$jsArray .= "{
			id: $person->id,
			full_name: '$person->full_name'
		},";
	}
@endphp

@push('data')
	persons: [{!! $jsArray !!}],
@endpush

{{-- @if ($contactDetailsExists)
	@push('vue-data')
		@json([
			'contactDetails' => [
				'passport' => $user->contactDetails->passport_series.' '.$user->contactDetails->passport_number.' '.$user->contactDetails->passport_department.' '.$user->contactDetails->passport_issue_date,
				'fullName' => $user->contactDetails->full_name
			]
		])
	@endpush
@endif --}}
