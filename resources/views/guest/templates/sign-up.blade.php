@extends($layout)

@section('content')
	<sign-up-page></sign-up-page>
@endsection

@push('templates')
	<template id="template__sign_up">
		<div id="template_sign_up">
			<div class="container">
				<div class="title">
					<h1>Регистрация</h1>
					<div class="text-muted">панель управления</div>
				</div>
				
				<form action="{{ route('guest.auth.sign-up.store') }}" method="POST" @submit.prevent="sendForm">

					<div class="top">
						<div class="left">
							<div class="form-group">
								<label for="signUpForm_firstName">Имя</label>
								<input
									@blur="$v.firstName.$touch()"
									:invalid="$v.firstName.$error"
									v-model="firstName"
									name="first_name"
									type="text"
									class="form-control"
									id="signUpForm_firstName"
									placeholder="Ваше имя"
								>
								<div v-if="!$v.firstName.required && $v.firstName.$error" class="invalid-feedback">Вы забыли указать имя</div>
								<div v-if="!$v.firstName.minLength && $v.firstName.$error" class="invalid-feedback">Имя слишком короткое</div>
								<div v-if="!$v.firstName.maxLength && $v.firstName.$error" class="invalid-feedback">Имя слишком длинное</div>
							</div>
							<div class="form-group">
								<label for="signUpForm_lastName">Фамилия</label>
								<input
									@blur="$v.lastName.$touch()"
									:invalid="$v.lastName.$error"
									v-model="lastName"
									name="last_name"
									type="text"
									class="form-control"
									id="signUpForm_lastName"
									placeholder="Ваша фамилия"
								>
								<div v-if="!$v.lastName.required && $v.lastName.$error" class="invalid-feedback">Вы забыли указать фамилию</div>
							</div>
							<div class="form-group">
								<label for="signUpForm_companyName">Название компании</label>
								<input
									@blur="$v.companyName.$touch()"
									:invalid="$v.companyName.$error"
									v-model="companyName"
									name="company"
									type="text"
									class="form-control"
									id="signUpForm_companyName"
									placeholder="Пример: CapitalUp."
								>
								<div v-if="!$v.companyName.required && $v.companyName.$error" class="invalid-feedback">Вы забыли указать название компании</div>
								<div v-if="signUpForm.__error === 13033" class="invalid-feedback">Название компании уже используется</div>
							</div>
							<div class="form-group">
								<label for="signUpForm_email">E-mail</label>
								<input
									@blur="$v.email.$touch()"
									:invalid="$v.email.$error"
									v-model="email"
									name="email"
									type="email"
									class="form-control"
									id="signUpForm_email"
									placeholder="Ваша почта"
								>
								<div v-if="!$v.email.required && $v.email.$error" class="invalid-feedback">Вы забыли указать e-mail</div>
								<div v-if="!$v.email.email && $v.email.$error" class="invalid-feedback">E-mail имеет неверный формат</div>
								<div v-if="signUpForm.__error === 13030" class="invalid-feedback">Такой E-mail уже зарегистрирован</div>
								
							</div>
						</div>
						<div class="right">
							<div class="form-group">
								<label
									for="signUpForm_logo"
									:class="['logo-wrapper', 'square', {'preview': previewLogo}]"
									:style="`background-image: url(${logoBase64})`"
								>
									<div class="inner" v-show="!previewLogo">
										<div class="icon">@include('svg.photo-camera')</div>
										<span>Добавьте логотип<br>Вашей компании</span>
									</div>
								</label>
								<input @change="uploadLogo" type="file" name="logo" id="signUpForm_logo">
							</div>
						</div>
					</div>
					<div class="bottom">
						<div class="row column-2">
							<div class="form-group">
								<label for="signUpForm_password">Пароль</label>
								<input
									@blur="$v.password.$touch()"
									:invalid="$v.password.$error"
									v-model="password"
									name="password"
									type="password"
									class="form-control"
									id="signUpForm_password"
									placeholder="Введите пароль"
								>
								<div v-if="!$v.password.required && $v.password.$error" class="invalid-feedback">Вы забыли установить пароль</div>
								<div v-if="!$v.password.minLength && $v.password.$error" class="invalid-feedback">Пароль должен иметь как минимум @{{$v.password.$params.minLength.min}} символов</div>
							</div>
							<div class="form-group">
								<label for="signUpForm_confirmPassword">Подтвердите пароль</label>
								<input
									@blur="$v.confirmPassword.$touch()"
									:invalid="$v.confirmPassword.$error"
									v-model="confirmPassword"
									name="confirm_password"
									type="password"
									class="form-control"
									id="signUpForm_confirmPassword"
									placeholder="Повторите пароль"
								>
								<div v-if="!$v.confirmPassword.sameAs && $v.confirmPassword.$error" class="invalid-feedback">Пароли не совпадают</div>
							</div>
						</div>

						<div v-if="unacceptable" class="unacceptable">Введенные Вами данные не приемлемы!</div>
					
						<div class="row submit-wrapper">
							<button type="submit" class="btn primary">Продолжить</button>
							<div class="entry-policy">
								<p>
									Нажимая на кнопку «Продолжить», Вы даете компании «CapitalHost» согласие на
									<a target="_blank" href="/documents/privacy-policy.pdf">обработку своих персональных данных</a> и принимаете 
									<a target="_blank" href="/documents/conditions.pdf">Правила пользования</a>.
								</p>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</template>
@endpush
