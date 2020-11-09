@component('mail::message')
<span style="opacity: .6">*{{ date('F d, Y - G:i', now()->unix()) }}*</span><br>

# На сайте {{ $user->description->company_name }} была заполнена форма:

@foreach ($formdata as $key => $value)
**{{ $key }}:** {{ $value }}<br>
@endforeach
@if (!empty($payment))
**Заказ:**

@foreach ($payment->products as $product)
<img style="float: left; margin-right: 20px" src="{{ $product->img }}" alt="" height="100">

{{ $product->name }}<br>
*Цена*: {{ $product->price }}₽<br>
*Количество*: {{ $product->quantity }}<br>
*Сумма*: {{ $product->amount }}₽

@endforeach

**Общая сумма:** {{ $payment->amount }}₽
@endif


@endcomponent