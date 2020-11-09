@extends($layout)

@section('content')
	<div id="template_plug">
		<div class="container">
			<div class="left">
				<p>Данная страница пока не доступна.<br>Выберите тариф.</p>
				<a href="{{ route('account.home') }}" class="btn primary">Выбрать тариф</a>
			</div>

			<img src="{{ asset('image/illustration-1.png') }}">
		</div>
	</div>
@endsection
