@component('mail::message')
# Date : {{ $data['date'] }}
# {{$sub}} by {{$data['user_name']}}

<p>Bazer Details  :</p>
<div style="padding-left: 50px;text-transform:uppercase">
    <p>Mess Name : 
        {{ $data['mess_name'] }}
    </p>
    <p>item description : {{ $data['description'] }}</p>
    <p>Total Cost : {{$data['total']}} tk</p>
</div>

@component('mail::button', ['url' => route($data['route'])])
view Details
@endcomponent

Thanks,<br>
{{ config('app.name') }},<br>
Develop with love by :- Md: Ashanaur Rahman
@endcomponent
