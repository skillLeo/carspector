@extends('mainpages.master-layout')
@section('title', 'Carspector | Deine Meinung ist uns wichtig!')
@section('header')
    @include('partials.index-header')
@endsection
@section('content')

<section class="py-5">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="text-center">

                    <h3 class="fw-bold mb-5" style="font-size: 2.5rem">
                        Wie wahrscheinlich ist es, dass du uns weiterempfiehlst?
                    </h3>

                    <!-- <p class="text-muted mb-4">
                        Wie wahrscheinlich ist es, dass du uns weiterempfiehlst?
                    </p> -->

                    <div class="d-flex justify-content-between align-items-center mx-auto mb-3"
                        style="max-width: 520px;">

                        <div class="text-center">
                            <div style="font-size: 21px;">😕</div>
                            <small class="text-muted">Unwahrscheinlich</small>
                        </div>

                        <div class="text-center">
                            <div style="font-size: 21px;">😄</div>
                            <small class="text-muted">Sehr wahrscheinlich</small>
                        </div>

                    </div>

                    <div class="d-flex justify-content-center flex-nowrap gap-1">

                    @php
                        $colors = [
                            '#dc3545', // 1
                            '#e74c3c', // 2
                            '#f05d4e', // 3
                            '#f39c12', // 4
                            '#f5b041', // 5
                            '#f4d03f', // 6
                            '#d4e157', // 7
                            '#9ccc65', // 8
                            '#66bb6a', // 9
                            '#28a745', // 10
                        ];
                    @endphp

                    @for($i = 1; $i <= 10; $i++)
                        <a href=""
                        class="d-flex align-items-center justify-content-center text-white text-decoration-none"
                        style="
                                width:42px;
                                height:42px;
                                border-radius:8px;
                                font-size:14px;
                                font-weight:600;
                                background: {{ $colors[$i-1] }};
                        ">
                            {{ $i }}
                        </a>
                    @endfor

                </div>

                </div>

            </div>
        </div>

    </div>
</section>
@endsection
