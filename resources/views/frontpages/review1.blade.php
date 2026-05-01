@extends('mainpages.mainfront')
@section('content')
    <div class="container-fluid">
        <div class="row  bg-primary d-none d-sm-none d-md-none d-lg-block d-xl-block text-center text-white">
            <div class="col-12">
                <p class="pb-0 pt-2 pb-2 "><span class="">Brauchst du Hilfe bei der Buchung? Kontaktiere uns:</span> <b> kontakt@carspector.de</b></p>
            </div>
        </div>
        <div class="container py-5">
            <div class="row justify-content-center pb-4">
                <div class="col-12 rounded col-md-10 col-lg-10 col-xl-10 supportdiv px-lg-5" style="border: 1px solid gray;">
                    <div class="col-12 text-center">
                        <h6 class="fw-bold pt-4" style="color: #1877F2;;"> Bewerte dein Erlebnis</h6>
                        <h6 class="fw-bold pt-2">Dein Kfz-Prüfer: Andy Wosilat</h6>
                    </div>

                    <div class="row mt-5 px-lg-5">
                        <div class="col-sm-12 col-12 col-md-12 col-lg-8 col-xl-8">
                            <label for="inputPassword3" class="col-form-label">Deine Zufriedenheit mit Andy Wosilat:</label>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                            <div class='rating-stars '>
                                <ul id='stars'>
                                    <li class='star' title='Poor' data-value='1'>
{{--                                        <i class='fa fa-star fa-fw'></i>--}}
                                        <i class="fa-regular fa-star fa-fw" style="color: #0a53be"></i>
                                    </li>
                                    <li class='star' title='Fair' data-value='2'>
                                        <i class="fa-regular fa-star fa-fw" style="color: #0a53be"></i>
                                    </li>
                                    <li class='star' title='Good' data-value='3'>
{{--                                        <i class='fa fa-star fa-fw'></i>--}}
                                        <i class="fa-regular fa-star fa-fw" style="color: #0a53be"></i>

                                    </li>
                                    <li class='star' title='Excellent' data-value='4'>
                                        <i class="fa-regular fa-star fa-fw" style="color: #0a53be"></i>

{{--                                        <i class='fa fa-star fa-fw'></i>--}}
                                    </li>
                                    <li class='star' title='WOW!!!' data-value='5'>
                                        <i class="fa-regular fa-star fa-fw" style="color: #0a53be"></i>

