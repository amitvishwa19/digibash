@component('mail::message')
Hello Admin,

New Shop <b>{{$shop->name}}</b> created by <b>{{$shop->shop_owner->firstname}},{{$shop->shop_owner->lastname}}</b>

<h5>About Shop</h5>
{{$shop->description}}

@component('mail::button', ['url' => ''])
Activate Shop
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
