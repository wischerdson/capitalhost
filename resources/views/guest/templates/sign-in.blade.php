@extends($layout)

@section('content')
	<sign-in-page></sign-in-page>
@endsection

@push('templates')
	<template id="template__sign_in">
		<div id="template_sign_in">
			<div class="container">
				<div class="grid">
					<div class="left" data-aos="fade-right">
						<div class="title">
							<h1>Вход</h1>
							<div class="text-muted">панель управления</div>
						</div>
						<form action="{{ route('guest.auth.sign-in') }}" method="POST" @submit.prevent="sendForm">
							<div class="form-group">
								<label for="signInForm_email">E-mail</label>
								<input
									v-model="email"
									type="email"
									class="form-control"
									id="signInForm_email"
									name="email"
									placeholder="Ваша почта"
								>
							</div>
							<div class="form-group">
								<label class="inline" for="signInForm_password">
									<span>Пароль</span>
									<a href="{{ route('guest.auth.password-recovery.index') }}" class="text-muted forgot">Забыли пароль?</a>
								</label>
								<input
									v-model="password"
									type="password"
									class="form-control"
									id="signInForm_password"
									name="password"
									placeholder="Введите пароль"
								>
							</div>
							<div style="text-align: center; color: red; margin-bottom: 20px;" v-if="errorCode == 13031">E-mail или пароль введены неверно</div>
							<div class="bottom">
								<button type="submit" class="btn primary">Войти</button>
								<div class="sign-up text-muted">
									У вас еще нет аккаунта?
									<a href="{{ route('guest.auth.sign-up.index') }}">Регистрация</a>.
								</div>
							</div>
						</form>
					</div>
					<div class="right" data-aos="fade-left" data-aos-delay="200">
						<div class="skewed-image"><img src="https://landkit.goodthemes.co/assets/img/screenshots/desktop/dashkit.jpg" alt="" class="screenshot"></div>
					</div>
				</div>
			</div>
		</div>
	</template>
@endpush
