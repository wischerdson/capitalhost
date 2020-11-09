<section id="section_home_welcome">
	<div class="container large">
		<div
			class="left"
			data-aos="fade-up"
			data-aos-duration="1000"
		>
			<h1><span class="text-primary">CapitalHost</span> - это доступный хостинг для Вашего бизнеса</h1>
			<p class="lead text-muted">Безопасные и мощные сервера, подходящие для любых задач по доступным ценам.</p>
			<div class="buttons">
				<a href="{{ route('guest.auth.sign-up.index') }}" class="btn primary">
					<span>Заказать хостинг</span>
					@include('svg.arrow-right-short')
				</a>
			</div>
		</div>
		<div class="right">
			<div class="text">
				<div
					class="price-label"
					data-aos="fade-down"
					data-aos-duration="1000"
					data-aos-delay="300"
				>Планы от</div>
				<div
					class="price"
					data-aos="fade-right"
					data-aos-duration="1000"
					data-aos-delay="600"
				>
					<div class="value">2</div>
					<div class="currency">₽</div>
					<div class="period">/день</div>
				</div>
			</div>
			<div
				class="skewed-image"
				data-aos="fade-up"
				data-aos-duration="1000"
				data-aos-delay="200"
			>
				<img src="{{ asset('image/screenshot.jpg') }}" class="screenshot" alt="">
			</div>
		</div>
	</div>
</section>