
<transition name="fade" duration="500">
	<div class="modal" v-if="creationPersonModal">
		<div class="modal__inside">
			<div class="modal__blackout"></div>
			<div class="modal__close-area" @click="desireToRegister = false"></div>
			<div class="modal__tile">
				<button role="button" class="close" @click="desireToRegister = false">@include('svg.x')</button>
				<div class="modal__header">
					<div class="title">Информация о владельце аккаунта</div>
					<div class="subtitle">Для продолжения работы заполните данные о владельце аккаунта ниже. Указывайте действительные персональные данные, которые могут быть подтверждены документом о личности.</div>
				</div>
				<div class="modal__body">
					<form
						action="{{ route('account.persons.create') }}"
						id="form_passport"
						@submit.prevent="createPerson"
					>
						<div class="row">
							<div class="form-group">
								<label for="formContactDetails__fullName">ФИО</label>
								<input
									class="form-control small"
									type="text"
									id="formContactDetails__fullName"
									placeholder="Иванов Иван Иванович"
									name="full_name"
								>
							</div>
							<div class="form-group">
								<label for="formContactDetails__birthDate">Дата рождения</label>
								<input
									class="form-control small"
									type="text"
									id="formContactDetails__birthDate"
									placeholder="30.09.1990"
									name="birth_date"
								>
							</div>
						</div>
						<div class="row">
							<div class="form-group">
								<label for="formContactDetails__phone">Телефон</label>
								<input
									class="form-control small"
									type="text"
									id="formContactDetails__phone"
									placeholder="Укажите Ваш номер телефона"
									name="phone"
								>
							</div>
							<div class="form-group">
								<label for="formContactDetails__email">E-mail</label>
								<input
									class="form-control small"
									type="text"
									id="formContactDetails__email"
									placeholder="Укажите Ваш e-mail"
									name="email"
									value="{{ $user->email }}"
								>
							</div>
						</div>
						<div class="form-group">
							<label>Паспортные данные</label>
							<div>
								<div class="row">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Серия</span>
										</div>
										<input
											class="form-control small"
											type="number"
											id="formContactDetails__passportSeries"
											placeholder="6613"
											name="passport_series"
										>
									</div>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Номер</span>
										</div>
										<input
											class="form-control small"
											type="number"
											id="formContactDetails__passportNumber"
											placeholder="714051"
											name="passport_number"
										>
									</div>
								</div>
								<div class="input-group" style="margin-top: 16px;">
									<div class="input-group-prepend">
										<span class="input-group-text">Кем выдан</span>
									</div>
									<input
										class="form-control small"
										type="text"
										id="formContactDetails__passportDepartment"
										placeholder="УМВД России по московской области"
										name="passport_department"
									>
								</div>
								<div class="input-group" style="margin-top: 16px;">
									<div class="input-group-prepend">
										<span class="input-group-text">Дата выдачи</span>
									</div>
									<input
										class="form-control small"
										type="text"
										id="formContactDetails__passportDateIssue"
										placeholder="08.01.2013"
										name="passport_issue_date"
									>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group">
								<label for="formContactDetails__address">Адрес</label>
								<input
									class="form-control small"
									type="text"
									id="formContactDetails__address"
									name="address"
									placeholder="Укажите свой адрес"
								>
								<div class="form-text">115280, Московская область, г. Москва, ул. Восточная, дом 26, кв. 15</div>
							</div>
						</div>
						<div style="text-align: right;">
							<button type="submit" class="btn primary">
								<div class="loader" v-if="form_contactDetails__wait"></div>
								<span>Подтвердить</span>
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</transition>




{{-- <modal v-model="creationPersonModal" class="modal-contact-details">
	<modal-header>
		<div class="title">Информация о владельце аккаунта</div>
		<div class="subtitle">Для продолжения работы заполните данные о владельце аккаунта ниже. Указывайте действительные персональные данные, которые могут быть подтверждены документом о личности.</div>
	</modal-header>
	<modal-body>
		<form
			action="{{ route('account.persons.add') }}"
			id="form_passport"
			@submit.prevent="storeContactDetails"
		>
			<div class="row">
				<div class="form-group">
					<label for="formContactDetails__fullName">ФИО</label>
					<input
						class="form-control small"
						type="text"
						id="formContactDetails__fullName"
						placeholder="Иванов Иван Иванович"
						name="full_name"
					>
				</div>
				<div class="form-group">
					<label for="formContactDetails__birthDate">Дата рождения</label>
					<input
						class="form-control small"
						type="text"
						id="formContactDetails__birthDate"
						placeholder="30.09.1990"
						name="birth_date"
					>
				</div>
			</div>

			<div class="form-group">
				<label>Паспортные данные</label>
				<div>
					<div class="row">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">Серия</span>
							</div>
							<input
								class="form-control small"
								type="number"
								id="formContactDetails__passportSeries"
								placeholder="6613"
								name="passport_series"
							>
						</div>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">Номер</span>
							</div>
							<input
								class="form-control small"
								type="number"
								id="formContactDetails__passportNumber"
								placeholder="714051"
								name="passport_number"
							>
						</div>
					</div>
					<div class="input-group" style="margin-top: 16px;">
						<div class="input-group-prepend">
							<span class="input-group-text">Кем выдан</span>
						</div>
						<input
							class="form-control small"
							type="text"
							id="formContactDetails__passportDepartment"
							placeholder="УМВД России по московской области"
							name="passport_department"
						>
					</div>
					<div class="input-group" style="margin-top: 16px;">
						<div class="input-group-prepend">
							<span class="input-group-text">Дата выдачи</span>
						</div>
						<input
							class="form-control small"
							type="text"
							id="formContactDetails__passportDateIssue"
							placeholder="08.01.2013"
							name="passport_issue_date"
						>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group">
					<label for="formContactDetails__address">Адрес</label>
					<input
						class="form-control small"
						type="text"
						id="formContactDetails__address"
						name="address"
						placeholder="Укажите свой адрес"
					>
					<div class="form-text">115280, Московская область, г. Москва, ул. Восточная, дом 26, кв. 15</div>
				</div>
			</div>
			<div style="text-align: right;">
				<button type="submit" class="btn primary">
					<div class="loader" v-if="form_contactDetails__wait"></div>
					<span>Подтвердить</span>
				</button>
			</div>
		</form>
	</modal-body>
</modal> --}}