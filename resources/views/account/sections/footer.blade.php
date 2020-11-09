<template id="template_section_footer">
	<div id="section_footer" v-show="!$store.getters.modal">
		<div class="footer-body">
			<div class="copyright">Copyright © {{ date('Y') }} {{ env('APP_NAME') }}</div>
			<a href="{{ route('guest.legal.privacy-policy') }}">Политика о конфиденциальности</a>
			<a href="{{ route('guest.legal.terms') }}">Правила пользования</a>
			<a>help@hostcapital.ru</a>
		</div>
	</div>
</template>