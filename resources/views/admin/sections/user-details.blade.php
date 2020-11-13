
<section-user-details></section-user-details>

@push('templates')
	<template id="template_section_userDetails">
		<transition duration="1000">
			<section id="section_userDetails" v-if="isOpen">
				<div class="overlay" @click="$store.commit('user', null)"></div>

				<div class="section-content">
					<div class="scroll-fix">
						<div class="user-info">
							<div class="loader" v-if="wait"></div>
							<div class="scroll-content">
								<button class="btn close-sidebar" @click="$store.commit('user', null)">@include('admin.svg.close')</button>
								<div class="header">
									<div class="rounded-image">
										<div class="image" :style="user.logo ? `background-image: url(${user.logo})` : ''">
											<span v-if="!user.logo">@{{ user.company[0].toUpperCase() }}</span>
										</div>
										<div class="status-dot" :class="statusColor"></div>
									</div>
									<div>
										<div class="user-company">@{{ user.company }}</div>
										<div class="user-name">
											<span>@{{ user.first_name }} @{{ user.last_name }}</span>
											<div class="balance-badge" :class="statusColor">@{{ user.balance }}₽</div>
										</div>
										<div class="user-created-at">Регистрация @{{ createdAt }}</div>
									</div>
								</div>
								<div class="auth-data">
									<div class="info-item">
										<span class="key">E-mail</span>
										<input type="text" class="value" readonly="readonly" :value="user.email">
										<button class="btn copy-to-clipboard" @click="copyToClipboard(user.email, $event)">
											<span class="copy">@include('svg.copy')</span>
											<span class="tick" style="display: none">@include('admin.svg.check')</span>
										</button>
									</div>
									<div class="info-item">
										<span class="key">Пароль</span>
										<input type="text" class="value" readonly="readonly" :value="user.password">
										<button class="btn copy-to-clipboard" @click="copyToClipboard(user.password, $event)">
											<span class="copy">@include('svg.copy')</span>
											<span class="tick" style="display: none">@include('admin.svg.check')</span>
										</button>
									</div>
									<div class="info-item" v-if="user.domains.length">
										<span class="key">Домен</span>
										<input type="text" class="value" readonly="readonly" :value="user.domains[0].name">
										<button class="btn copy-to-clipboard" @click="copyToClipboard('https://'+user.domains[0].name, $event)">
											<span class="copy">@include('svg.copy')</span>
											<span class="tick" style="display: none">@include('admin.svg.check')</span>
										</button>
									</div>
								</div>
								<div class="services-info">
									<div class="service">
										<div class="title">
											<span>Тариф <span v-if="user.plan" style="font-size: 1rem; color: #d8d8d8;">(@{{ user.plan.name }})</span></span>
										</div>
										<div class="data" v-if="user.plan">
											<div class="table-wrapper">
												<table>
													<tbody>
														<tr>
															<td>Оплачен на</td>
															<td>@{{ freezeIn }}</td>
														</tr>		
														<tr>
															<td>Оплата</td>
															<td>@{{ user.plan.amount }}₽/дн.</td>
														</tr>
														<tr v-if="discountTimeRemaining >= 0">
															<td>Скидка</td>
															<td>@{{ user.discount }}%</td>
														</tr>
														<tr v-if="discountTimeRemaining >= 0">
															<td>Действие скидки</td>
															<td>@{{ discountTimeRemaining }} дн.</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<p v-else class="not-available-label">Не выбран</p>
									</div>
									<div class="service tasks">
										<div class="title">
											<span>Задачи</span>
											<button class="btn add-task" @click="createTask">@include('admin.svg.plus')</button>
										</div>
										<ul class="task-list" v-if="user.admin_tasks && user.admin_tasks.length">
											<snippet-user-details-task
												v-for="task in user.admin_tasks"
												:task="task"
												:key="`task_${task.id}`"
												@wait="setWait"
											></snippet-user-details-task>
										</ul>
										<p v-else class="not-available-label">Задач нет</p>
									</div>
									<div class="service contact-methods">
										<div class="title">
											<span>Способы связи</span>
											<button class="btn">@include('admin.svg.plus')</button>
										</div>
										<p class="not-available-label">Способы связи с клиентом отсутствуют. <button class="btn link">Добавить</button></p>
									</div>
								</div>
							</div>
							
							
						</div>
					</div>
				</div>
			</section>
		</transition>
	</template>

	@include('admin.snippets.user-details-task')
@endpush