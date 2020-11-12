
<template id="snippet_userInfoCard">
	<li
		class="user-info-card"
		:class="{selected: selectedUser && selectedUser.id === user.id}"
	>
		<div class="select-user-btn" @click="selectUser">
			<div class="unresolved-tasks-badge" title="Нерешенные задачи" v-if="unresolvedTasksCount">@{{ unresolvedTasksCount }}</div>
			{{-- <div class="checkbox-body">@include('svg.check')</div> --}}
			<div class="top">
				{{-- <div class="rounded-image">
					<div v-if="user.logo" class="image" :style="`background-image: url('${user.logo}')`"></div>
					<div v-else class="image">@{{ user.company[0] }}</div>
					<div class="status-dot" :class="hColor"></div>
				</div> --}}
				<div class="base-info">
					<div class="name">@{{ user.last_name }} @{{ user.first_name }}</div>
					<div class="company">@{{ user.company }}</div>
				</div>
			</div>
			<ul class="extended-info">
				<li class="item">
					<span class="key">Баланс</span>
					<span class="value">@{{ user.balance }}₽</span>
				</li>
				<li class="item">
					<span class="key">Домен</span>
					<span class="value" v-if="user.domains.length">
						<span v-for="domain in user.domains">@{{ domain.name }}</span>
					</span>
					<span class="value" v-else>-</span>
				</li>
			</ul>
			<div class="tag-list">
				<span class="tag" :class="[hColor, {striked: !user.plan}]">H</span>
				<span class="tag" :class="dColor">D</span>
				<span class="tag" :class="sColor">S</span>
			</div>
			<button
				class="reload-btn btn primary-light"
				:class="{spin: reloading}"
				@click.stop="reloadSite"
				v-if="user.domains.length"
			>@include('admin.svg.arrow-repeat')</button>
		</div>
	</li>
</template>

@push('data')
	tildaSecret: '{{ env('TILDA_SECRET_KEY') }}',
@endpush