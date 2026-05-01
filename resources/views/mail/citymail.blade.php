@component('mail::message')
    # A user has sent email to available an examiner in the city below.
    Email: {{$email}}
    City: {{$city}}

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
