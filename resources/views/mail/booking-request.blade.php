@component('mail::message')
    A user made a new booking request.<br>
    Examiner:{{examiner($request->id)}}<br>
    Type: {{$request->type}}<br>


    Marke & Modell: {{$request->vehicle_make_model}}<br>
    Link zum Inserat - z.B. mobile.de: {{$request->advertisement_link}}<br>
    Stadt: {{$request->city}}<br>
    Wünsche an die Prüfung: {{$request->desc}}<br>
    Name: {{$request->name}}<br>
    E-Mail: {{$request->email}}<br>
    {{ config('app.name') }}
@endcomponent
