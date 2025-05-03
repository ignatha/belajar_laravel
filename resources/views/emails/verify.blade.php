@component('mail::message')
# Hello

Thank you for signing up! Please verify your email by clicking the button below:

@component('mail::button', ['url' => route('verif.email',$token)])
Verify Email
@endcomponent

If you did not sign up, please ignore this email.

Thanks,
{{ config('app.name') }}
@endcomponent
