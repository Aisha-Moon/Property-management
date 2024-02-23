@component('mail::message')
Hi, {{$user->name}} ,<br/>
Your Email Id: {{ $user->email }}

<p>Thanks For Joining {{ config('app.name') }}.</p>
<p>Click on the button below to validate your email address.</p>

@component('mail::button',['url'=>url('vendor/password/'.$user->forgot_token)])
login
@endcomponent

Thanks, <br/>
Property Management System
@endcomponent