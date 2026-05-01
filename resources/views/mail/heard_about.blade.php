@component('mail::message')
    # Feedback
    Name: {{$user->name}}
    E-Mail: {{$user->email}}
    Heard About: {{$heard_about}}

    Thanks
    {{ config('app.name') }}
@endcomponent
