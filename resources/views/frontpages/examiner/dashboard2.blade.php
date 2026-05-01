@extends('mainpages.mainfront')
@section('style')
    <style>

    </style>
    <link
        href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet"
    />
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
    <link
        href="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.css"
        rel="stylesheet"
    />

    <style>
        .filepond--list-scroller{
            min-height: 500px;
        }
    </style>
@endsection
@section('content')
    <div class="container px-3">
        <h5 class="fw-bold pt-5 text-center" style="color: #1877f2">Partner Portal</h5>
        <div class="row mx-lg-5 mx-xl-5" style="border: 1px solid black">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-12 col-lg-7 col-xl-7">
                        <div class="row pt-3 pb-3">
                            <div class="col-3 col-lg-2 col-xl-2 px-0 mx-0 text-center">
                                <div class="rounded-circle">
                                    <img src="{{$user->image}}" class="img img-fluid user-image" style="height:100px;width: 100px;border-radius: 50%;">
                                </div>
                            </div>
                            <div class="col-9 ps-2 px-0 mx-0 pt-1 ">
                                <h6 class="fw-bolder pt-2 mx-0 my-0 px-0 py-0" >Angemeldet als: {{$user->name}}</h6>
                                <div class="col-12 pt-1">
                                    <span><i class="fa fa-star checked12"></i> </span>
                                    <span><i class="fa fa-star checked12"></i> </span>
                                    <span><i class="fa fa-star checked12"></i> </span>
                                    <span><i class="fa fa-star checked12"></i> </span>
                                    <span><i class="fa fa-star checked12"></i> </span>
                                    <span class="text-muted ps-3 pt-1">4,7/5</span>
                                </div>
                                <p class="pb-3 pt-3" >Abgeschlossene Aufträge: <span class="fw-bold">  27</span></p>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-11" style="border-bottom: 1px solid black">

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4 col-lg-3 col-xl-3">
                                <h6 class="fw-bold ps-3">Arbeitsgebiet:</h6>
                            </div>
                            <div class="offset-1 offset-lg-0  col-7 col-lg-4 col-xl-4">
                                <ul class="col-12" id="examiner-cities">
                                    @foreach($examinerCities as $city)
                                    <li>{{$city->name}} <a href="{{route('examiner.delete-city',$city->id)}}"><span class="float-end"><i class="fa fa-circle-xmark" style="color: red;font-size: 18px"></i></span> </a></li>
                                    @endforeach

                                </ul>
                            </div>
                            <div class="col-12 col-lg-5 col-xl-5 ps-4">
                              <form action="{{ route('examiner.update-cities') }}" class="form-xhr" method="POST">
                             @csrf
                                <input type="text" name="city" class="btn12 py-1 mt-2 form-control" placeholder="Neues Arbeitsgebiet" />
                                <button type="submit" class="btn btn-success py-1 mt-2 mt-lg-2 mt-xl-2 " >Neues Arbeitsgebiet <span style="display: none;" class="spinner-border spinner-border-sm price-loading" role="status" aria-hidden="true"></span></button>
                              </form>
                            </div>
                        </div>
                        <div class="row pe-4 pt-3 justify-content-center">
                            <div class="col-11" style="border-bottom: 1px solid black">
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-4 col-lg-2 col-xl-2 ">
                                <h6 class="fw-bold ps-3">Preis:</h6>
                            </div>
                            <div class="col-4 col-xl-2 col-lg-2">
                                <p><span id="price">{{$user->price}}</span> €</p>
                            </div>
                            <div class="col-12 col-lg-5 col-xl-5 ps-4">
                              <form action="{{ route('examiner.change-price') }}" class="form-xhr" method="POST">
                              @csrf
                                <input type="text" name="new_price" class="form-control btn12 py-1 mt-2 " placeholder="Neuer Preis" />
                                <button type="submit" class="btn btn-success py-1 mt-2 mt-lg-2 mt-xl-2 " >speichern <span style="display: none;" class="spinner-border spinner-border-sm price-loading" role="status" aria-hidden="true"></span></button>
                              </form>
                            </div>
                        </div>
                    </div>
                    <div class="offset-lg-1 offset-xl-1 text-center px-4 py-3 col-12 col-lg-4 col-xl-4  pt-4">
                        <h6 class="fw-bold">Mein Guthaben: <span class="" style="color: #1877f2">559 €</span></h6>
                        <button class="btn text-white col-10 py-1" style="background:#1877f2">Jetzt auszahlen</button>
                        <h6 class="fw-bolder pt-4">Einstellungen</h6>
                        <div class="row pt-1">
                            <div class="col-12 text-center py-2" style="border: 1px solid black">
                                <button class="btn text-white mt-2 col-10 py-1" data-bs-toggle="modal" data-bs-target="#profile-picture" style="background:#1877f2">Profilbild ändern</button>
                                <a href="{{ route('password.change') }}" class="btn text-white mt-2 col-10 py-1" style="background:#1877f2">Passwort ändern</a>
                                <button data-id="{{$user->id}}" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn  btn-examiner-profile text-white mt-4 col-10 py-1" style="background:#1877f2">Mein Profil ansehen</button>
                                <a href="{{route('examiner.edit-profile')}}" class="btn text-white mt-2 col-10 py-1" style="background:#1877f2">Profil bearbeiten</a>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn text-white mt-4 col-10 py-1" style="background:#1877f2">Abmelden</a>


                                <button class="btn btn-dark mt-4 col-10 py-1" >Abgeschlossene Aufträge</button>
                                <a href="{{route('examiner.availability')}}" class="btn btn-dark mt-4 col-10 py-1">Meine Verfügbarkeit</a>

                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12 py-3">
                <p class="text-center">Brauchst du Hilfe? Kontaktiere unseren Partner-Support:<span class="fw-bolder"> partner@carspector.de</span></p>
            </div>
        </div>
        <div class="row mx-1 justify-content-center pb-5">
            <div class="col-12 col-lg-4 col-xl-4" style="border: 1px solid black">
                <h6 class="fw-bold pt-2 py-0 my-0">Meine Aufträge</h6>
                <p class="" style="font-size: 14px">Aktive Aufträge: 2</p>
                @foreach($orders as $order)
                <div class="row px-1 mb-2 justify-content-center">
                    <div class="col-12 rounded py-1 " style="background-color: #1877f2">
                        <div class="row">
                            <div class="col-3">
                                <span class="text-white">{{date('d.m.Y',strtotime($order->date))}}</span>
                            </div>
                            <div class="col-2">
                                <span class="text-white">{{$order->time}}</span>
                            </div>
                            <div class="col-7" >
                                <div class="row">
                                    <div class="col-12">
                                        <button type="button" class="btn py-0 col-12" data-bs-toggle="modal" data-bs-target="#exampleModal1"  style="background-color: white">Alle Infos ansehen</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach



            </div>
        </div>



    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog custum-model-width modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="container pb-4">
                    <div class="row ">
                        <div class="col-lg-3 d-none d-lg-block">
                            <div class="row">
                                <div class="col-12 pt-3" style="background-color: #f0f0f0">
                                    <div class="row mx-1 pb-3" >
                                        <div class="col-12" style="background-color: white">
                                            <h6 class="text-primary fw-bolder pt-2">Bei Carspector erhältst du:</h6>
                                            <ul class="px-3">
                                                <li style="font-size: 14px">ein zertifiziertes Gebrauchtwagen-Gutachten</li>
                                                <li style="font-size: 14px">die Möglichkeit deinem Prüfer vor Ort Fragen zu stellen</li>
                                                <li style="font-size: 14px">die Meinung von einem Experten zu hören</li>
                                                <li style="font-size: 14px">die Chance deine Wünsche zu äußern</li>
                                                <li style="font-size: 14px">einen sicheren und überprüften Gebrauchtwagen</li>
                                                <li style="font-size: 14px">eine Zufriedenheitsgarantie</li>
                                                <li style="font-size: 14px">24/7 persönlichen Kundensupport</li>
                                            </ul>


                                            <div class="row">
                                                <div class="col-12 px-4"  >
                                                    <div class="row" style="border: 1px solid black">
                                                        <div class="col-12">
                                                            <h6 class="text-center fw-bold pt-1">Hilfe benötigt?</h6>
                                                            <p class="text-center" style="font-size: 14px">Kontaktiere gerne unseren persönlichen Kundenservice via E-Mail an <span style="color: #1877f2;font-weight: bold;"> kontakt@carspector.de</span> oder schreibe uns via WhatsApp an <span class="" style="color: #1877f2;font-weight: bold;">01577-4993273</span>.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="profile col-lg-9" id="profile_data"></div>
                    </div>
                    <div class="row d-lg-none ">
                        <div class="col-12 px-3  pt-3">
                            <div class="row " style="border: 1px solid black;box-shadow: 2px 2px 7px 0px rgba(0,0,0,0.20);">
                                <div class="col-12 pt-3" >
                                    <h4 class="fw-bold text-center">Hilfe benötigt?</h4>
                                    <p style="font-size: 18px" class="text-center">
                                        Kontaktiere gerne unseren persönlichen Kundenservice via E-Mail an <span style="color: #1877f2;font-weight: bold;"> kontakt@carspector.de</span> oder schreibe uns via WhatsApp an <span class="" style="color: #1877f2;font-weight: bold;">01577-4993273</span>.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="profile-picture" tabindex="-1" >
       <form method="post" class="form-xhr" enctype="multipart/form-data" action="{{route('examiner.update-image')}}">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" style="min-height: 350px">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="container pb-4">
                    <div class="row d-flex justify-content-center ">
                       <div class="col-6">
                           <input class="filepond file-uploader-grid" type="file"  data-max-file-size="10MB" accept="image/png, image/jpeg, video/mp4, video/mov" data-label-idle="&lt;div class=&quot;btn btn-primary mb-3&quot;&gt;&lt;i class=&quot;fi-cloud-upload me-1&quot;&gt;&lt;/i&gt;Upload photos / video&lt;/div&gt;&lt;br&gt;or drag them in">

                       </div>
                    </div>

                @csrf
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload & Save <span style="display: none;" class="spinner-border spinner-border-sm price-loading" role="status" aria-hidden="true"></span></button>
                </div>

            </div>

        </div>
       </form>
    </div>
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mx-0 ms-lg-5 ms-xl-5 ">
                            <div class="col-12 col-lg-5 col-xl-5">
                                <h6 class="fw-bolder pt-4 pb-1" style="font-size: 18px">Infos ansehen</h6>
                                <div class="row">
                                    <div class="col-md-12" style="border: 1px solid grey;background-color: #1877f2">
                                        <div class="row px-0 mx-0 pt-2 pb-1" >
                                            <div class="col-5 pt-2 px-0 mx-0 text-start">
                                                <span class="fw-bolder px-0 mx-0 text-white" style="font-size: 14px">Uhrzeit </span>
                                            </div>
                                            <div class="col-7 pb-3 pt-2 text-end">
                                                <p class=" py-0 my-0 text-white" style="font-size: 14px">27.05.2022 </p>
                                            </div>
                                            <hr class="text-white mt-1 mb-1 my-0">
                                        </div>


                                        <div class="row px-0 mx-0 pt-2 pb-1" >
                                            <div class="col-5 pt-2 px-0 mx-0 text-start">
                                                <span class="fw-bolder px-0 mx-0 text-white" style="font-size: 14px">Adresse </span>
                                            </div>
                                            <div class="col-7 pb-3 pt-2 text-end">
                                                <p class=" py-0 my-0 text-white" style="font-size: 14px">Lüderitzstraße 45e,
                                                    40595 Düsseldorf </p>
                                            </div>
                                            <hr class="text-white mt-1 mb-1 my-0">
                                        </div>


                                        <div class="row px-0 mx-0 pt-2 pb-1" >
                                            <div class="col-5 pt-2 px-0 mx-0 text-start">
                                                <span class="fw-bolder px-0 mx-0 text-white" style="font-size: 14px">Dein Name </span>
                                            </div>
                                            <div class="col-7 pb-3 pt-2 text-end">
                                                <p class=" py-0 my-0 text-white" style="font-size: 14px">Sebastian Stock </p>
                                            </div>
                                            <hr class="text-white mt-1 mb-1 my-0">
                                        </div>


                                        <div class="row px-0 mx-0 pt-2 pb-1" >
                                            <div class="col-5 pt-2 px-0 mx-0 text-start">
                                                <span class="fw-bolder px-0 mx-0 text-white" style="font-size: 14px">Telefon </span>
                                            </div>
                                            <div class="col-7 pb-3 pt-2 text-end">
                                                <p class=" py-0 my-0 text-white" style="font-size: 14px">4480169 </p>
                                            </div>
                                            <hr class="text-white mt-1 mb-1 my-0">
                                        </div>


                                        <div class="row px-0 mx-0 pt-2 pb-1" >
                                            <div class="col-5 pt-2 px-0 mx-0 text-start">
                                                <span class="fw-bolder px-0 mx-0 text-white" style="font-size: 14px">Fahrzeug </span>
                                            </div>
                                            <div class="col-7 pb-3 pt-2 text-end">
                                                <p class=" py-0 my-0 text-white" style="font-size: 14px">Toyota Yaris </p>
                                            </div>
                                            <hr class="text-white mt-1 mb-1 my-0">
                                        </div>


                                        <div class="row px-0 mx-0 pt-2 pb-1" >
                                            <div class="col-5 pt-2 px-0 mx-0 text-start">
                                                <span class="fw-bolder px-0 mx-0 text-white" style="font-size: 14px">Baujahr </span>
                                            </div>
                                            <div class="col-7 pb-3 pt-2 text-end">
                                                <p class=" py-0 my-0 text-white" style="font-size: 14px">2007 </p>
                                            </div>
                                            <hr class="text-white mt-1 mb-1 my-0">
                                        </div>

                                        <div class="row px-0 mx-0 pt-2 pb-1" >
                                            <div class="col-5 pt-2 px-0 mx-0 text-start">
                                                <span class="fw-bolder px-0 mx-0 text-white" style="font-size: 14px">Dein Prüfer </span>
                                            </div>
                                            <div class="col-7 pb-3 pt-2 text-end">
                                                <p class=" py-0 my-0 text-white" style="font-size: 14px">Andy Wosilat </p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-link bg-white py-1 col-12">Online-Link des Fahrzeugs</button>
                                        </div>

                                        <div class="col-12 text-start">
                                            <h6 class="text-white pt-2" >Deine Wünsche:</h6>
                                            <p class="text-white ps-2 " style="font-size: 14px">Mir ist wichtig, dass das Fahrzeug von vorne bis hinten überprüft wird und vorallem der Lack. Hatte immer Lackprobleme am besten einmal prüfen mit einem Lackschichtdickenmessgerät. Danke!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-7 col-xl-7 ">
                                <div class="row  mx-lg-3 mx-xl-3">
                                    <h6 class="fw-bolder pt-4 pb-1" style="font-size: 18px">Infos ansehen</h6>
                                    <div class="col-12" style="border: 1px solid black">
                                        <div class="row px-0 mx-0 pt-2 pb-1" >
                                            <div class="col-5 pt-2 px-0 mx-0 text-start">
                                                <span class="fw-bolder px-0 mx-0" style="font-size: 14px">Nachname </span>
                                            </div>
                                            <div class="col-7 pb-1 pt-2 text-end">
                                                <p class=" py-0 my-0 " style="font-size: 14px">Stock </p>
                                            </div>
                                            <hr class="mt-1 mb-1 my-0">
                                        </div>
                                        <div class="row px-0 mx-0 pt-2 pb-1" >
                                            <div class="col-5 pt-2 px-0 mx-0 text-start">
                                                <span class="fw-bolder px-0 mx-0" style="font-size: 14px">E-Mail </span>
                                            </div>
                                            <div class="col-7 pb-1 pt-2 text-end">
                                                <p class=" py-0 my-0 " style="font-size: 14px">sebi31@icloud.com </p>
                                            </div>
                                            <hr class="mt-1 mb-1 my-0">
                                        </div>
                                        <div class="row px-0 mx-0 pt-2 pb-1" >
                                            <div class="col-5 pt-2 px-0 mx-0 text-start">
                                                <span class="fw-bolder px-0 mx-0" style="font-size: 14px">Telefon </span>
                                            </div>
                                            <div class="col-7 pb-1 pt-2 text-end">
                                                <p class=" py-0 my-0 " style="font-size: 14px">0179 4480169 </p>
                                            </div>
                                            <hr class="mt-1 mb-1 my-0">

                                        </div>
                                        <div class="row px-0 mx-0 pt-2 pb-1" >
                                            <div class="col-5 pt-2 px-0 mx-0 text-start">
                                                <span class="fw-bolder px-0 mx-0" style="font-size: 14px">Vorname </span>
                                            </div>
                                            <div class="col-7 pb-1 pt-2 text-end">
                                                <p class=" py-0 my-0 " style="font-size: 14px">Sebastian </p>
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
@endsection
@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>

    <script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>

