@extends('mainpages.master-layout')
@section('title', 'Carspector | Buchung abgeschlossen')
@section('header')
    @include('partials.index-header')
@endsection
@section('style')
    <style>
        .payment-success-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 450px;
            /*background-color: #f5f5f5;*/
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #01449a;
            color: #ffffff;
            text-align: center;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            padding: 15px;
        }

        .card-body {
            text-align: center;
            padding: 30px;
        }

        .card-body .btn {
            background-color: #01449a;
            color: #ffffff;
            border-radius: 20px;
            padding: 10px 20px;
            transition: background-color 0.3s;
        }

        .card-body .btn:hover {
            background-color: #013a7a;
        }
        .card-header h2{
            color: white;
        }
    </style>

    


@endsection
@section('content')

<script>
  fbq('track', 'Purchase');
</script>

<script>
  gtag('event', 'conversion', {
      'send_to': 'AW-11007240787/LguQCOueg7IaENPU1IAp',
      'transaction_id': ''
  });
</script>


@php
    $orderEmail = isset($order) ? $order->email : '';
    $finalEmail = old('email', $orderEmail);
@endphp

@if(strlen($finalEmail) > 3)
    <script>
        rewardful('convert', {
            email: {!! json_encode($finalEmail) !!}
        });
    </script>
@endif



    <div style="padding-top: 100px" class="container pb-5  px-3" style="margin-top: -15px">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-lg-10 col-xl-10" >

                <div style="display: flex; justify-content: center; align-items: center; margin: 0 auto; height: 450px; max-width: 550px" class="ct-w payment-success-container">
                    <div style="border: none; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1)" class="card">
                        <div style="background-color: #01449a; color: #ffffff; text-align: center; border-top-left-radius: 10px; border-top-right-radius: 10px; padding: 15px" class="card-header">
                            <h2 style="color: white; font-size: 35px; display: flex; align-items: center; justify-content: center; gap: 10px;">
                                <span class="fa-stack" style="font-size:0.55em;">
                                    <i class="fa-solid fa-circle fa-stack-2x" style="color:var(--secondary);"></i>
                                    <i class="fa-solid fa-check fa-stack-1x" style="color:white;"></i>
                                </span>
                                Vielen Dank!
                            </h2>
                        </div>
                        <div style="text-align: center; padding: 30px" class="card-body">   
                                <p>Die Zahlung war erfolgreich, vielen Dank für dein Vertrauen in Carspector!
                                    Eine Buchungsbestätigung wurde gerade an deine E-Mail verschickt.
                                <br><br>
                                    <p style="color: #01449a; font-weight: 500; padding-bottom: 15px">Um alle Daten des Auftrags zu sehen und den aktuellen
                                    Bearbeitungsstand zu verfolgen, erstelle einen kostenlosen Account mit dem Link, den du per E-Mail erhalten hast.</p>
                                <hr>
                                <br>
                                <p style="font-size: 15px; color: gray">Falls du bereits einen Account hast, findest du alle Informationen zum Auftrag auf deinem <a href="{{route('user.dashboard')}}">Profil</a>.</p>
                                </p>

                                <!-- <p>Die Zahlung war erfolgreich, vielen Dank!<br>Wir werden deinen Auftrag nun bearbeiten und dein gewünschtes Fahrzeug prüfen. 
                                <br><br>Alle Informationen zu deiner Buchung findest du auf deinem Profil.</p>
                                <br>
                                <a style="background-color: #01449a; padding: 10px 20px; transition: background-color 0.3s; width: 200px" href="{{route('user.dashboard')}}" class="btn">Zum Profil</a> -->

                            <!-- @if(request('is_user')=='true' || request('is_user')==true)
                                <p>Die Zahlung war erfolgreich, vielen Dank!<br> Alle Informationen zu deiner Buchung findest du auf deinem Profil.</p>
                                <br>
                                <a style="background-color: #01449a; padding: 10px 20px; transition: background-color 0.3s" href="{{route('user.dashboard')}}" class="btn">Zum Profil</a>
                            @else
                                <p>Die Zahlung war erfolgreich, vielen Dank!<br> Wir werden deinen Auftrag nun bearbeiten und dein gewünschtes Fahrzeug prüfen. 
                                <br><br>Das Prüfergebnis inkl. aller Dokumente erhältst du per E-Mail.<br><br>Fragen? Kontaktiere uns!</p>
                                <br>
                                <a style="background-color: #01449a; padding: 10px 20px; transition: background-color 0.3s" href="{{route('kontakt')}}" class="btn">Kontakt aufnehmen</a>
                            @endif -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
  document.addEventListener('DOMContentLoaded', function() {
    console.log('DOMContentLoaded event triggered');
    
    fetch('/tiktok_event_post.sh', {
        method: 'GET'
    })
    .then(response => {
        console.log('Fetch response status:', response.status);
        if (response.ok) {
            console.log('Script fetched successfully');
        } else {
            console.error('Failed to fetch script:', response.status, response.statusText);
        }
    })
    .catch(error => console.error('Error:', error));
});

</script>

    <section style="padding-top: 100px"></section>

@endsection