{{--                                        <i class='fa fa-star fa-fw'></i>--}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5 px-lg-5">
                        <div class="col-12">
                            <h6>Bitte teile uns mit, was dir an deinem persönlichen Kfz-Prüfer gefallen, aber auch nicht gefallen hat:</h6>
                        </div>

                    </div>

                    <div class="row px-lg-5">
                        <div class="col-12">
                <textarea name="" style="background: #F5F5F5;
        border: 1px solid #6A6A6A;
        border-radius: 5px;" class="form-control" rows="5"
                          id="">Mein Feedback.</textarea>
                        </div>

                    </div>



                    <div class="row mt-5 px-lg-5">
                        <div class="col-sm-12 col-12 col-md-12 col-lg-8 col-xl-8">
                            <label for="inputPassword3" class="col-form-label">Dein Erlebnis als Carspector Kunde:</label>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                            <div class='rating-stars '>
                                <ul id='stars'>
                                    <li class='star' title='Poor' data-value='1'>
                                        {{--                                        <i class='fa fa-star fa-fw'></i>--}}
                                        <i class="fa-regular fa-star fa-fw" style="color: #0a53be"></i>
                                    </li>
                                    <li class='star' title='Fair' data-value='2'>
                                        <i class="fa-regular fa-star fa-fw" style="color: #0a53be"></i>
                                    </li>
                                    <li class='star' title='Good' data-value='3'>
                                        {{--                                        <i class='fa fa-star fa-fw'></i>--}}
                                        <i class="fa-regular fa-star fa-fw" style="color: #0a53be"></i>

                                    </li>
                                    <li class='star' title='Excellent' data-value='4'>
                                        <i class="fa-regular fa-star fa-fw" style="color: #0a53be"></i>

                                        {{--                                        <i class='fa fa-star fa-fw'></i>--}}
                                    </li>
                                    <li class='star' title='WOW!!!' data-value='5'>
                                        <i class="fa-regular fa-star fa-fw" style="color: #0a53be"></i>

                                        {{--                                        <i class='fa fa-star fa-fw'></i>--}}
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>


                    <div class="row mt-5 px-lg-5">
                        <div class="col-12">
                            <h6>Was hat dir an Carspector gefallen, was nicht und was würdest du ändern? Wir würden uns über dein Feedback sehr freuen!</h6>
                        </div>

                    </div>

                    <div class="row px-lg-5">
                        <div class="col-12">
                <textarea name="" style="background: #F5F5F5;
        border: 1px solid #6A6A6A;
        border-radius: 5px;" class="form-control" rows="5"
                          id="">Mein Feedback.</textarea>
                        </div>

                    </div>

                    <div class="row mt-5 px-lg-5">
                        <div class="col-10">

                            <h6>Würdest du Carspector erneut benutzen?</h6>
                        </div>
                        <div class="col-2">
                            <input type="checkbox" name="" id="">
                            <input type="checkbox" name="" id="">
                        </div>
                        <div class="col-10">
                            <h6>Hat dir Carspector geholfen?</h6>
                        </div>
                        <div class="col-2">
                            <input type="checkbox" name="" id="">
                            <input type="checkbox" name="" id="">
                        </div>
                        <div class="col-10">
                            <h6>Fandest du den Preis gerechtfertigt?</h6>
                        </div>
                        <div class="col-2">
                            <input type="checkbox" name="" id="">
                            <input type="checkbox" name="" id="">
                        </div>
                        <div class="col-10">
                            <h6>Gefällt dir der Aufbau und die</h6>
                            <h6>Bedienbarkeit der Carspector-Website?</h6>
                        </div>

                        <div class="col-2">
                            <input type="checkbox" name="" id="">
                            <input type="checkbox" name="" id="">
                        </div>

                    </div>

                    <div class="row mt-5 pt-5 ">
                        <div class="col-12 text-center">
                            <button class="col-8" style="background: #1877F2; border: none; color: white;">Feedback absenden</button>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-8 col-lg-8 col-xl-8 mt-5 text-center">
                            <p>Vielen Dank für dein Feedback! Das Team von Carspector ist dir dankbar für deine Mithilfe für die Weiterentwicklung und Neuentwicklung der Carspector Webseite.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


@section('scripts')
    <script>
        $(document).ready(function(){

            /* 1. Visualizing things on Hover - See next part for action on click */
            $('#stars li').on('mouseover', function(){
                var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

                // Now highlight all the stars that's not after the current hovered star
                $(this).parent().children('li.star').each(function(e){
                    if (e < onStar) {
                        $(this).addClass('hover');
                    }
                    else {
                        $(this).removeClass('hover');
                    }
                });

            }).on('mouseout', function(){
                $(this).parent().children('li.star').each(function(e){
                    $(this).removeClass('hover');
                });
            });


            /* 2. Action to perform on click */
            $('#stars li').on('click', function(){
                var onStar = parseInt($(this).data('value'), 10); // The star currently selected
                var stars = $(this).parent().children('li.star');

                for (i = 0; i < stars.length; i++) {
                    $(stars[i]).removeClass('selected');
                }

                for (i = 0; i < onStar; i++) {
                    $(stars[i]).addClass('selected');
                }

                // JUST RESPONSE (Not needed)
                var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
                var msg = "";
                if (ratingValue > 1) {
                    msg = "Thanks! You rated this " + ratingValue + " stars.";
                }
                else {
                    msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
                }
                responseMessage(msg);

            });


        });


        function responseMessage(msg) {
            $('.success-box').fadeIn(200);
            $('.success-box div.text-message').html("<span>" + msg + "</span>");
        }
    </script>
@endsection
