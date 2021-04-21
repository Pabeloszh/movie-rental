@component('mail::message')
# Confirm your email adress

Hello {{$name}} confirm your email adress to start watching movies from our website

@component('mail::button', ['url' => route('verify',['name' => $name, 'token' => $token])])
Confirm
@endcomponent

Thanks,<br>
MovieRental Team
@endcomponent
