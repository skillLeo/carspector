@extends('mainpages.master-layout')
@section('title', 'Carspector | Danke')
@section('meta_description', '')

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

        .card-header h2 {
            color: white;
        }
    </style>
@endsection

@section('content')

    <div style="padding-top: 25px" class="container pb-5 px-3">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-lg-10 col-xl-10">

                <div style="display: flex; justify-content: center; align-items: center; margin: 0 auto; height: 450px; max-width: 550px" class="ct-w payment-success-container">
                    <div style="border: none; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1)" class="card">
                        <div style="background-color: #01449a; color: #ffffff; text-align: center; border-top-left-radius: 10px; border-top-right-radius: 10px; padding: 15px" class="card-header">
                            <h2 style="color: white; font-size: 35px">Es tut uns leid</h2>
                        </div>

                        <div style="text-align: center; padding: 30px" class="card-body">
                            <p>
        Es tut uns leid, dass deine Erfahrung nicht positiv war. <b>Wir melden uns per E-Mail</b> bei dir, um die Situation zu klären und gemeinsam eine Lösung zu finden.
    </p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <section style="padding-top: 100px"></section>

@endsection
