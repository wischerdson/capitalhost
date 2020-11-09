@extends($layout)

@section('content')
	<password-change-page></password-change-page>
@endsection

@push('templates')
	<template id="template__changePassword">
		<div id="template_passwordRecovery">
			<div class="container">
				<h1>Новый пароль</h1>
				<form
					@submit.prevent="changePassword"
					action="{{ $changePasswordUrl }}"
					id="form_changePassword"
				>
					<div class="form-group">
						<label for="formInput_changePassword_password">Новый пароль</label>
						<input
							class="form-control"
							:invalid="$v.form.changePassword.password.$error"
							type="password"
							name="password"
							id="formInput_changePassword_password"
							@blur="$v.form.changePassword.password.$touch"
							v-model="form.changePassword.password"
						>
						<div v-if="$v.form.changePassword.password.$dirty">
							<div
								class="invalid-feedback"
								v-if="!$v.form.changePassword.password.required"
							>Пожалуйста, придумайте новый пароль</div>
							<div
								class="invalid-feedback"
								v-if="!$v.form.changePassword.password.minLength"
							>Пароль должен иметь минимум 6 символов</div>
						</div>
					</div>
					<div class="form-group">
						<label for="formInput_changePassword_confirmPassword">Подтвердите пароль</label>
						<input
							class="form-control"
							:invalid="$v.form.changePassword.confirmPassword.$error"
							type="password"
							name="confirm_password"
							id="formInput_changePassword_confirmPassword"
							@blur="$v.form.changePassword.confirmPassword.$touch"
							v-model="form.changePassword.confirmPassword"
						>
						<div v-if="$v.form.changePassword.confirmPassword.$dirty">
							<div
								class="invalid-feedback"
								v-if="!$v.form.changePassword.confirmPassword.sameAsPassword"
							>Пароли не совпадают</div>
						</div>
					</div>
					<button style="width: 100%" type="submit" class="btn primary">
						<div v-show="form.changePassword.__wait" class="loader"></div>
						<span v-show="!form.changePassword.__wait">Восстановить</span>
						<span v-show="form.changePassword.__wait">Подождите...</span>
					</button>
				</form>
			</div>
		</div>
	</template>
@endpush