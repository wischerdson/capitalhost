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

					<div class="pagination" v-if="pagination.pages > 1">
						<div :class="{inactive: pagination.currentPage === 1}">
							<button
								@click="setPage(1)"
								class="btn to-start-btn arrow"
								title="В начало"
							>@include('admin.svg.double-chevron-left')</button>
							<button
								@click="setPage(pagination.currentPage - 1)"
								class="btn one-step-back-btn arrow"
								title="На предыдущую страницу"
							>@include('svg.chevron-left')</button>
						</div>
						
						<div class="pagination-elements" :style="`width: ${(30 + 5) * (pagination.pages >= 5 ? 5 : pagination.pages)} : `">
							<ul class="pagination-list" :style="`transform: translateX(${paginationOffset}px);`">
								<li
									class="btn pagination-item"
									:class="{active: n == pagination.currentPage}"
									v-for="n in pagination.pages"
								>
									<button class="btn" :title="`Страница ${n}`" @click="setPage(n)"><div class="dot"></div></button>
								</li>
							</ul>
						</div>

						<div :class="{inactive: pagination.currentPage === pagination.pages}">
							<button
								@click="setPage(pagination.currentPage + 1)"
								class="btn one-step-next-btn arrow"
								title="На следующую страницу"
							>@include('svg.chevron-right')</button>
							<button
								@click="setPage(pagination.pages)"
								class="btn to-end-btn arrow"
								title="В конец"
							>@include('admin.svg.double-chevron-right')</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</template>

	@include('admin.snippets.user-info-card')
@endpush