<div id="site_footer">
	<div style="position: relative;">
		<div class="footer-shape">
			@include('guest.svg.footer-shape')
		</div>
	</div>

	<footer id="section_site_footer">
		<div class="container">
			<div class="row">
				<div class="column">
					<div class="brand">
						<img src="{{ asset('image/capitalhost.png') }}" alt="CapitalHost logo">
					</div>
					<ul class="social-media-list">
						<li class="social-media-item">
							<a class="social-media-link" title="Instagram" href="https://www.instagram.com/capitalhost.ru/" target="_blank">
								@include('guest.svg.footer-social-media-instagram')
							</a>
						</li>
					</ul>
					<div class="links" style="margin-top: 50px;">
						<a href="#" style="color: #506690;">Документы</a><br>
						<a target="_blank" href="#" style="color: #506690;">Политика конфиденциальности</a><br>
						<a target="_blank" href="#" style="color: #506690;">Условия предоставления услуг</a>
					</div>
					<div class="links" style="margin-top: 20px; font-size: .8rem; opacity: .6">
						<p>
							Корпоративная почта для связи<br>с администрацией - <a href="mailto:corp@capitalhost.ru">corp@capitalhost.ru</a>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="copyright text-muted">Copyright © {{ date('Y') }} CapitalHost</div>
	</footer>
</div>