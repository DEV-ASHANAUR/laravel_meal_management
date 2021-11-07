@component('mail::message')
# {{$sub}} by {{$data['user_name']}}

<p>Your Meal Details :</p>
<div style="padding-left: 50px;text-transform:uppercase">
    <p>Mess Name : 
        {{ $data['mess_name'] }}
    </p>
    <p>Date of Meal : {{ $data['date'] }}</p>
    <p>Added Meal : {{$data['meal']}}</p>
</div>

@component('mail::button', ['url' => route('meal.view')])
view Details
@endcomponent

Thanks,<br>
{{ config('app.name') }},<br>
Develop with love by :- Md: Ashanaur Rahman
@endcomponent
