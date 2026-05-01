@extends('mainpages.mainfront')
@section('style')
    <style>
        #about_me.active{
            border:2px solid green !important;
        }
        #about_me.error{
            border:2px solid red !important;
        }
    </style>
    @endsection
@section('content')
    <main>
        <!-- edit-profile -->
        <section class="section editProfile">
            <div class="container">
                <form action="{{route('examiner.update-profile')}}" method="POST">
                    @csrf
                <div class="row">
                    <div class="col-xl-5 col-lg-6 mx-auto">
                        <div class="editProfile-wrapper">
                            <div class="editProfile-title">
                                <h5 class="text-center">Profil bearbeiten</h5>
                            </div>

                            <!-- single-item -->
                            <div class="editProfile-item">
                                <label for="" class="text-primary">Über mich:</label>
                                <div class="editProfile-form">
                                    <textarea name="about_me" class="form-control " id="about_me" placeholder="Ich prüfe ihr Fahrzeug nach strengen Vorgaben durch meine jahrelange Erfahrung als Kfz-Mechaniker.">@if(old('about_me')) {{old('about_me')}} @else {{$user->about_me}}@endif</textarea>
                                   <div class="text-primary" style="display: flex;justify-content: flex-end">
                                       <span>Min 350, Max 500 (<span id="character-count"></span>)</span>
                                   </div>
                                    @error('about_me')
                                    <span class="invalid-feedback" style="display: block">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- single-item -->

                            <!-- single-item -->
                            <div class="editProfile-item">
                                <label for="" class="text-primary">Ausbildungen & Können</label>
                                <div class="editProfile-form">
                                    <input type="text" value="@if(old('experience_1')) {{ old('experience_1')  }} @else {{$user->experience_1}} @endif" name="experience_1" placeholder="Erfahrung & Kenntnisse 1" class="form-control mb-2">
                                    <input type="text" value="@if(old('experience_2')) {{ old('experience_2')  }} @else {{$user->experience_2}} @endif"  name="experience_2"placeholder="Erfahrung & Kenntnisse 2" class="form-control mb-2">
                                    <input type="text" value="@if(old('experience_3')) {{ old('experience_3')  }} @else {{$user->experience_3}} @endif {{$user->experience_3}}"  name="experience_3" placeholder="Erfahrung & Kenntnisse 3" class="form-control">
                                </div>
                            </div>
                            <!-- single-item -->

                            <!-- single-item -->
                            <div class="editProfile-item">
                                <label for="" class="text-primary">Stärken</label>
                                <div class="editProfile-form">
                                    <input type="text" name="training_1" value="@if(old('training_1')) {{ old('training_1')  }} @else {{$user->training_1}} @endif" placeholder="Stärken 1" class="form-control mb-2">
                                    <input type="text" name="training_2" value="@if(old('training_2')) {{ old('training_2')  }} @else {{$user->training_2}} @endif" placeholder="Stärken 2" class="form-control mb-2">
                                    <input type="text" name="training_3"  value="@if(old('training_3')) {{ old('training_3')  }} @else {{$user->training_3}} @endif" placeholder="Stärken 3" class="form-control">
                                </div>
                            </div>
                            <!-- single-item -->

                            <!-- single-item -->
                            <div class="editProfile-item">
                                <div class="editProfile-form">
                                    <button type="submit" class="btn btn-primary-light w-100">Speichern und aktualisieren</button>
                                </div>
                            </div>
                            <!-- single-item -->


                        </div>
                    </div>
                </div>
                </form>
            </div>
        </section>
        <!-- edit-profile-end -->
    </main>
@endsection
@section('scripts')
    <script>

        $(document).ready(function() {
            const minChars = 350;
            const maxChars = 500;
            setTimeout(function(){
                $("#about_me").trigger('input');
            },500)

            // Bind the input event to the textarea
            $("#about_me").on("input", function() {
                const text = $(this).val();
                const charCount = text.length;

                // Update the character count display
                $("#character-count").text(charCount);

                // Check if the input exceeds the maximum character limit
                if (charCount > maxChars) {
                    // Trim the text to the maximum character limit
                    $(this).val(text.substring(0, maxChars));
                    $("#character-count").text(maxChars);
                }

                // Check if the input is below the minimum character limit
                if (charCount < minChars) {
                   $('#about_me').addClass('error');
                   $('#about_me').removeClass('active');

                }

                if (charCount >= minChars) {
                    $('#about_me').addClass('active');
                    $('#about_me').removeClass('error');
                }
            });
        });
    </script>
@endsection
