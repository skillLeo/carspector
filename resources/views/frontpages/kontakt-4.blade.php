
@extends('mainpages.mainlayout')
@section('styles')
    <style>
        .wa-btn {
            background-color: var(--secondary) !important;
            color: white !important;
        }
        .wa-btn:hover {
            background-color: white !important;
            color: var(--primary) !important;
        }
        .btn-sb:hover {
            background-color: var(--primary) !important;
            border-color: var(--primary) !important;
            color: white !important
        }

        .btntxt {
            text-align: center;
        }

    </style>






@endsection



@section('content')
    <main>

                    <div style="background-color: #f0f5fa; padding-bottom: 50px; padding-top: 50px" class="text-center mb-5">
                        <h3 style="font-size: 30px" class="fs-4">Support kontaktieren</h3><br>
                        <a href="tel:021192325550" style="width: 300px; height: 50px; font-size: 16px" class="btn btn-sb btn-secondary shadow">Anrufen: 0211 92325550</a>
                        <p style="padding-top:35px; font-size: 17px"><b>Kostenloser Kundenservice</b><br>Mo-Sa: 9:00 - 20:00 Uhr</hp>
                    </div>

        <!-- step-info -->
        <section style="background-color: white; padding-top: 0px !important" id="how-does-work">
    <div class="container-sm">
        <div class="mb-5 mb-md-3">
            <div class="col-lg-8 mx-auto">
{{--                <!-- action="{{route('contact.post')}}" -->--}}
                <form method="POST" action="{{route('contact.post')}}" id="contact_form" >
                  @csrf
                    <div class="bg-white rounded-1 py-4 px-lg-5 p-3 pb-3 shadow-1 position-relative">
                        <h5 style="padding-top: 10px; font-size: 17px !important; font-weight: normal"><b>Kontaktformular momentan nicht verfügbar.</b><br><br> Bitte sende uns eine E-Mail an: <a href="mailto:info@carspector.de">info@carspector.de</a> oder rufe uns an unter <a href="tel:021192325550">0211 92325550</a>.<br><br>Vielen Dank für dein Verständnis.</h5><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <p class="mb-0 text-black fs-6">Vollständiger Name<sup class="text-primary">*</sup></p>
                                    <div class="input-box">
                                        <input name="name" type="text" value="{{old('name')}}" class="form-control form-control-sm shadow">
                                        @error('name')
                                        <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <p class="mb-0 text-black fs-6">E-Mail<sup class="text-primary">*</sup></p>
                                    <div class="input-box">
                                        <input type="text" name="email" value="{{old('email')}}" class="form-control form-control-sm shadow">
                                        @error('email')
                                        <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div style="padding-top: 10px" class="col-md-12">
                                <div class="mb-3">
                                    <p class="mb-0 text-black fs-6">Wie können wir helfen?<sup class="text-primary">*</sup></p>
                                    <div class="input-box">
                                        <textarea style="height: 150px; font-size: 15px" name="message" class="form-control shadow" cols="30" rows="20">{{old('message')}}</textarea>
                                        @error('message')
                                        <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-0">
                                    <p style="color: gray; font-size: 15px !important" class="mb-0">Pflichtfelder mit <sup class="text-primary">*</sup> markiert.</p>
                                </div>
                            </div>
                            <div class="col-12">
                                @if(session('success'))
                                    <br><div class="alert alert-success">{{session('success')}}</div>
                                @endif
                            </div>
                        </div><br>

                        <!-- Honeypot Field (hidden from users, visible to bots)
                        <div style="display: none;">
                            <label for="extra_field">Bitte leer lassen</label>
                            <input type="text" id="extra_field" name="extra_field" value="">
                        </div>

                        <input type="hidden" id="start_time" name="start_time" value="">

                        Ich bin kein Roboter Checkbox
                        <br><div class="mb-3" style="padding-left: 5px; display: flex; align-items: center;">
                            <input type="checkbox" id="robot-check" style="transform: scale(1.5); margin-right: 10px;">
                            <label for="robot-check" style="font-size: 16px;">Ich bin kein Roboter</label>
                        </div> -->
                        <div class="g-recaptcha" data-sitekey="6LfYSIAqAAAAAE9j6XmbdSe9UAIjo5KQTAplX3qF"></div>
                        <br>
                        <button type="button" id="submit-button" style="width: 100%; height: 55px; font-size: 16px" class="btn btn-sb btn-secondary shadow">Momentan nicht verfügbar.</button>
                        <h6 class="btntxt" style="padding-top:35px; font-weight: 450">Unser Kundenservice wird sich um dein Anliegen kümmern und sich schnellstmöglich bei dir melden.</h6><br>
                        <hr>
                        <h6 class="btntxt" style="font-weight: 400; color: black">Gerne kannst du uns auch direkt eine E-Mail senden an: <a href="mailto:info@carspector.de">info@carspector.de</a></h6>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section id="faq-wrap"><br><br></section>




        <center><section class="question-section">
            <div class="container-sm position-relative">
                <div class="row">
                    <div class="col">
                        <div class="qs-wrapper">
                            <h3>WhatsApp?</h3>
                            <p>Schreibe uns eine Nachricht!</p>
                            <div class="qs-btn">
                               <a class="wa-btn" href="https://wa.me/+4915774993273?text=Hey%20Carspector!%20Ich%20habe%20eine%20Frage:%20">Auf WhatsApp schreiben</a>
                                <!-- <a href="{{route('kontakt')}}">Jetzt kontaktieren</a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="qs-form d-none d-xl-block">
                    <h5>Kontaktiere uns</h5>
                    <form action="{{route('contact.post')}}" method="POST">
                        @csrf
                    <div class="qs-input d-flex justify-content-between">
                        <div class="qs-single-input">
                            <label for="">Vollständiger Name</label>
                            <input type="text" name="name" value="{{old('name')}}">
                            @error('name')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="qs-single-input">
                            <label for="">E-Mail</label>
                            <input type="email" name="email" value="{{old('email')}}">
                            @error('email')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="qs-text-area">
                        <label for="">Worum geht es?</label>
                        <textarea style="height: 150px; font-size: 15px" name="message">{{old('message')}}</textarea>
                    </div>
                    <div class="qs-form-btn">
                        <button type="submit" class="btn btn-primary">Abschicken</button>
                    </div>
                        <div class="col-12 mt-2">
                            @if(session('success'))
                                <div class="alert alert-success">{{session('success')}}</div>
                            @endif
                        </div>
                    </form>
                </div> -->
            </div>
        </section></center>



    </main><br><br>
