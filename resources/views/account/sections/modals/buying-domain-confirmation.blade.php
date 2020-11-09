
<transition name="fade" duration="500">
	<div class="modal buying-domain-confirmation-modal" v-if="buyingDomainConfirmationModal">
		<div class="modal__inside">
			<div class="modal__blackout"></div>
			<div class="modal__close-area" @click="desireToRegister = false"></div>
			<div class="modal__tile">
				<button role="button" class="close" @click="desireToRegister = false">@include('svg.x')</button>
				<div class="modal__header">
					<div class="title">Подтвердите приобретение</div>
					<div class="subtitle">Внимательно проверьте данные и подтвердите покупку доменного имени.</div>
				</div>
				<div class="modal__body">
					<table class="table table-striped">
						<tbody>
							<tr>
								<td>Сумма</td>
								<td>@{{ domainCheckResult.reg_price }}₽</td>
							</tr>
							<tr>
								<td>Домен</td>
								<td>@{{ domain }}</td>
							</tr>
							<tr>
								<td>Текущий баланс</td>
								<td>{{ $user->balance() }}₽</td>
							</tr>
							<tr>
								<td>Номер лицевого счета</td>
								<td>{{ $user->id }}</td>
							</tr>
							<tr>
								<td>Ответственное лицо</td>
								<td>@{{ person.full_name }}</td>
							</tr>
						</tbody>
					</table>
					<form
						id="form_confirmation"
						@submit.prevent="buyDomain"
						action="{{ route('account.domains.buy') }}"
					>
						<div v-if="buyingDomainResult">
							<div class="fail-message" v-if="buyingDomainResult.code == 13037">Недостаточно средств для совершения данной операции</div>
						</div>

						<div class="row">
							<div class="attention">
								После нажатия на кнопку "Оплатить", с баланса аккаунта снимется сумма в размере стоимости данного домена. Убедитесь в том, что текущий баланс превышает стоимость домена, в противном случае Ваш сайт заморозится из-за нехватки средств.
							</div>
							<input type="hidden" name="domain" v-model="domain">
							<input type="hidden" name="person_id" v-model="person.id">
							<div style="text-align: right;">
								<button type="submit" class="btn primary">
									<div class="loader" v-if="form_confirmation__wait"></div>
									<span>Оплатить</span>
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</transition>




{{-- 

<modal v-model="buyingDomainConfirmationModal" class="buying-domain-confirmation-modal">
	<modal-header>
		<div class="title">Подтвердите приобретение</div>
		<div class="subtitle">Внимательно проверьте данные и подтвердите покупку доменного имени.</div>
	</modal-header>
	<modal-body>
		<table class="table table-striped">
			<tbody>
				<tr>
					<td>Сумма</td>
					<td>@{{ domainPrice }}₽</td>
				</tr>
				<tr>
					<td>Домен</td>
					<td>@{{ domain }}</td>
				</tr>
				<tr>
					<td>Текущий баланс</td>
					<td>{{ $user->balance/100 }}₽</td>
				</tr>
				<tr>
					<td>Номер лицевого счета</td>
					<td>{{ $user->account_number }}</td>
				</tr>
				<tr>
					<td>Ответственное лицо</td>
					<td></td>
				</tr>
				<tr>
					<td>Паспортные данные</td>
					<td></td>
				</tr>
			</tbody>
		</table>
		<form
			id="form_confirmation"
			@submit.prevent="buyDomain"
			action="{{ route('account.domains.buy') }}"
		>
			<div
				class="fail-message"
				v-if="confirmationModalErrorMessage"
			>@{{ confirmationModalErrorMessage }}</div>
			<div class="row">
				<div class="attention">
					После нажатия на кнопку "Оплатить", с баланса аккаунта снимется сумма в размере стоимости данного домена. Убедитесь в том, что текущий баланс превышает стоимость домена, в противном случае Ваш сайт заморозится из-за нехватки средств.
				</div>
				<input type="hidden" name="domain" v-model="domain">
				<div style="text-align: right;">
					<button type="submit" class="btn primary">
						<div class="loader" v-if="form_confirmation__wait"></div>
						<span>Оплатить</span>
					</button>
				</div>
			</div>
		</form>
	</modal-body>
</modal> --}}