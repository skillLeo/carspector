@extends('mainpages.mainfront')
@section('content')
    <div class="container-fluid ">
        <div class="row  bg-primary d-none d-sm-none d-md-none d-lg-block d-xl-block text-center text-white">
            <div class="col-12">
                <p class="pb-0 pt-2 pb-2 "><span class="">Brauchst du Hilfe bei der Buchung? Kontaktiere uns:</span> <b> kontakt@carspector.de</b></p>
            </div>
        </div>


    </div>

    <!--For Mobile Screen -->


    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample1" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body px-3">
            <div class="row " style="border: 1px solid black;box-shadow: 2px 2px 7px 0px rgba(0,0,0,0.29);">
                <div class="col-12 pt-3" >
                    <h5 class="fw-bold" style="color: #1877f2">Detailsuche</h5>
                    <p style="border-bottom: 1px solid black" class="pb-2"><span class="fw-bolder">Ort :</span> 40595</p>
                </div>
                <div class="col-12">
                    <form>
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label fw-bold">Postleitzahl</label>
                                <input type="text" placeholder="40595" class="form-control input-field">
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Preis</label>
                                <select class="form-select select-box" >
                                    <option selected>von</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-md-6 pt-4">
                                <select class="form-select select-box mt-2" >
                                    <option selected>bis</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>

                            <div class="col-12 pt-3">
                                <label class="form-label fw-bold">Bewertung</label>
                                <select class="form-select select-box" >
                                    <option selected>ab X Sterne</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 pt-3">
                            <label class="form-label fw-bold">ab X Sterne</label>
                            <select class="form-select select-box" >
                                <option selected>ab </option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-12 pt-3">
                            <button type="submit" style="background-color: #1877f2" class="btn col-12 text-white">neue Suche</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row ">
                <div class="col-12  pt-3">
                    <div class="row " style="border: 1px solid black;box-shadow: 2px 2px 7px 0px rgba(0,0,0,0.20);">
                        <div class="col-12 pt-3" >
                            <h4 class="fw-bold text-center">Hilfe benötigt?</h4>
                            <p style="font-size: 18px" class="">
                                Kontaktiere gerne unseren persönlichen Kundenservice via E-Mail an <span style="color: #1877f2;font-weight: bold;"> kontakt@carspector.de</span> oder schreibe uns via WhatsApp an <span class="" style="color: #1877f2;font-weight: bold;">01577-4993273</span>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <!-- End For Mobile Section-->


    <div class="container  pb-5">
        <div class="row examinar-page ">
            <div class="col-12 col-lg-4 col-xl-4 pt-3 d-none d-lg-block d-xl-block ">
                <div class="row  " style="border: 1px solid black;box-shadow: 2px 2px 7px 0px rgba(0,0,0,0.29);">
                    <div class="col-12 pt-3" >
                        <h5 class="fw-bold" style="color: #1877f2">Detailsuche</h5>
                        <p style="border-bottom: 1px solid black" class="pb-2"><span class="fw-bolder">Ort :</span> 40595</p>
                    </div>
                    <div class="col-12">
                        <form class="filter-form" action="{{route('examiners')}}">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label fw-bold">Stadt</label>
                                    <input type="text" placeholder="Düsseldorf" class="form-control city-filter input-field">
                                </div>
                            </div>
                            <div class="row pt-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Preis</label>
                                    <select class="form-select select-box min-price" >
                                        <option selected value="">von</option>
                                        <option value="100">100€</option>
                                        <option value="200">200€</option>
                                        <option value="300">300€</option>
                                        <option value="400">400€</option>
                                        <option value="500">500€</option>
                                        <option value="500">600€</option>
                                        <option value="500">700€</option>
                                    </select>
                                </div>
                                <div class="col-md-6 pt-4">
                                    <select class="form-select select-box mt-2 max-price" >
                                        <option selected value="">bis</option>
                                        <option value="100">100€</option>
                                        <option value="200">200€</option>
                                        <option value="300">300€</option>
                                        <option value="400">400€</option>
                                        <option value="500">500€</option>
                                        <option value="600">600€</option>
                                        <option value="700">700€</option>
                                    </select>
                                </div>

                                <div class="col-12 pt-3">
                                    <label class="form-label fw-bold">Bewertung</label>
                                    <select class="form-select select-box rating" >
                                        <option selected>ab X Sterne</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                        <option value="4">Four</option>
                                        <option value="5">Five</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 pt-3">
                                <label class="form-label fw-bold">ab X Sterne</label>
                                <select class="form-select select-box completed-orders" >
                                    <option selected>ab </option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-12 pt-3">
                                <button type="submit" style="background-color: #1877f2" class="btn col-12 text-white">neue Suche</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12   pt-3">
                        <div class="row " style="border: 1px solid black;box-shadow: 2px 2px 7px 0px rgba(0,0,0,0.20);">
                            <div class="col-12 pt-3" >
                                <h4 class="fw-bold text-center">Hilfe benötigt?</h4>
                                <p style="font-size: 18px" class="">
                                    Kontaktiere gerne unseren persönlichen Kundenservice via E-Mail an <span style="color: #1877f2;font-weight: bold;"> kontakt@carspector.de</span> oder schreibe uns via WhatsApp an <span class="" style="color: #1877f2;font-weight: bold;">01577-4993273</span>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-8 col-xl-8 pt-3">
                <div class="row mx-1 ms-lg-1 ms-xl-1 pt-2" style="border: 1px solid black;box-shadow: 2px 2px 7px 0px rgba(0,0,0,0.29);">
                    <div class="col-12 ps-2 ps-lg-4 ps-xl-4 pb-4  pt-2">
                        <h4 class="fw-bolder text-center mx-0 px-0" style="font-weight: 900;font-size: 20px">15 Kfz-Prüfer entsprechen deinen Suchkriterien</h4>
                        <div class="col-12 text-center col-sm-12 col-md-12 col-lg-7 col-xl-6 px-2 rounded text-white" style="background-color: #1877f2">
                            <div class="btn-group py-0" role="group" aria-label="Button group with nested dropdown">
                                <button type="button " class="btn py-0 text-white" style="font-size: 14px">Sortieren nach:</button>
                                <div class="btn-group  py-0" role="group">
                                    <button id="btnGroupDrop1 " type="button" style="font-size: 14px;font-weight: 600;" class="btn text-white mx-auto  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Relevanz
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                        <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 ps-2 ps-lg-4 ps-xl-4  pb-4 ">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-6 px-2 d-block d-lg-none d-xl-none rounded text-white" style="background-color: #1877f2">
                            <div class="btn-group col-12 py-0" role="group">
                                <img src="assests/images/icons/einstellung%201.png">
                                <button id="" type="button" style="font-size: 14px;font-weight: 600;" class="btn mx-auto text-white" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample1" aria-expanded="false">
                                    Filtern
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="pagination_data">
                   @include('partials.examiners',['examiners'=>$examiners])
                </div>

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

