@extends('mainpages.mainfront')
@section('content')
    <div class="container-fluid" >
        <div class="row " style="background-color: #1877f2">
            <div class="col-12 col-lg-12 col-md-12" >
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-12 ps-lg-4  col-md-12 col-lg-5 col-xl-5 pt-4">
                        <h2 class="text-white fw-bolder ps-3 " style="font-size: 22px !important;">Finde deinen persönlichen Gebrauchtwagen-Prüfer</h2>
                        <ul class="text-white pt-4">
                            <li class="nav-item  py-1">Finde deinen idealen Kfz-Prüfer </li>
                            <li class="nav-item  py-1">Persönlicher Kundenservice </li>
                            <li class="nav-item  py-1">Mehr als 10.000 Kfz-Experten zur Auswahl </li>
                            <li class="nav-item  py-1">Erhalte ein verifiziertes Gebrauchtwagen-Gutachten</li>
                        </ul>

                        <div class="col-md-12">
                            <form method="get" action="{{route('examiners')}}">
                            <div class="row">

                                <div class="col-md-6 px-4 pt-3 ps-lg-4 ">
{{--                                    <input name="city" type="text" placeholder="Stadt" class="form-control px-5 btn1" style="background-color: white;text-align: center;" />--}}
                                    <div class="fav-btn1">
                                    <span class="input-icon">
                                        <img src="{{ asset('assests/images/icons/gebaude 1.png') }}" style="height:20px ">
                                    </span>
                                        <input name="city" type="text " class="form-control text-start ps-4 bg-white"  placeholder="Stadt" >
                                    </div>
                                </div>
                                <div class="col-md-6 px-4 px-3 pt-3  ">
                                    <div class="fav-btn">
                                        <button type="button " class="form-control border-0 text-decoration-none  text-start" style="background: #0a53be" >Jetzt Kfz-Prüfer finden</button>
                                        <span class="input-icon2">
                                             <img src="{{ asset('assests/images/icons/finden 1.png') }}" style="height: 20px">
                                        </span>
                                    </div>
                                </div>

                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 mt-3 mt-md-3 mt-lg-0 mt-xl-0 text-lg-end text-xl-end  text-center col-md-12 col-lg-6 col-xl-6 py-0 my-0 px-0 mx-0">
                        <img src="assests/images/Neilrmstrong.png" class="img img-fluid  px-0 mx-0">
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="background-color: #d1e4fc">
            <div class="col-12">
                <div class="container pt-4">
                    <div class="row">
                        <div class="col-md-12 col-lg-3 col-xl-3">
                            <h5 class="text-center fw-bold">Hervorragend</h5>
                            <div class="text-center " style="font-size: 28px">
                                <span class=""><i class="fa fa-star checked1"></i></span>
                                <span class=""><i class="fa fa-star checked1"></i></span>
                                <span class=""><i class="fa fa-star checked1"></i></span>
                                <span class=""><i class="fa fa-star checked1"></i></span>
                                <span class=""><i class="fa fa-star checked1"></i></span>
                            </div>
                            <p class="text-center paragraph">Basierend auf 3.734 Bewertungen
                                für carspector.de</p>
                        </div>
                        <div class="col-md-3 d-none d-lg-block d-xl-block ps-5">
                            <div class="  ms-1 " style="font-size: 20px">
                                <span class=""><i class="fa fa-star checked1"></i></span>
                                <span class=""><i class="fa fa-star checked1"></i></span>
                                <span class=""><i class="fa fa-star checked1"></i></span>
                                <span class=""><i class="fa fa-star checked1"></i></span>
                                <span class=""><i class="fa fa-star checked1"></i></span>
                            </div>
                            <h6 class="fw-bold pt-1 ms-1 ">Sehr empfehlenswert!</h6>
                            <p class=" ms-1 paragraph">Sehr zufrieden mit dem gesamten Ablauf, von der Auswahl des Prüfers bis zur Buchung einfach gestaltet.</p>
                            <p class="pb-2 ms-1 paragraph">T. Borchert, vor 4 Tagen</p>
                        </div>
                        <div class="col-md-3 d-none d-lg-block d-xl-block ps-5">
                            <div class="  ms-1 " style="font-size: 20px">
                                <span class=""><i class="fa fa-star checked1"></i></span>
                                <span class=""><i class="fa fa-star checked1"></i></span>
                                <span class=""><i class="fa fa-star checked1"></i></span>
                                <span class=""><i class="fa fa-star checked1"></i></span>
                                <span class=""><i class="fa fa-star checked1"></i></span>
                            </div>
                            <h6 class="fw-bold pt-1 ms-1 ">Sehr empfehlenswert!</h6>
                            <p class=" ms-1 paragraph">Sehr zufrieden mit dem gesamten Ablauf, von der Auswahl des Prüfers bis zur Buchung einfach gestaltet.</p>
                            <p class="pb-2 ms-1 paragraph">T. Borchert, vor 4 Tagen</p>
                        </div>

                        <div class="col-md-3 d-none d-lg-block d-xl-block ps-5">
                            <div class="  ms-1 " style="font-size: 20px">
                                <span class=""><i class="fa fa-star checked1"></i></span>
                                <span class=""><i class="fa fa-star checked1"></i></span>
                                <span class=""><i class="fa fa-star checked1"></i></span>
                                <span class=""><i class="fa fa-star checked1"></i></span>
                                <span class=""><i class="fa fa-star checked1"></i></span>
                            </div>
                            <h6 class="fw-bold pt-1 ms-1 ">Sehr empfehlenswert!</h6>
                            <p class=" ms-1 paragraph">Sehr zufrieden mit dem gesamten Ablauf, von der Auswahl des Prüfers bis zur Buchung einfach gestaltet.</p>
                            <p class="pb-2 ms-1 paragraph">T. Borchert, vor 4 Tagen</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>

    <div class="container">
        <div class="row pb-3 ">
            <div class="col-md-12">
                <h4 class="fw-bolder pt-5 pb-5 text-center">Zum idealen Kfz-Prüfer mit nur wenigen Klicks</h4>
            </div>
            <div class="col-md-4 pt-3 px-5">
                <div class="text-center mx-auto  rounded " style="height: 70px;width: 80px;background-color: #d1e4fc">
                    <img src="assests/images/icons/ort%20(1)%201.png" class="img mt-2" style="height: 70%;width: 60%" >
                </div>
                <h6 class="fw-bold pt-2 text-center">1. Stadt eingeben</h6>
                <p class="text-center">Finde deinen passenden Kfz-Prüfer direkt in deiner Nähe bzw. in der Nähe deines Wunschfahrzeugs.</p>
            </div>
            <div class="col-md-4 pt-3 px-5">
                <div class="text-center mx-auto  rounded " style="height: 70px;width: 80px;background-color: #d1e4fc">
                    <img src="assests/images/icons/mechaniker%201.png" class="img mt-2" style="height: 70%;width: 60%" >
                </div>
                <h6 class="fw-bold pt-2 text-center">2. Kfz-Prüfer vergleichen</h6>
                <p class="text-center">Vergleiche Profile, Preise und Erfahrungsberichte auf einen Blick.</p>
            </div>
            <div class="col-md-4 pt-3 px-5">
                <div class="text-center mx-auto  rounded " style="height: 70px;width: 80px;background-color: #d1e4fc">
                    <img src="{{ asset('assests/images/icons/calendar%201.png') }}" class="img mt-2" style="height: 70%;width: 60%" >
                </div>
                <h6 class="fw-bold pt-2 text-center">3. Favoriten finden und buchen</h6>
                <p class="text-center">Buche deinen Favoriten und lege deinen Wunschtermin fest.</p>
            </div>
            <div class="col-md-12">
                <form action="{{route('examiners')}}" method="get">
                <div class="row pb-5">
                    <div class="col-12 col-md-12 col-lg-6 col-xl-6 text-end  pt-3 ">
{{--                        <input type="text" name="city" class="btn text-center col-12 col-md-12 col-lg-6 btn12" placeholder="Stadt" />--}}
                        <div class="fav-btn1 col-12 ms-auto col-md-12 col-lg-6">
                                    <span class="input-icon">
                                        <img src="{{ asset('assests/images/icons/gebaude 1.png') }}" style="height:20px ">
                                    </span>
                            <input name="city" type="text " class="form-control text-start ps-4 bg-white"  placeholder="Stadt" >
                        </div>
                    </div>
                    <div class="col-12 col-md-12  pt-3  col-lg-6 col-xl-6 ">
{{--                        <button type="submit" class="btn col-12 col-md-12 col-lg-6 text-white px-5" style="background-color: #074BA3">Los geht’s</button>--}}
                        <div class="fav-btn col-12 col-md-12 col-lg-7 ">
                            <button type="button " class="form-control border-0 text-decoration-none  text-start" style="background: #0a8216" >Jetzt Kfz-Prüfer finden</button>
                            <span class="input-icon2">
                                             <img src="{{ asset('assests/images/icons/finden 1.png') }}" style="height: 20px">
                                        </span>
                        </div>

                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row" style="background-color: #1877f2">
            <div class="col-md-12">
                <div class="container ">
                    <div class="row pb-5">
                        <div class="col-6 ps-0 ps-lg-3 ps-xl-3 col-md-3 pt-5  ">
                            <h6 class="text-white ">Mehr als </h6>
                            <h5 class="text-white py-2 fw-bolder">100.000</h5>
                            <h6 class="text-white">Kfz-Prüfer vermittelt</h6>
                        </div>
                        <div class="col-6 ps-0 ps-lg-3 ps-xl-3  col-md-3 pt-5  ">
                            <h6 class="text-white  ">Bereits</h6>
                            <h5 class="text-white py-2 fw-bolder">10.000</h5>
                            <h6 class="text-white">zufriedene Kunden</h6>
                        </div>
                        <div class="col-6 ps-0 ps-lg-3 ps-xl-3  col-md-3 pt-5  ">
                            <h6 class="text-white">Kundenbewertung</h6>
                            <h5 class="text-white py-2 fw-bolder">4,7 / 5</h5>
                            <h6 class="text-white">Sterne</h6>
                        </div>
                        <div class="col-6 ps-0 ps-lg-3 ps-xl-3  col-md-3 pt-5  ">
                            <h6 class="text-white ">In über </h6>
                            <h5 class="text-white py-2 fw-bolder">200</h5>
                            <h6 class="text-white">Städten verfügbar</h6>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="fw-bolder text-center pt-3 pb-2">Deine Vorteile mit Carspector</h4>
            </div>
            <div class="col-12 col-md-6 pt-4 px-3 px-lg-4 px-xl-4 pe-5">
                <div class="text-center rounded " style="height: 70px;width: 80px;background-color: #d1e4fc">
                    <img src="assests/images/icons/mechaniker%201.png" class="img mt-2" style="height: 70%;width: 60%" >
                </div>
                <h6 class="fw-bold pt-2 mt-1 ">Dein idealer Kfz-Prüfer</h6>
                <p class="">Vergleiche Preise und Bewertungen tausender Kfz-Prüfer und buche in nur wenigen Klicks den Kfz-Prüfer, der am besten zu dir passt.</p>
            </div>

            <div class="col-12 col-md-6 pt-4  px-3 px-lg-4 px-xl-4 pe-5">
                <div class="text-center rounded " style="height: 70px;width: 80px;background-color: #d1e4fc">
                    <img src="assests/images/icons/sicherheit%201.png" class="img mt-2" style="height: 70%;width: 60%" >
                </div>
                <h6 class="fw-bold pt-2 mt-1 ">Sicher und problemlos</h6>
                <p class="">Durch unsere strengen Vorgaben und Anforderungen an die Kfz-Prüfer garantieren wir, dass jeder Kunden durch unseren Service zufrieden gestellt wird und sicher zum neuen Gebrauchtwagen kommt.</p>
            </div>

            <div class="col-12 col-md-6 pt-4 px-3 px-lg-4 px-xl-4 pe-5">
                <div class="text-center rounded " style="height: 70px;width: 80px;background-color: #d1e4fc">
                    <img src="assests/images/icons/hotline%201.png" class="img mt-2" style="height: 70%;width: 60%" >
                </div>
                <h6 class="fw-bold pt-2 mt-1 ">Zuverlässiger Kundenservice</h6>
                <p class="">Der Carspector Kundenservice ist Montag bis Freitag von 09:00 bis 17:00 per E-Mail oder Telefon für dich da und hilft dir gerne weiter.</p>
            </div>
            <div class="col-12  col-md-6 pt-4 px-3 px-lg-4 px-xl-4 pe-5">
                <div class="text-center rounded " style="height: 70px;width: 80px;background-color: #d1e4fc">
                    <img src="assests/images/icons/vorteil%201.png" class="img mt-2" style="height: 70%;width: 60%" >
                </div>
                <h6 class="fw-bold pt-2 mt-1 ">Deine persönliche Note</h6>
                <p class="">Du hast spezielle Wünsche und Fragen zu deinem Wunschfahrzeug? Notiere sie dir und informiere deinen Kfz-Prüfer - er wird sich über deine Eigeninitiative freuen!</p>
            </div>
            <div class="col-12  ">
                <div class="row justify-content-center pt-2">
                    <div class="col-11  d-block d-lg-none">
                        <div class="fav-btn " style="border: 2px solid black">
                            <button type="button " class="form-control text-dark border-0 text-decoration-none  text-start" style="border: 2px solid black" >Erfahre mehr über Vorteile</button>
                            <span class="input-icon2">
                                             <img src="{{ asset('assests/images/icons/die-info 1.png') }}" style="height: 20px">
                                        </span>
                        </div>
                    </div>
                    <div class="col-8 d-none d-lg-block rounded" style="background: #074ba3">
                        <div class="row">
                            <div class="col-7 px-0 mx-0 ">
                            <p class="text-white ps-2 my-0 py-0 py-3">Welche Vorteile habe ich wenn ich Carspector nutze?</p>
                            </div>
                            <div class="col-5 " >
                                <div class="row" >
                                    <div class="col-12 py-2 rounded" >
                                        <div class="fav-btn  ">
                                            <button type="button " class="form-control text-dark border-0 text-decoration-none  text-start" style="border: 2px solid black" >Erfahre mehr über Vorteile</button>
                                            <span class="input-icon2">
                                             <img src="{{ asset('assests/images/icons/die-info 1.png') }}" style="height: 20px">
                                        </span>
                                        </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 pt-3 pb-3">
                <form action="{{route('examiners')}}" method="get">
                <div class="row pb-5">
                    <div class="col-12 col-md-12 col-lg-6 col-xl-6 text-end  pt-3 ">
{{--                        <input type="text" placeholder="Stadt" class="btn col-12 col-md-12 col-lg-6 btn12" name="city" />--}}
                        <div class="fav-btn1 col-12 ms-auto col-md-12 col-lg-6">
                                    <span class="input-icon">
                                        <img src="{{ asset('assests/images/icons/gebaude 1.png') }}" style="height:20px ">
                                    </span>
                            <input name="city" type="text " class="form-control text-start ps-4 bg-white"  placeholder="Stadt" >
                        </div>
                    </div>
                    <div class="col-12 col-md-12  pt-3  col-lg-6 col-xl-6 ">
{{--                        <button type="submit" class="btn col-12 col-md-12 col-lg-6 text-white px-5" style="background-color: #074BA3">Los geht’s</button>--}}
                        <div class="fav-btn col-12 col-md-12 col-lg-7 ">
                            <button type="button " class="form-control border-0 text-decoration-none  text-start" style="background: #0a8216" >Jetzt Kfz-Prüfer finden</button>
                            <span class="input-icon2">
                                             <img src="{{ asset('assests/images/icons/finden 1.png') }}" style="height: 20px">
                                        </span>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="container-fluid" >
        <div class="row " style="background-color: #1877f2">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="row">
                    <div class="col-1 "></div>
                    <div class="col-12 ps-lg-0 ps-3 ms-lg-0 ps-xl-0 ms-xl-0 pe-3 pe-lg-5 pe-xl-5 col-md-12 col-lg-6 col-xl-6 ">
                        <h3 class="text-white pt-3 fw-bolder ">Entspannt durch den #Gebrauchtwagenkauf</h3>
                        <p class="text-white">Genieße Sicherheit durch deinen passenden Kfz-Prüfer. Über die Carspector Plattform findest du deinen idealen Kfz-Prüfer für deinen neuen Gebrauchtwagen. Neben einer großen und detaillierten Checkliste, welche am Fahrzeug abgearbeitet wird, beantwortet dein Prüfer dir alle Fragen und klärt Bedenken direkt vor Ort und Stelle - so geht Gebrauchtwagenkauf.</p>
                        <p class="text-white pt-3">Probiere es jetzt aus!</p>

                        <div class="col-md-12 pb-2">
                            <form action="{{route('examiners')}}" method="get">
                            <div class="row">
                                <div class="col-md-5 offset-lg-1 pt-3  ">
{{--                                    <input class="btn col-12 px-5" style="background-color: white" name="city" placeholder="Stadt" />--}}
                                    <div class="fav-btn1 col-12 ms-auto col-md-12">
                                    <span class="input-icon">
                                        <img src="{{ asset('assests/images/icons/gebaude 1.png') }}" style="height:20px ">
                                    </span>
                                        <input name="city" type="text " class="form-control text-start ps-4 bg-white"  placeholder="Stadt" >
                                    </div>
                                </div>
                                <div class="col-md-6  pt-3  ">
{{--                                    <button type="submit" class="btn col-12 btn-dark  px-5">Los geht’s</button>--}}
                                    <div class="fav-btn col-12 ">
                                        <a type="button " class="form-control border-0 text-decoration-none  text-start" style="background: black" >Jetzt Kfz-Prüfer finden</a>
                                        <span class="input-icon2">
                                             <img src="{{ asset('assests/images/icons/finden 1.png') }}" style="height: 20px">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 mt-3 mt-md-3 mt-lg-0 mt-xl-0 text-lg-end text-xl-end  text-center col-md-12 col-lg-5 col-xl-5 py-0 my-0 px-0 mx-0">
                        <img src="assests/images/Design%20ohne%20Titel%20(57)%201.png" class="img   px-0 mx-0" style="height: auto;width: 100%">
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="row people-section1 px-0 mx-0">
        <div class="col-12 px-lg-4  pb-5">
            <div class="container pb-4 pt-3 px-sm-0 px-0 px-lg-5 px-xl-5">
                <div class="row px-0 mx-0 justify-content-center">
                    <div class="col-12">
                        <h4 class="fw-bolder pt-5 text-center">Persönliche Erfahrungsberichte von Kunden</h4>
                        <p class="text-center pb-0 mb-0" style="color: #6A6A6A">Vergleiche persönliche Erfahrungsberichte und Bewertungen anderer Kunden. Diese </p>
                        <p class="text-center py-0 my-0" style="color: #6A6A6A">finest du direkt im Profil der Kfz-Prüfer. </p>
                    </div>
                </div>
                <div class="row px-0 ps-lg-4 ps-xl-4 py-1">
                    <div class="col-12 col-lg-6 col-xl-6 pt-5 " >
                        <div class="pb-4 " style="border: 2px solid black">
                            <p class="px-3 pt-4" >“Schnelle und einfache Abwicklung. Freundlicher, flexibler Fachmann im Einsatz. So sollte es sein!”</p>
                            <div class="row">
                                <div class="col-2 ps-4">
                                    <img src="assests/images/woman-g20e65f8d9_1920%201%20(1).png" style="height: 70px;width: 70px" class="rounded">
                                </div>
                                <div class="col-10">
                                    <div class="row ps-4 ps-lg-0 ps-xl-0">
                                        <div class="col-12 col-sm-7 col-lg-7 col-xl-7">
                                            <h5 class="ps-4 ps-lg-0 ps-xl-0 pt-0 pt-sm-4 pt-xl-4">Susanne Lenz</h5>
                                        </div>
                                        <div class="col-12 ps-4 ps-sm-0 ps-xl-0 col-sm-5 col-md-5 col-lg-5 col-xl-5 pt-0 pt-sm-4 pt-xl-4">
                                            <span class="fa fa-star checked12 ms-2"></span>
                                            <span class="fa fa-star checked12"></span>
                                            <span class="fa fa-star checked12"></span>
                                            <span class="fa fa-star checked12"></span>
                                            <span class="fa fa-star checked12"></span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-6 pt-5 " >
                        <div class="pb-4 " style="border: 2px solid black">
                            <p class="px-3 pt-4" >“Schnelle und einfache Abwicklung. Freundlicher, flexibler Fachmann im Einsatz. So sollte es sein!”</p>
                            <div class="row">
                                <div class="col-2 ps-4">
                                    <img src="assests/images/woman-g20e65f8d9_1920%201%20(1).png" style="height: 70px;width: 70px" class="rounded">
                                </div>
                                <div class="col-10">
                                    <div class="row ps-4 ps-lg-0 ps-xl-0">
                                        <div class="col-12 col-sm-7 col-lg-7 col-xl-7">
                                            <h5 class="ps-4 ps-lg-0 ps-xl-0 pt-0 pt-sm-4 pt-xl-4">Susanne Lenz</h5>
                                        </div>
                                        <div class="col-12 ps-4 ps-sm-0 ps-xl-0 col-sm-5 col-md-5 col-lg-5 col-xl-5 pt-0 pt-sm-4 pt-xl-4">
                                            <span class="fa fa-star checked12 ms-2"></span>
                                            <span class="fa fa-star checked12"></span>
                                            <span class="fa fa-star checked12"></span>
                                            <span class="fa fa-star checked12"></span>
                                            <span class="fa fa-star checked12"></span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="row px-4">
            <div class="col-12 px-lg-5 px-xl-5 mt-5">
                <h4 class="text-center fw-bolder  pb-4" ><span style="color:#1877f2;">FAQ</span> - Wir beantworten deine Fragen</h4>
                <div class="accordion accordion-flush" id="faqlist">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button acordion-edit collapsed py-3" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                                Was ist Carspector?
                            </button>
                        </h2>
                        <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                            <div class="accordion-body accordion-body-edit">
                                Carspector ist Deutschlands führender Online-Marktplatz zur Vermittlung von selbstständigen Kfz-Prüfer. Auf der Website kannst du mit nur wenigen Klicks schnell und unkompliziert deinen verifizierten Kfz-Prüfer buchen.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button acordion-edit py-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                                Wie funktioniert Carspector genau?
                            </button>
                        </h2>
                        <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                            <div class="accordion-body accordion-body-edit">
                                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button acordion-edit py-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                                Wie funktioniert Carspector genau?
                            </button>
                        </h2>
                        <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                            <div class="accordion-body accordion-body-edit">
                                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button acordion-edit py-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                                Wie funktioniert Carspector genau?
                            </button>
                        </h2>
                        <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                            <div class="accordion-body accordion-body-edit">
                                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button acordion-edit py-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-5">
                                Wie funktioniert Carspector genau?
                            </button>
                        </h2>
                        <div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                            <div class="accordion-body accordion-body-edit">
                                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button acordion-edit py-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-6">
                                Wie funktioniert Carspector genau?
                            </button>
                        </h2>
                        <div id="faq-content-6" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                            <div class="accordion-body accordion-body-edit">
                                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 pt-4 pb-5">
                    <h5 class=" pt-5 fw-bolder">Deine Fragen wurden noch nicht ausreichend beantwortet?</h5>
                    <h5 class=" pt-2 pb-0 mb-0 ">Dann besuche jetzt das <span class="fw-bolder" style="color: #1877f2">Carspector Hilfeportal</span> oder kontaktiere unseren Kundenservice via E-Mail an </h5>
                    <h5 class="py-0 my-0"><span class="fw-bolder" style="color: #1877f2">kontakt@carspector.de</span> oder schreibe uns via WhatsApp an <span class="fw-bolder" style="color: #1877f2">01577-4993273 </span>.</h5>
                </div>
                <div class="col-md-12 pt-4 pb-3">
                    <div class="row pb-5">
                        <div class="col-12 col-md-12 col-lg-6 col-xl-6 text-end  pt-3 ">
{{--                            <button class="btn col-12 col-md-12 col-lg-6 btn12" >Stadt</button>--}}
                            <div class="fav-btn1 col-12 ms-auto col-md-12 col-lg-6">
                                    <span class="input-icon">
                                        <img src="{{ asset('assests/images/icons/gebaude 1.png') }}" style="height:20px ">
                                    </span>
                                <input name="city" type="text " class="form-control text-start ps-4 bg-white"  placeholder="Stadt" >
                            </div>
                        </div>
                        <div class="col-12 col-md-12  pt-3  col-lg-6 col-xl-6 ">
{{--                            <button class="btn col-12 col-md-12 col-lg-6 text-white px-5" style="background-color: #074BA3">Los geht’s</button>--}}
                            <div class="fav-btn col-12 col-md-12 col-lg-7 ">
                                <button type="button " class="form-control border-0 text-decoration-none  text-start" style="background: #0a8216" >Jetzt Kfz-Prüfer finden</button>
                                <span class="input-icon2">
                                             <img src="{{ asset('assests/images/icons/finden 1.png') }}" style="height: 20px">
                                        </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row" style="background-color: #d1e4fc">
            <div class="col-12 col-md-12 col-lg-3 map-image px-0 mx-0" style="background-image: url('assests/images/image%209.png')">
                <!--            <img src="assests/images/image%209.png" class="img" style="height: 80%" >-->
            </div>
            <div class="col-12 mega-row col-md-12 col-lg-9 ">
                <h5 class="fw-bold ps-4 pt-3 pb-1">Buche einen Gebrauchtwagen-Prüfer unter anderem in diesen Städten:</h5>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">

                            <div class="col-12 col-lg-5 col-xl-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row ps-4">
                                            <div class="col-4  col-md-4 col-lg-4 col-xl-4">
                                                <ul class="list-group  mega-list">
                                                    <li class="list-group-item">Stuttgart</li>
                                                    <li class="list-group-item">Nürnberg</li>
                                                    <li class="list-group-item">München</li>
                                                    <li class="list-group-item">Mannheim</li>
                                                    <li class="list-group-item">Leipzig</li>
                                                    <li class="list-group-item">Koln</li>
                                                    <li class="list-group-item">Karlsruhe</li>
                                                    <li class="list-group-item">Hannover</li>
                                                    <li class="list-group-item">Hamburg</li>
                                                    <li class="list-group-item">Frankfurt</li>
                                                    <li class="list-group-item">Essen</li>
                                                    <li class="list-group-item">Duisburg</li>
                                                    <li class="list-group-item">Düsseldorf</li>
                                                    <li class="list-group-item">Dresden</li>
                                                    <li class="list-group-item">Dortmund</li>
                                                    <li class="list-group-item">Bremen</li>
                                                    <li class="list-group-item">Bonn</li>
                                                    <li class="list-group-item">Berlin</li>
                                                </ul>
                                            </div>
                                            <div class="col-4 col-md-4 col-lg-4 col-xl-4">
                                                <ul class="list-group  mega-list">
                                                    <li class="list-group-item">Aachen</li>
                                                    <li class="list-group-item">Augsburg</li>
                                                    <li class="list-group-item">Backnang</li>
                                                    <li class="list-group-item">Baden-Baden</li>
                                                    <li class="list-group-item">Bamberg</li>
                                                    <li class="list-group-item">Bayreuth</li>
                                                    <li class="list-group-item">Bergisch Gladbach</li>
                                                    <li class="list-group-item">Bergkamen</li>
                                                    <li class="list-group-item">Bielefeld</li>
                                                    <li class="list-group-item">Bocholt</li>
                                                    <li class="list-group-item">Bochum</li>
                                                    <li class="list-group-item">Bottrop</li>
                                                    <li class="list-group-item">Braunschweig</li>
                                                    <li class="list-group-item">Bremerhaven</li>
                                                    <li class="list-group-item">Cottbus</li>
                                                    <li class="list-group-item">Chemnitz</li>
                                                    <li class="list-group-item">Darmstadt</li>
                                                </ul>
                                            </div>
                                            <div class="col-4 col-md-4 col-lg-4 col-xl-4">
                                                <ul class="list-group  mega-list">
                                                    <li class="list-group-item">Delmenhorst</li>
                                                    <li class="list-group-item">Düsseldorf</li>
                                                    <li class="list-group-item">Dormagen</li>
                                                    <li class="list-group-item">Elmshorn</li>
                                                    <li class="list-group-item">Erlangen</li>
                                                    <li class="list-group-item">Erfurt</li>
                                                    <li class="list-group-item">Esslingen</li>
                                                    <li class="list-group-item">Euskirchen</li>
                                                    <li class="list-group-item">Frankfurt Oder</li>
                                                    <li class="list-group-item">Frechen</li>
                                                    <li class="list-group-item">Freiburg</li>
                                                    <li class="list-group-item">Friedrichshafen</li>
                                                    <li class="list-group-item">Fürth</li>
                                                    <li class="list-group-item">Garbsen</li>
                                                    <li class="list-group-item">Gelsenkirchen</li>
                                                    <li class="list-group-item">Göttingen</li>
                                                    <li class="list-group-item">Hagen</li>
                                                    <li class="list-group-item">Halle Saale</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-12 col-lg-7 col-xl-7">
                                <div class="row">
                                    <div class="col-12 col-lg-11 col-xl-11">
                                        <div class="row">
                                            <div class="col-12 ps-3 ps-lg-0 ps-xl-0">
                                                <div class="row ps-3 ps-lg-0 ps-xl-0">
                                                    <div class="col-4  col-lg-3 col-xl-3">
                                                        <ul class="list-group mega-list ps-1">
                                                            <li class="list-group-item">Hamm</li>
                                                            <li class="list-group-item">Hanau</li>
                                                            <li class="list-group-item">Hattingen</li>
                                                            <li class="list-group-item">Heidelberg</li>
                                                            <li class="list-group-item">Heilbronn</li>
                                                            <li class="list-group-item">Herne</li>
                                                            <li class="list-group-item">Herten</li>
                                                            <li class="list-group-item">Hilden</li>
                                                            <li class="list-group-item">Hürth</li>
                                                            <li class="list-group-item">Ingolstadt</li>
                                                            <li class="list-group-item">Jena</li>
                                                            <li class="list-group-item">Kassel</li>
                                                            <li class="list-group-item">Kerpen</li>
                                                            <li class="list-group-item">Kiel</li>
                                                            <li class="list-group-item">Kleve</li>
                                                            <li class="list-group-item">Krefeld</li>
                                                            <li class="list-group-item">Langenfeld</li>
                                                            <li class="list-group-item">Leverkusen</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-4   col-lg-3 col-xl-3 ">
                                                        <ul class="list-group  ms-1 mega-list">
                                                            <li class="list-group-item">Lippstadt</li>
                                                            <li class="list-group-item">Lübeck</li>
                                                            <li class="list-group-item">Ludwigshafen</li>
                                                            <li class="list-group-item">Magdeburg</li>
                                                            <li class="list-group-item">Mainz</li>
                                                            <li class="list-group-item">Marburg</li>
                                                            <li class="list-group-item">Menden Sauerland</li>
                                                            <li class="list-group-item">Moers</li>
                                                            <li class="list-group-item">Mönchengladbach</li>
                                                            <li class="list-group-item">Mülheim</li>
                                                            <li class="list-group-item">Münster</li>
                                                            <li class="list-group-item">Neuss</li>
                                                            <li class="list-group-item">Norderstedt</li>
                                                            <li class="list-group-item">Oberhausen</li>
                                                            <li class="list-group-item">Offenbach</li>
                                                            <li class="list-group-item">Osnabrück</li>
                                                            <li class="list-group-item">Langenfeld</li>
                                                            <li class="list-group-item">Paderborn</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-4  col-lg-3 col-xl-3">
                                                        <ul class="list-group  mega-list">
                                                            <li class="list-group-item">Potsdam</li>
                                                            <li class="list-group-item">Pulheim</li>
                                                            <li class="list-group-item">Recklinghausen</li>
                                                            <li class="list-group-item">Regensburg</li>
                                                            <li class="list-group-item">Saarbrücken</li>
                                                            <li class="list-group-item">Schweinfurt</li>
                                                            <li class="list-group-item">Siegen</li>
                                                            <li class="list-group-item">Solingen</li>
                                                            <li class="list-group-item">Troisdorf</li>
                                                            <li class="list-group-item">Tübingen</li>
                                                            <li class="list-group-item">Ulm</li>
                                                            <li class="list-group-item">Viersen</li>
                                                            <li class="list-group-item">Wiesbaden</li>
                                                            <li class="list-group-item">Willich</li>
                                                            <li class="list-group-item">Witten</li>
                                                            <li class="list-group-item">Wuppertal</li>
                                                            <li class="list-group-item">Flensburg</li>
                                                            <li class="list-group-item">Freising</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-4 d-none d-lg-block d-xl-block  col-lg-3 col-xl-3">
                                                        <ul class="list-group  mega-list">
                                                            <li class="list-group-item">Gießen</li>
                                                            <li class="list-group-item">Kaiserslautern</li>
                                                            <li class="list-group-item">Koblenz</li>
                                                            <li class="list-group-item">Konstanz</li>
                                                            <li class="list-group-item">Ludwigsburg</li>
                                                            <li class="list-group-item">Marl</li>
                                                            <li class="list-group-item">Oldenburg</li>
                                                            <li class="list-group-item">Pforzheim</li>
                                                            <li class="list-group-item">Ratingen</li>
                                                            <li class="list-group-item">Remscheid</li>
                                                            <li class="list-group-item">Reutlingen</li>
                                                            <li class="list-group-item">Rosenheim</li>
                                                            <li class="list-group-item">Rostock</li>
                                                            <li class="list-group-item">Salzgitter</li>
                                                            <li class="list-group-item">Trier</li>
                                                            <li class="list-group-item">Würzburg</li>
                                                            <li class="list-group-item">Darmstadt</li>
                                                            <li class="list-group-item">Zwickau</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 d-block d-lg-none d-xl-none px-0 mx-0">
                <div class="" style="height: 250px;width: 100%;">
                    <img src="assests/images/image%209.png" class="" style="height: 100%;width: 100%;">
                </div>
            </div>
        </div>
    </div>


    <div class="row workshop-section1 py-4 px-0 mx-0">
        <div class="col-12">
            <div class="container">
                <div class="row pb-3">
                    <div class="col-12  ">
                        <h5 class="text-center fw-bold py-3 mt-5 ">Jetzt buchen und sicher Gebrauchtwagen kaufen!</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid pb-5">
            <form method="get" action="{{route('examiners')}}">
            <div class="container" >
                <div class="row">
                <div class="col-12 col-md-12 px-4 col-lg-6 col-xl-6 text-center text-lg-end text-xl-end pt-4">
{{--                    <input type="text" href="#" class="btn col-12 col-sm-auto col-md-auto col-lg-auto col-xl-auto  building-btn" name="city" placeholder="Stadt" />--}}
                    <div class="fav-btn1 col-12 ms-auto col-md-12 col-lg-5">
                                    <span class="input-icon">
                                        <img src="{{ asset('assests/images/icons/gebaude 1.png') }}" style="height:20px ">
                                    </span>
                        <input name="city" type="text " class="form-control text-start ps-4 bg-white"  placeholder="Stadt" >
                    </div>
                </div>
                <div class="col-12 col-md-12 px-4 col-lg-6 col-xl-6 text-center text-lg-start text-xl-start pt-4">
{{--                    <button type="submit" class="btn col-12 text-white col-sm-auto col-md-auto col-lg-auto col-xl-auto building-btn " style="background-color: #1877f2" >Los geht’s</button>--}}
                    <div class="fav-btn col-12 col-md-12 col-lg-6 ">
                        <button type="submit" class="form-control border-0 text-decoration-none  text-start" style="background: #0a8216" >Jetzt Kfz-Prüfer finden</button>
                        <span class="input-icon2">
                                             <img src="{{ asset('assests/images/icons/finden 1.png') }}" style="height: 20px">
                                        </span>
                    </div>
                </div>
                </div>
            </div>

            </form>
        </div>
        </div>
    </div>
@endsection
