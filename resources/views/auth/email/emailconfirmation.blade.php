@component('mail::message')
# Confirm your email adress

{{$token}} is your token
{{$name}} is your name


@component('mail::button', ['url' => route('verify',['name' => $name, 'token' => $token])])
View post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
