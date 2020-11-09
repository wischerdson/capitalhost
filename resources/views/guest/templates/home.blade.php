@extends($layout)

@section('content')
	<home-page></home-page>
@endsection

@push('templates')
	<template id="template__home">
		<div id="template_home">
			@include('guest.sections.home.welcome')
			@include('guest.sections.home.features')

			
			
			<div class="plans">
				<div class="container">
					<h2>Актуальные тарифные планы</h2>
					<div class="plans-switch white-block">
						<div class="marker" :class="`mode-${switchMode}`"></div>
						@foreach($plansCategories as $category)
							<button
								class="plans-switch__item"
								data-id="{{ $category->id }}"
								:class="{active: switchMode === {{ $category->id }}}"
								@click="switchMode = {{ $category->id }}"
							>{{ $category->name }}</button>
						@endforeach
					</div>

					@foreach($plansCategories as $category)
						<ul class="plans__list" v-if="switchMode === {{ $category->id }}" key="plansCategory_{{ $category->id }}">
							@foreach($category->plans as $plan)
								<li class="plans__item white-block">
									<div class="plan-name"><div class="badge primary">{{ $plan->name }}</div></div>
									<div class="plan-price">
										<div class="currency">₽</div>
										<div class="value">{{ $plan->amount }}</div>
										<div class="per">/день</div>
									</div>
									<div class="text-muted center" style="margin-top: 5px">{!! $plan->description !!}</div>
									<ul class="advantage-list">
										@foreach($plan->advantages as $advantage)
											<li class="advantage-item @if($advantage->yes) yes @endif">{{ $advantage->text }}</li>
										@endforeach
									</ul>
									<a
										href="{{ route('account.settings.select-plan', ['plan' => $plan->id]) }}"
										class="btn primary"
									>Заказать</a>
								</li>
							@endforeach
						</ul>
					@endforeach
				</div>
			</div>


			<section id="section_support">
				<div class="container">
					<div class="left">
						<div class="text text-muted">
							<p>Производительность и скорость</p>
							<h2>Просто быстрые сайты</h2>
							<p>Скорость сайта может замедлить или ускорить развитие вашего бизнеса. Порадуйте своих посетителей действительно быстрым сайтом.</p>
							<a href="{{ route('account.home') }}" class="btn primary rounded">Подробнее</a>
						</div>
					</div>
					<div class="right">
						<div
							class="video"
							data-aos="fade-up"
							data-aos-duration="600"
							data-aos-delay="300"
						>
							<video class="delayed-play" data-src="{{ asset('video/simply-fast-websites-4cdb90549e.mp4') }}"></video>
						</div>
					</div>
				</div>
			</section>


			<section id="section_support">
				<div class="container r">
					<div class="right">
						<div
							class="video"
							data-aos="fade-up"
							data-aos-duration="600"
							data-aos-delay="300"
						>
							<video class="delayed-play" data-src="{{ asset('video/scale-from-micro-to-large-scale-45a7cd83a7.mp4') }}"></video>
						</div>
					</div>
					<div class="left">
						<div class="text text-muted">
							<p>Гибкий и масштабируемый</p>
							<h2>От микро до крупных</h2>
							<p>Разные проекты требуют разных технологий. Выберите план, который соответствует вашим текущим потребностям, затем обновляйте и масштабируйте его по мере роста вашего сайта.</p>
							<a href="{{ route('account.home') }}" class="btn primary rounded">Подробнее</a>
						</div>
					</div>
				</div>
			</section>

			<section id="section_support">
				<div class="container">
					<div class="left">
						<div class="text text-muted">
							<p>Простой и интуитивно понятный</p>
							<h2>Легко настроить</h2>
							<p>Запустить сайт так же просто, как нажать на кнопку! Простые понятные инструменты и процедура.</p>
							<a href="{{ route('account.home') }}" class="btn primary rounded">Подробнее</a>
						</div>
					</div>
					<div class="right">
						<div
							class="video"
							data-aos="fade-up"
							data-aos-duration="600"
							data-aos-delay="300"
						>
							<video class="delayed-play" data-src="{{ asset('video/support.mp4') }}"></video>
						</div>
					</div>
				</div>
			</section>


			
			<section id="section_findDomain">
				<div class="container">
					<h2>Регистрация доменов</h2>
					<div class="section-desc">
						<p>3 300 000 доменов на обслуживании, №1 в России</p>
						<ul class="link-list">
							<li class="link-list__item"><a href="#" class="link-list__link">Продлить</a></li>
							<li class="link-list__item"><a href="#" class="link-list__link">Перенести в CapitalHost</a></li>
						</ul>
					</div>
					<form>
						<div class="row">
							<div class="form-group">
								<input
									class="form-control"
									type="text"
									name="query"
									placeholder="Введите желаемый домен"
								>
							</div>
							<a type="submit" class="btn primary find-btn">Проверить</a>
						</div>
					</form>
					<ul class="price-list">
						<li class="price-list__item">
							<span class="tld">.ru</span>
							<span class="price">739</span>
						</li>
						<li class="price-list__item">
							<span class="tld">.com</span>
							<span class="price">1399</span>
						</li>
						<li class="price-list__item">
							<span class="tld">.xyz</span>
							<span class="price">529</span>
						</li>
						<li class="price-list__item">
							<span class="tld">.su</span>
							<span class="price">420</span>
						</li>
						<li class="price-list__item">
							<span class="tld">.net</span>
							<span class="price">879</span>
						</li>
						<li class="price-list__item">
							<span class="tld">.pro</span>
							<span class="price">1259</span>
						</li>
					</ul>
				</div>
			</section>

			<a name="panel"></a>
			@include('guest.sections.home.about')
			{{-- @include('guest.sections.home.testimonials') --}}
			@include('guest.sections.home.stats')
			<a name="about"></a>
			@include('guest.sections.home.get-started')
			@include('guest.sections.home.faqs')
		</div>
	</template>
@endpush
