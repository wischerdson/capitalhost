@extends($layout)

@section('content')
	<home-page></home-page>
@endsection

@push('templates')
	<template id="template__home">
		<div id="template_home">
			<div class="container">
				<div class="top">
					<div class="controls">
						<div class="form-group search">
							<div class="icon">@include('svg.search')</div>
							<input type="text" placeholder="Поиск" v-model="search" class="form-control">
						</div>
						<div class="sort">
							<div class="form-group select">
								<select class="form-control months" v-model="sortingDetails">
									<option :value="{sort: 'created_at', order: 'asc'}">Дата: от старых к новым</option>
									<option :value="{sort: 'created_at', order: 'desc'}">Дата: от новых к старым</option>
									<option :value="{sort: 'freeze_in', order: 'asc'}">Баланс: от меньшего к большему</option>
									<option :value="{sort: 'freeze_in', order: 'desc'}">Баланс: от большего к меньшему</option>
									<option :value="{sort: 'tasks_count', order: 'asc'}">Количество невыполненных задач</option>
								</select>
								<div class="chevron-down">
									@include('svg.chevron-down')
								</div>
							</div>
						</div>
					</div>
				</div>

				<div v-if="users">
					<ul class="user-list" :class="{wait}">
						<snippet-user-info-card v-for="user in users" :user="user"></snippet-user-info-card>
					</ul>

					<component-pagination
						:total-pages="pagination.totalPages"
						:current-page="pagination.currentPage"
						@change="pageChanged"
					></component-pagination>
				</div>
			</div>
		</div>
	</template>

	@include('admin.snippets.user-info-card')
	@include('admin.components.pagination')
@endpush