@endsection

@section('scripts')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        // Set the start time when the page loads
        window.onload = function() {
            // document.getElementById('start_time').value = Date.now();

            function validateForm() {
                var response = grecaptcha.getResponse();
                if (response.length === 0) {
                    alert("Bitte bestätigen Sie, dass Sie kein Roboter sind.");
                    return false;
                }
                var nameField = document.querySelector('input[name="name"]').value.trim();

                // Check if name is "robertcom"
                if (nameField.toLowerCase() === "robertcom") {
                    alert("Der Name 'robertcom' ist nicht erlaubt.");
                    return false;
                }

                if (response.length === 0) {
                    alert("Bitte bestätige, dass du kein Roboter bist.");
                    return false;
                }
                document.getElementById('contact_form').submit();

                return true;
            }

            function validateAll() {
                return validateForm();
            }
            document.getElementById('submit-button').addEventListener('click',function(){
                console.log('submit');
                validateForm();
            })
        };

        // function validateCaptcha() {
        //     var response = grecaptcha.getResponse();
        //     if (response.length === 0) {
        //         alert("Bitte bestätigen Sie, dass Sie kein Roboter sind.");
        //         return false;
        //     }
        //     return true;
        // }



        // function validateCaptcha() {
        //     const checkbox = document.getElementById('robot-check');
        //     const extraField = document.getElementById('extra_field').value;
        //     const startTime = parseInt(document.getElementById('start_time').value);
        //     const currentTime = Date.now();
        //
        //     // Check if honeypot field is filled
        //     if (extraField !== "") {
        //         alert("Spam-Verdacht: Bitte das Formular erneut ausfüllen.");
        //         return false; // Block submission if honeypot is filled
        //     }
        //
        //     // Check if the form was submitted too quickly (e.g., less than 7 seconds)
        //     if ((currentTime - startTime) < 5000) { // 7000 ms = 7 seconds
        //         alert("Bitte warte ein paar Sekunden, bevor du das Formular absendest.");
        //         return false; // Block submission if filled too fast
        //     }
        //
        //     // Check if "Ich bin kein Roboter" checkbox is checked
        //     if (!checkbox.checked) {
        //         alert("Bitte bestätige, dass du kein Roboter bist.");
        //         return false; // Prevent submission if the checkbox is not checked
        //     }
        //
        //     return true; // Allow submission if all checks pass
        // }
    </script>
@endsection
