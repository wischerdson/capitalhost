<template id="template_component_modal">
	<transition name="fade" duration="500">
		<div class="modal" v-show="show">
			<div class="modal__inside">
				<div class="modal__blackout"></div>
				<div class="modal__close-area" @click="close"></div>
				<div class="modal__tile">
					<button role="button" class="close" @click="close">@include('svg.x')</button>
					<slot></slot>
				</div>
			</div>
		</div>
	</transition>
</template>
