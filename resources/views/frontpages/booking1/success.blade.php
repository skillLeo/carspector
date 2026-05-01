@extends('mainpages.mainlayout')
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


    <div style="padding-top: 100px" class="container pb-5  px-3" style="margin-top: -15px">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-lg-10 col-xl-10" >

                <div style="display: flex; justify-content: center; align-items: center; height: 450px" class="payment-success-container">
                    <div style="border: none; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1)" class="card">
                        <div style="background-color: #01449a; color: #ffffff; text-align: center; border-top-left-radius: 10px; border-top-right-radius: 10px; padding: 15px" class="card-header">
                            <h2 style="color: white">Vielen Dank!</h2>
                        </div>
                        <div style="text-align: center; padding: 30px" class="card-body">   
                                <p>Die Zahlung war erfolgreich, vielen Dank!<br> Wir werden deinen Auftrag nun bearbeiten und dein gewünschtes Fahrzeug prüfen. 
                                <br><br>Das Prüfergebnis inkl. aller Dokumente erhältst du per E-Mail.<br><br>Fragen? Kontaktiere uns!</p>
                                <br>
                                <a style="background-color: #01449a; padding: 10px 20px; transition: background-color 0.3s" href="{{route('kontakt')}}" class="btn">Kontakt aufnehmen</a>

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

    <section style="padding-top: 100px"></section>

@endsection
