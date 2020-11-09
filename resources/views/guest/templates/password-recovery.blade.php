@extends($layout)

@section('content')
	<password-recovery-page></password-recovery-page>
@endsection

@push('templates')
	<template id="template__passwordRecovery">
		<div id="template_passwordRecovery">
			<div class="container">
				<h1>Сброс пароля</h1>
				<div class="subtitle text-muted">Введите Ваш e-mail, чтобы мы cмогли восстановить пароль</div>
				<div style="margin-top: 20px; text-align: center; color: green" v-if="showTip">
					Мы выслали письмо на указанный e-mail. Перейдите по ссылке в письме и создайте новый пароль. (Если Вы не видите письмо во вкладке "Входящие", проверьте раздел "Спам")
				</div>
				<form
					@submit.prevent="resetPassword"
					action="{{ route('guest.auth.password-recovery.recovery-request') }}"
					id="form_recoveryPassword"
				>
					<div class="form-group">
						<label for="formInput_passwordRecovery_email">E-mail</label>
						<input
							class="form-control"
							:invalid="$v.form.passwordRecovery.email.$error"
							type="text"
							name="email"
							id="formInput_passwordRecovery_email"
							placeholder="example@mail.com"
							@blur="$v.form.passwordRecovery.email.$touch"
							v-model="form.passwordRecovery.email"
						>
						<div v-if="$v.form.passwordRecovery.email.$dirty">
							<div
								class="invalid-feedback"
								v-if="!$v.form.passwordRecovery.email.required"
							>Пожалуйста, укажите Ваш e-mail</div>
							<div
								class="invalid-feedback"
								v-if="!$v.form.passwordRecovery.email.email"
							>E-mail некорректен</div>
						</div>
					</div>
					<center v-if="form.passwordRecovery.__error == 13032" class="invalid-feedback">Пользователя с таким e-mail не существует</center>
					<button type="submit" class="btn primary">
						<div v-show="form.passwordRecovery.__wait" class="loader"></div>
						<span v-show="!form.passwordRecovery.__wait">Восстановить</span>
						<span v-show="form.passwordRecovery.__wait">Подождите...</span>
					</button>
				</form>
			</div>
		</div>
	</template>
@endpush