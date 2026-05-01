@component('mail::message')
    <h1>New Contact Message</h1>
    <table>
        <tr>
            <td>Name</td>
            <td>{{$name}}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{$email}}</td>
        </tr>
        <tr>
            <td>Message</td>
            <td>{{$msg}}</td>
        </tr>
    </table>
    {{ config('app.name') }}
@endcomponent
