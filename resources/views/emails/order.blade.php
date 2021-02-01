@component('mail::message')

#Your Order

Hello mr.{{ $user->username }}
your Order
@component('mail::button', ['url' =>  route('shop') ])
View Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
