<!DOCTYPE html>
<html lang="ru">
<head>
	@include('head')
	<link rel="stylesheet" type="text/css" href="{{ mix('css/account.css') }}">
</head>
<body>
	<div id="hostcapital" style="display: none">
		<div id="app">
			@includeWhen($header, $header)
			@includeWhen($sidebar, $sidebar)
			<main>
				@yield('content')
			</main>
			@includeWhen($footer, $footer)
		</div>
	</div>

	@include('account.components.lib')

	@stack('templates')

	<script type="text/javascript">
		Object.defineProperty(window, 'd', {
			get: function () {
				return {debug: {{ env('APP_DEBUG') ? 1 : 0 }}, @stack('data')}
			}
		})
	</script>

	@stack('global')

	@if (!env('APP_DEBUG'))
		<script>
			(function(d, w, c) {
				w.ChatraID = 'i6LBhFqptH3GE3KDi';
				var s = d.createElement('script');
				w[c] = w[c] || function() {
					(w[c].q = w[c].q || []).push(arguments);
				};
				s.async = true;
				s.src = 'https://call.chatra.io/chatra.js';
				if (d.head) d.head.appendChild(s);
			})(document, window, 'Chatra');
		</script>
	@endif

	<script type="text/javascript" src="{{ mix('js/manifest.js') }}"></script>
	<script type="text/javascript" src="{{ mix('js/vendor.js') }}"></script>
	<script type="text/javascript" src="{{ mix('js/account.js') }}"></script>
</body>
</html>