
<template id="component_pagination">
	<div class="pagination" v-if="totalPages > 1">
		<div :class="{inactive: currentPage === 1}">
			<button
				@click="$emit('change', 1)"
				class="btn to-start-btn arrow"
				title="В начало"
			>@include('admin.svg.double-chevron-left')</button>
			<button
				@click="$emit('change', currentPage - 1)"
				class="btn one-step-back-btn arrow"
				title="На предыдущую страницу"
			>@include('svg.chevron-left')</button>
		</div>
		
		<div class="pagination-elements" :style="`width: ${(30 + 5) * (totalPages >= 5 ? 5 : totalPages)} : `">
			<ul class="pagination-list" :style="`transform: translateX(${paginationOffset}px);`">
				<li
					class="btn pagination-item"
					:class="{active: n == currentPage}"
					v-for="n in totalPages"
				>
					<button class="btn" :title="`Страница ${n}`" @click="$emit('change', n)"><div class="dot"></div></button>
				</li>
			</ul>
		</div>

		<div :class="{inactive: currentPage === totalPages}">
			<button
				@click="$emit('change', currentPage + 1)"
				class="btn one-step-next-btn arrow"
				title="На следующую страницу"
			>@include('svg.chevron-right')</button>
			<button
				@click="$emit('change', totalPages)"
				class="btn to-end-btn arrow"
				title="В конец"
			>@include('admin.svg.double-chevron-right')</button>
		</div>
	</div>
</template>