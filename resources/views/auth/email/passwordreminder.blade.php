@component('mail::message')
# Password reminder

Hello {{$name}} we heard that you forgot your password

@component('mail::button', ['url' => route('new-password',['prop' => $prop])])
Confirm
@endcomponent

Thanks,<br>
MovieRental Team
@endcomponent