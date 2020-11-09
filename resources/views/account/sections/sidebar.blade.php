
<section-sidebar></section-sidebar>

@push('templates')
	<template id="template_section_sidebar">
		<div id="section_sidebar">
			<nav class="navbar desktop">
				<div class="top">
					<div class="capitalup-logo">
						<img src="{{ asset('image/capitalhost.png') }}" alt="hostcapital logo">
					</div>
				
					<ul class="navbar-nav">
						<li class="nav-item">
							<a href="{{ route('account.home') }}" class="nav-link">
								<div class="nav-icon">@include('account.svg.home')</div>
								<span>Панель управления</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('account.payment.index') }}" class="nav-link">
								<div class="nav-icon">@include('account.svg.hosting')</div>
								<span>Оплата хостинга</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<div class="nav-icon">@include('account.svg.group')</div>
								<span>Персоны и организации</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('account.domains.index') }}" class="nav-link">
								<div class="nav-icon">@include('account.svg.domains')</div>
								<span>Домены</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('account.ssl.index') }}" class="nav-link">
								<div class="nav-icon">@include('account.svg.lock')</div>
								<span>SSL-сертификат</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<div class="nav-icon">@include('account.svg.folder')</div>
								<span>Файловый менеджер</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<div class="nav-icon">@include('account.svg.mail')</div>
								<span>Почта</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('account.finance.index') }}" class="nav-link">
								<div class="nav-icon">@include('account.svg.billing')</div>
								<span>Финансы</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<div class="nav-icon">@include('account.svg.analytics')</div>
								<span>Аналитика</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('account.support.index') }}" class="nav-link">
								<div class="nav-icon">@include('account.svg.chat')</div>
								<span>Поддержка</span>
							</a>
						</li>
					</ul>
				</div>
				<div class="bottom">
					<button class="btn light small" @click="openChat">
						@include('account.svg.chat')
						<span>Чат с поддержкой</span>
					</button>
					<div class="phone"><a href="tel:89156357451" class="text-muted">8 (915) 635 74 51</a></div>
				</div>
			</nav>

			<transition name="fade">
				<nav class="navbar mobile" v-show="$store.getters.mobileSidebar_isOpen">
					@php
						$statusColor = $user->balance <= 0 ? 'danger' : 'success';
					@endphp
					
					<div class="top">
						<div class="left brand">
							<div class="brand-logo" style="background-color: #e1e1e1">
								<div class="brand-name">{{ mb_substr($user->company, 0, 1) }}</div>
								<div class="dot {{ $statusColor }}"></div>
							</div>
							<div class="text">
								<div class="company-name">{{ $user->company }}</div>
								<div class="seo">
									{{ $user->last_name }} {{ mb_substr($user->first_name, 0, 1) }}.
								</div>
							</div>
						</div>
						<div class="right balance">
							<div class="ruble-icon">@include('account.svg.ruble-circle')</div>
							<div>Баланс</div>
							<div class="badge {{ $statusColor }}">{{ $user->balance() }}₽</div>
						</div>
					</div>
					<a href="{{ route('account.payment.index') }}" class="btn primary">Пополнить баланс</a>
					<ul class="navbar-nav">
						<li class="nav-item">
							<a href="{{ route('account.home') }}" class="nav-link">
								<div class="nav-icon">@include('account.svg.home')</div>
								<span>Панель управления</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('account.payment.index') }}" class="nav-link">
								<div class="nav-icon">@include('account.svg.hosting')</div>
								<span>Оплата хостинга</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('account.domains.index') }}" class="nav-link">
								<div class="nav-icon">@include('account.svg.domains')</div>
								<span>Домены</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('account.ssl.index') }}" class="nav-link">
								<div class="nav-icon">@include('account.svg.lock')</div>
								<span>SSL-сертификат</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<div class="nav-icon">@include('account.svg.mail')</div>
								<span>Почта</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('account.finance.index') }}" class="nav-link">
								<div class="nav-icon">@include('account.svg.billing')</div>
								<span>Финансы</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<div class="nav-icon">@include('account.svg.analytics')</div>
								<span>Аналитика</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('account.support.index') }}" class="nav-link">
								<div class="nav-icon">@include('account.svg.chat')</div>
								<span>Поддержка</span>
							</a>
						</li>
						<hr>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<div class="nav-icon">@include('account.svg.user')</div>
								<span>Профиль</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('account.settings.index') }}" class="nav-link">
								<div class="nav-icon">@include('account.svg.settings')</div>
								<span>Настройки</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('guest.auth.logout') }}" class="nav-link">
								<div class="nav-icon">@include('account.svg.exit')</div>
								<span>Выйти</span>
							</a>
						</li>
					</ul>
				</nav>
			</transition>
		</div>
	</template>
@endpush
