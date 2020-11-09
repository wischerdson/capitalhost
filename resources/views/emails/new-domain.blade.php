@component('mail::message')
<span style="opacity: .6">*{{ date('F d, Y - G:i', time()) }}*</span><br>

# {{ $user->description->first_name }} {{ $user->description->last_name }} хочет зарегистрировать новый домен


Домен - **{{ $domain }}**<br>
ФИО - **{{ $user->contactDetails->full_name }}**<br>
Адрес - **{{ $user->contactDetails->address }}**<br>
Паспортные данные - **{{ $user->contactDetails->passport_series }} {{ $user->contactDetails->passport_number }} {{ $user->contactDetails->passport_department }} {{ $user->contactDetails->passport_issue_date }}**<br>
Дата рождения - **{{ $user->contactDetails->birth_date }}**

@endcomponent