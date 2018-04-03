@component('mail::message')
# Please Activate your account

Click on button bellow to confirm your account activation.

@component('mail::button', ['url' => route('activation.activate', $token)])
Activate
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
