@extends('mainpages.mainfront')
@section('content')

    <div class="container-fluid">
        <div class="row  bg-primary d-none d-sm-none d-md-none d-lg-block d-xl-block text-center text-white">
            <div class="col-12">
                <p class="pb-0 pt-2 pb-2 "><span class="">Brauchst du Hilfe bei der Buchung? Kontaktiere uns:</span> <b> kontakt@carspector.de</b></p>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="row  px-3 justify-content-center">
            <div class="col-12  rounded col-md-11 col-lg-11 col-xl-11 text-center supportdiv"
                 style="border: 1px solid gray;">
                <h3 class="fw-bold py-4"> Profil bearbeiten</h3>

                <form action="{{route('examiner.update-profile')}}" method="POST">

                    <div class="row mb-3">
                        <div class="col-12 text-start col-md-2 col-lg-2 col-xl-2">
                            <label class="form-label">Über mich:</label>
                        </div>
                        <div class="col-12 col-md-10 col-lg-10 col-xl-10">
                            <textarea name="about_me" style="background: #F5F5F5;
                    border: 1px solid #6A6A6A;
                    border-radius: 5px;" class="form-control" rows="5"
                                      id="">{{$user->about_me}}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3 mt-5">
                        <div class="col-12 text-start col-md-4 col-lg-4 col-xl-4">
                            <label for="inputPassword3" class="col-form-label">Erfahrung & Kenntnisse:</label>
                        </div>
                        <div class="col-12 col-lg-8 col-xl-8">
                            <input style="background: #F5F5F5;
                        border: 1px solid #6A6A6A;
                        border-radius: 5px;" name="experience_1" type="text" class="form-control d-block mb-2" id="inputPassword3" placeholder="Erfahrung 1">
                            <input style="background: #F5F5F5;
                                                border: 1px solid #6A6A6A;
                                                border-radius: 5px;" name="experience_2" type="text" class="form-control d-block mb-2"
                                   id="inputPassword3" placeholder="Erfahrung 2">

                            <input style="background: #F5F5F5;
                                                                        border: 1px solid #6A6A6A;
                                                                        border-radius: 5px;" type="text"
                                  name="experience_3"  class="form-control d-block mb-2" id="inputPassword3" placeholder="Erfahrung 3">
                            <input style="background: #F5F5F5;
                                                                                                border: 1px solid #6A6A6A;
                                                                                                border-radius: 5px;"
                                   name="experience_4" type="text" class="form-control d-block mb-2" placeholder="Erfahrung 4" id="inputPassword3">

                        </div>
                    </div>

                    <div class="row mb-3 mt-5">
                        <div class="col-12 col-md-5 col-lg-5 col-xl-5 text-start">
                            <label for="inputPassword3" class="col-form-label">Ausbildung & Fortbildungen:</label>
                        </div>
                        <div class="col-12 col-md-7 col-lg-7 col-xl-7">
                            <input name="training_1" style="background: #F5F5F5;
                        border: 1px solid #6A6A6A;
                        border-radius: 5px;" type="text" class="form-control d-block mb-2" id="inputPassword3" placeholder="Ausbildung & Fortbildungen:">
                            <input name="training_2" style="background: #F5F5F5;
                                                border: 1px solid #6A6A6A;
                                                border-radius: 5px;" type="text" class="form-control d-block mb-2"
                                   id="inputPassword3" placeholder="Fortbildung zum Kfz-Sachverständigen 2015">
                            <input name="training_3" style="background: #F5F5F5;
                                                                        border: 1px solid #6A6A6A;
                                                                        border-radius: 5px;" type="text"
                                   class="form-control d-block mb-2" id="inputPassword3">
                            <input name="training_4" style="background: #F5F5F5;
                                                                                                border: 1px solid #6A6A6A;
                                                                                                border-radius: 5px;"
                                   type="text" class="form-control d-block mb-2" id="inputPassword3">

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary col-12 mt-3">Speichern und aktualisieren</button>


                </form>

            </div>
        </div>
    </div>

@endsection
