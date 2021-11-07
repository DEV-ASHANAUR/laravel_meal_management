@component('mail::message')
# Date : {{ $data['date'] }}
# {{$sub}} by {{$data['user_name']}}

<p>Details  :</p>
<div style="padding-left: 50px;text-transform:uppercase">
    <p>Mess Name : 
        {{ $data['mess_name'] }}
    </p>
    <p>Amount : {{$data['total']}} tk</p>
</div>

@component('mail::button', ['url' => route('membermoney.view')])
view Details
@endcomponent

Thanks,<br>
{{ config('app.name') }},<br>
Develop with love by :- Md: Ashanaur Rahman
@endcomponent
