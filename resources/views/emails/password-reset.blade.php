@component('mail::message')
<span style="opacity: .6">*{{ date('F d, Y - G:i', now()->unix()) }}*</span><br>

# Запрос на восстановление пароля

Здравствуйте, {{ $user->first_name }}!<br>
Чтобы восстановить доступ к аккаунту, нажмите на кнопку:

@php
	$url = route('guest.auth.password-recovery.password-change.index', ['user_id' => $user->id, 'token' => $token]);
@endphp

@component('mail::button', ['url' => $url])
Восстановить доступ
@endcomponent

Или перейдите по ссылке:
<{{ $url }}>

<br>
<br>
Если Вы не отправляли запрос на восстановление пароля, просто проигнорируйте это письмо.
<br>
Желаем хорошего настроения, CapitalUp.


@endcomponent