@endsection
@section('scripts')
<script>
    $(document).ready(function(e){

        var queries= getUrlVars();

        function getUrlVars()
        {
            var vars = [], hash;
            var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
            for(var i = 0; i < hashes.length; i++)
            {
                hash = hashes[i].split('=');
                vars.push(hash[0]);
                vars[hash[0]] = hash[1];
            }
            return vars;
        }

        $('.filter-form').submit(function(e){
            e.preventDefault();
            searchExaminer()
        })

        $(document).on("click","#pagination a,#search_btn",function(e){

            e.preventDefault();
            //get url and make final url for ajax
            var url=$(this).attr("href");
            var append=url.indexOf("?")==-1?"?":"&";
            var finalURL=url+append;

            //set to current url
            window.history.pushState({},null, finalURL);

            $('#pagination_data').html('');
            $('.loading-row').show();
            $.get(finalURL,function(data){
                $('.loading-row').hide();
                $("#pagination_data").html(data);

            });
            return false;
        })
        $(document).on('change','#sortby',function(e){
            searchExaminer();
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




        function searchExaminer(){



            $('#pagination_data').html('');
            $('.loading-row').show();
            var sortBy=$('#sortby').val();
            var city=$('.city-filter').val();
            var minprice=$('.min-price').val();
            var maxprice=$('.max-price').val();
            var rating=$('.rating').val();
            var completedOrders=$('.completed-orders').val();

            var url='{{route('examiners')}}';
            url+='?city='+city+'&minprice='+minprice+'&maxprice'+maxprice+'&rating='+rating+'&completed_orders='+completedOrders;
            var finalURL=url;
            window.history.pushState({},null, finalURL);

            $.ajax({
                url:'{{route('examiners')}}',
                type:"GET",
                data:{sortyBy:sortBy,
                    city:city,
                    minprice:minprice,
                    maxprice:maxprice,
                    rating:rating,
                    completed_orders:completedOrders,
                },
                success:function(data){
                    $('.loading-row').hide();
                    $("#pagination_data").html(data);

                }

            })
        }
        $(document).on('click','.btn-reset-filter',function(){
            resetFilter();
        });
        function resetFilter(){
            $('.property_min_price').val(0);
            $('.property_max_price').val(10000);
            $('.country').val('');
            category='';
            $('.area-min').val("");
            $('.area-max').val("");
            $('.property_type').prop('checked',false);
            $('.amenity-checkbox').prop('checked',false);
            $('.bathrooms').prop('checked',false);
            $('.bedrooms').prop('checked',false);

        }

    })
</script>
@endsection
