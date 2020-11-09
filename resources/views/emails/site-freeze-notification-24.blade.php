@component('mail::message')
# Завтра {{ $user->company }} будет заморожен

Уважаемый {{ $user->first_name }}, уведомляем Вас о том, что завтра в {{ now()->addHours(24)->format('G:i') }} по московскому времени сайт {{ $user->company }} будет заморожен в связи с нехваткой средств на Вашем счету. Перейдите в личный кабинет и оплатите, пожалуйста, услуги хостинга в ближайшее время.

@component('mail::button', ['url' => route('account.payment.index')])
Оплатить
@endcomponent
@endcomponent