{{--    <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>--}}
<script>
    var totalFiles=0;
    FilePond.registerPlugin(
        // encodes the file as base64 data

        // validates the size of the file

        // corrects mobile image orientation

        // previews dropped images
        FilePondPluginImagePreview,
        FilePondPluginFileValidateType,
        FilePondPluginFileEncode,
        FilePondPluginImageCrop,
        FilePondPluginImageEdit
    );



    $(document).on('shown.bs.modal','#profile-picture',function(){
        var inputMultipleElements = document.querySelectorAll('input.filepond');

        console.log('Ok Profile');
        // loop over input elements
        Array.from(inputMultipleElements).forEach(function (inputElement) {
            // create a FilePond instance at the input element location
            FilePond.create(inputElement,
                {
                    name:'filepond',
                    maxFiles: 1,
                    allowImageCrop:true,
                    imageCropAspectRatio:"1:1",
                    allowMultiple: false,
                    acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
                    fileValidateTypeDetectType: (source, type) =>
                        new Promise((resolve, reject) => {
                            // Do custom type detection here and return with promise
                            totalFiles++;
                            console.log('ok');


                            console.log('ok');
                            resolve(type);
                        }),
                    // imageCropAspectRatio: 1,

                    // resize to width of 200
                    imageResizeTargetWidth: 200,

                    // open editor on image drop
                    imageEditInstantEdit: true,

                    // configure Doka
                    imageEditEditor: Doka.create({
                        // Doka.js options here ...

                        cropAspectRatioOptions: [
                            {
                                label: 'Free',
                                value: null,
                            },
                            {
                                label: 'Portrait',
                                value: 1.25,
                            },
                            {
                                label: 'Square',
                                value: 1,
                            },
                            {
                                label: 'Landscape',
                                value: 0.75,
                            },
                        ],
                    }),
                }

            );
        });


    })
    $(document).on('click','.btn-examiner-profile',function(e){
        var id=$(this).attr('data-id');
        $('#profile_data').html('');
        $.ajax({
            type:"GET",
            url:"{{url('/profile')}}/"+id,
            data:{},
            success:function(data){
                $('#profile_data').html(data);
            }
        })

    })

    $('.form-xhr').submit(function(e){
        e.preventDefault();

        // KTUtil.btnRelease(btn);
        let f = $(this),
            dat = new FormData(f[0]);
        $(this).find('.price-loading').show();
        $.ajax({
            url: f.attr('action'),
            type: f.attr('method'),
            dataType: 'JSON',
            data: dat,
            processData: false,
            contentType: false,
            error: function(error) {
                $('.price-loading').hide();
                let txt = "";
                if(error.status == 422) {
                    txt += "<div class='text-left'>"
                    for(let m in error.responseJSON.errors) {
                        for (let n in error.responseJSON.errors[m]) {
                            txt += "- " + error.responseJSON.errors[m][n] + "<br>";
                        }
                    }
                    txt += "</div>"
                } else {
                    txt = error.responseJSON.message;
                }
                swal.fire({
                    html: txt,
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "D'accord",
                    customClass: {
                        confirmButton: "btn font-weight-bold btn-light-primary"
                    }
                }).then(function() {
                    // KTUtil.btnRelease(btn);
                });
            },
            success: function(data) {
                // KTApp.unblockPage();
                $('#price-modal').modal('hide');
                $('.price-loading').hide();
                $('#profile-picture').modal('hide');
                if(data.file){
                    $('.user-image').attr('src',data.file);
                }
                if(data.cities){
                    var cityHtml="";
                    for(var i=0;i<data.cities.length;i++) {

                        cityHtml+=' <li>'+data.cities[i].name+' <span class="float-end"><i class="fa fa-circle-xmark" style="color: red;font-size: 18px"></i></span> </li>';

                    }
                    $('#examiner-cities').html(cityHtml);

                    $('.cities').attr('checked',false);
                    $('.cities').each(function (index,value){
                        // console.log(index);
                        // console.log(value);
                        for(var i=0;i<data.cities.length;i++) {
                            if($(this).val()==data.cities[i].id){
                                $(this).attr('checked',true);
                            }
                        }
                    })
                }
                if(data.success) {
                    $('#price').html(data.price);
                    $('#work-modal').modal('hide');
                    f[0].reset()
                    swal.fire({
                        html: data.message,
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Continuer",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    }).then(function() {

                        if(typeof(data.redirect) != 'undefined')
                            document.location.href = data.redirect
                        else if (typeof(data.event_to_trigger) != 'undefined') {
                            console.log("Triggering "+data.event_to_trigger+" event ...");
                            $.event.trigger({
                                type: data.event_to_trigger,
                                parameters: data.parameters
                            })
                        } else {
                            console.log("No triggerable event.");
                            return true;
                        }
                    });
                } else if (typeof(data.event_to_trigger) != 'undefined') {
                    console.log("Triggering "+data.event_to_trigger+" event ...");
                    $.event.trigger({
                        type: data.event_to_trigger,
                        parameters: data.parameters
                    })
                } else {
                    swal.fire({
                        html: data.message,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "D'accord",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    }).then(function() {
                        // KTUtil.btnRelease(btn);
                    });
                }
            }
        });
    });
</script>
@endsection
