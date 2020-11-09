
<section-header></section-header>

@push('templates')
	<template id="template_section_header">
		<header id="section_header" :class="{'menu-is-open': showMenu}">
			<div class="dunce" ref="dunce"></div>
			<div class="desktop container large">
				<div class="logo">
					<a href="{{ route('guest.home') }}">
						<img src="{{ asset('/image/capitalhost.png') }}" alt="" width="150">
					</a>
				</div>
				<nav class="navbar">
					<ul class="link-list">
						<li class="link-list__item">
							<div class="link-list__link">
								<span>Виртуальный хостинг</span>
								@include('svg.chevron-down')
							</div>
							<div class="submenu">
								<ul class="link-list">
									<li class="link-list__item">
										<a href="#" class="link-list__link">
											<div class="icon">@include('guest.icons.header-menu.shared-hosting')</div>
											<div class="text">
												<span class="link-title">Веб-хостинг</span>
												<span class="link-description">Круглосуточные сервера для ваших проектов.</span>
											</div>
										</a>
									</li>
									<li class="link-list__item">
										<a href="#" class="link-list__link">
											<div class="icon">@include('guest.icons.header-menu.email-hosting')</div>
											<div class="text">
												<span class="link-title">Email хостинг</span>
												<span class="link-description">Продвижение бизнеса с каждым письмом.</span>
											</div>
										</a>
									</li>
									<li class="link-list__item">
										<a href="#" class="link-list__link">
											<div class="icon">@include('guest.icons.header-menu.tilda')</div>
											<div class="text">
												<span class="link-title">Хостинг для Тильды</span>
												<span class="link-description">Оптимизированные решения для Tilda.</span>
											</div>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="link-list__item">
							<a href="#" class="link-list__link">VDS</a>
						</li>
						<li class="link-list__item">
							<div class="link-list__link">
								<span>Домены</span>
								@include('svg.chevron-down')
							</div>
							<div class="submenu">
								<ul class="link-list">
									<li class="link-list__item">
										<a href="#" class="link-list__link">
											<div class="icon">@include('guest.icons.header-menu.domain-checker')</div>
											<div class="text">
												<span class="link-title">Приобрести домен</span>
												<span class="link-description">Найдите идеальный домен.</span>
											</div>
										</a>
									</li>
									<li class="link-list__item">
										<a href="#" class="link-list__link">
											<div class="icon">@include('guest.icons.header-menu.domain-transfer')</div>
											<div class="text">
												<span class="link-title">Перенести домен</span>
												<span class="link-description">Хотите перенести домен в CapitalHost?</span>
											</div>
										</a>
									</li>
									<li class="link-list__item">
										<a href="#" class="link-list__link">
											<div class="icon">@include('guest.icons.header-menu.whois-database')</div>
											<div class="text">
												<span class="link-title">База данных WHOIS</span>
												<span class="link-description">Инструмент поиска информации WHOIS.</span>
											</div>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="link-list__item">
							<a href="#" class="link-list__link">SSL</a>
						</li>
						<li class="link-list__item">
							<a href="#" class="link-list__link">Тарифы</a>
						</li>
					</ul>
				</nav>
				<div class="right">
					<a href="{{ route('account.home') }}" class="btn auth-btn primary">Вход</a>
					<a href="{{ route('guest.auth.sign-up.index') }}" class="btn auth-btn primary-soft">Регистрация</a>
					<transition>
						<button
							key="open"
							v-if="!showMenu"
							@click="showMenu = true"
							class="btn bread-btn"
						>@include('svg.list')</button>

						<button
							key="close"
							v-if="showMenu"
							@click="showMenu = false"
							class="btn bread-btn"
						>@include('svg.x')</button>
					</transition>
				</div>
			</div>
			<transition duration="500">
				<div class="mobile-menu" v-if="showMenu">
					<nav class="navbar">
						<ul class="link-list">
							<li class="link-list__item">
								<a href="#" class="link-list__link">
									<div class="icon">@include('guest.icons.header-menu.shared-hosting')</div>
									<span>Общий веб-хостинг</span>
								</a>
							</li>
							<li class="link-list__item">
								<a href="#" class="link-list__link">
									<div class="icon">@include('guest.icons.header-menu.cloud-hosting')</div>
									<span>Облачный хостинг</span>
								</a>
							</li>
							<li class="link-list__item">
								<a href="#" class="link-list__link">
									<div class="icon">@include('guest.icons.header-menu.email-hosting')</div>
									<span>Хостинг почты</span>
								</a>
							</li>
							<li class="link-list__item">
								<a href="#" class="link-list__link">
									<div class="icon">@include('guest.icons.header-menu.tilda')</div>
									<span>Хостинг для Tilda</span>
								</a>
							</li>
							<li class="link-list__item">
								<a href="#" class="link-list__link">
									<div class="icon">@include('guest.icons.header-menu.vps-hosting')</div>
									<span>VPS-хостинг</span>
								</a>
							</li>
							<li class="link-list__item">
								<a href="#" class="link-list__link">
									<div class="icon">@include('guest.icons.header-menu.dollar')</div>
									<span>Тарифы</span>
								</a>
							</li>
							<li class="link-list__item">
								<a href="#" class="link-list__link">
									<div class="icon">@include('guest.icons.header-menu.domain-checker')</div>
									<span>Проверка домена</span>
								</a>
							</li>
							<li class="link-list__item">
								<a href="#" class="link-list__link">
									<div class="icon">@include('guest.icons.header-menu.whois-database')</div>
									<span>База данных WHOIS</span>
								</a>
							</li>
							<li class="link-list__item">
								<a href="#" class="link-list__link">
									<div class="icon">@include('guest.icons.header-menu.domain-transfer')</div>
									<span>Перенос домена</span>
								</a>
							</li>
						</ul>
						<div class="bottom">
							<div class="auth-buttons">
								<a href="{{ route('account.home') }}" class="btn primary">Вход</a>
								<a href="{{ route('guest.auth.sign-up.index') }}" class="btn primary-soft">Регистрация</a>
							</div>
						</div>
					</nav>
				</div>
			</transition>
		</header>
	</template>
@endpush