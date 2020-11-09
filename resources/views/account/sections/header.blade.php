
<section-header></section-header>

@push('templates')
	<template id="template_section_header">
		<div id="section_topbar">
			<nav class="topbar desktop">
				<div class="left">
					<div class="balance">
						<div class="ruble-icon">@include('account.svg.ruble-circle')</div>
						<div>Баланс аккаунта</div>
						@php
							$statusColor = $user->balance <= 0 ? 'danger' : 'success';
						@endphp
						<div class="badge {{ $statusColor }}">{{ $user->balance() }}₽</div>
						<a href="{{ route('account.payment.index') }}" class="btn primary small">Пополнить баланс</a>
					</div>
				</div>
				<div class="right">
					<div class="notifications">
						@include('account.svg.notifications')
						<div class="dot"></div>
					</div>
					
					<div class="profile" @mouseover="showPopup = true" @mouseout="showPopup = false">
						<div class="brand">
							<div class="brand-logo">
								@if ($user->logo)
									<div class="image" style="background-image: url({{ $user->logo }});"></div>
								@else
									<div class="brand-name">{{ mb_substr($user->company, 0, 1) }}</div>
								@endif
								<div class="dot {{ $statusColor }}"></div>
							</div>

							<div class="text">
								<div class="company-name">{{ $user->company }}</div>
								<div class="seo">
									{{ $user->last_name }} {{ mb_substr($user->first_name, 0, 1) }}.
								</div>
							</div>
						</div>
						<transition name="fade">
							<div class="popup" v-show="showPopup">
								<ul>
									<li>
										<a href="#">
											<div class="icon">@include('account.svg.user')</div>
											<span>Профиль</span>
										</a>
									</li>
									<li>
										<a href="{{ route('account.settings.index') }}">
											<div class="icon">@include('account.svg.settings')</div>
											<span>Настройки</span>
										</a>
									</li>
									<hr>
									<li>
										<a href="{{ route('guest.auth.logout') }}">
											<div class="icon">@include('account.svg.exit')</div>
											<span>Выйти</span>
										</a>
									</li>
								</ul>
							</div>
						</transition>
					</div>
				</div>
			</nav>
			<nav class="topbar mobile">
				<div class="left">
					<a href="{{ route('account.home') }}" class="logo">
						<img src="{{ asset('image/capitalhost.png') }}" alt="hostcapital logo">
					</a>
				</div>
				<div class="right">
					<button class="btn notifications">@include('svg.bell')</button>
					<button @click="$store.state.mobileSidebar_isOpen = !$store.getters.mobileSidebar_isOpen" class="btn menu-bread">@include('svg.menu')</button>
				</div>
			</nav>
		</div>
	</template>
@endpush
