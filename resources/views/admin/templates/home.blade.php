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