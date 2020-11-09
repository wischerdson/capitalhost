@extends($layout)

@section('content')
	<settings-page></settings-page>
@endsection

@push('templates')
	<template id="template__settings">
		<div id="template_settings">
			<div class="header">
				<div class="pretitle">{{ $user->company_name }}</div>
				<h1>Настройки</h1>
			</div>

			<div class="container">
				{{-- <form action="" @submit.prevent="">
					<div class="row">
						<div class="form-group">
							<label for="form_firstName">API ключ</label>
							<input
								id="form_firstName"
								type="text"
								name="first_name"
								value="ab233b682ec355648e7891e66c54191b"
								class="form-control"
							>
						</div>
						<button class="btn link">Сгенерировать</button>
					</div>
					<div class="row">
						<div class="form-group">
							<label for="form_lastName">Ключ SMS-activate</label>
							<input
								id="form_lastName"
								type="text"
								name="last_name"
								value=""
								class="form-control"
							>
						</div>
					</div>
					<a href="{{ route('dashboard.settings.yandex') }}">Подключить Yandex</a>
					<button type="submit" class="btn primary">Изменить данные</button>
				</form> --}}
			</div>
		</div>
	</template>
@endpush