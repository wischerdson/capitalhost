@component('mail::message')
# {{ $user->company }} будет заморожен через 3 дня

Уважаемый {{ $user->first_name }}, обращаем Ваше внимание, что через 3 дня сайт {{ $user->company }} будет заморожен в связи с нехваткой средств на Вашем счету. Перейдите в личный кабинет и оплатите, пожалуйста, услуги хостинга в ближайшее время.

@component('mail::button', ['url' => route('account.payment.index')])
Оплатить
@endcomponent
@endcomponent