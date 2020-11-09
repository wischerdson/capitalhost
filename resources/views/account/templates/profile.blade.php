<template id="template__profile">
	<div id="template_profile">
		<div class="header">
			<div class="pretitle">{{ $user->company_name }}</div>
			<h1>Профиль</h1>
		</div>
		<div class="container">
			<form action="" @submit.prevent="">
				<div class="row">
					<div class="form-group">
						<label for="form_firstName">Имя</label>
						<input
							id="form_firstName"
							type="text"
							name="first_name"
							value="{{ $user->first_name }}"
							class="form-control"
						>
					</div>
					<div class="form-group">
						<label for="form_lastName">Фамилия</label>
						<input
							id="form_lastName"
							type="text"
							name="last_name"
							value="{{ $user->last_name }}"
							class="form-control"
						>
					</div>
				</div>
				<div class="form-group">
					<label for="form_email">E-mail адрес</label>
					<input
						id="form_email"
						type="text"
						name="email"
						value="{{ $user->email }}"
						class="form-control"
					>
				</div>
				<div class="row">
					<div class="form-group">
						<label for="form_companyName">Название компании</label>
						<input
							id="form_companyName"
							type="text"
							name="company_name"
							value="{{ $user->company_name }}"
							class="form-control"
						>
					</div>
					<div class="form-group">
						<label for="form_phone">Телефон</label>
						<masked-input
							id="form_phone"
							type="text"
							name="phone"
							value="{{ $user->phone }}"
							class="form-control"
							:guide="false"
							:mask="['+', '7', ' ', '(', /\d/, /\d/, /\d/, ')', ' ', /\d/, /\d/, /\d/, ' ', /\d/, /\d/, '-', /\d/, /\d/]"
						>
						</masked-input>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="form-group">
						<label for="form_oldPassword">Старый пароль</label>
						<input
							id="form_oldPassword"
							type="text"
							name="old_password"
							class="form-control"
						>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<label for="form_newPassword">Новый пароль</label>
						<input
							id="form_newPassword"
							type="text"
							name="password"
							class="form-control"
						>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<label for="form_confirmNewPassword">Подтвердите новый пароль</label>
						<input
							id="form_confirmNewPassword"
							type="text"
							name="confirm_password"
							class="form-control"
						>
					</div>
				</div>
				<button type="submit" class="btn primary">Изменить данные</button>
			</form>
		</div>
	</div>
</template>