@extends('mainpages.mainfront')
@section('content')
    <main>

        <!-- user-review -->
        <section class="section userReview">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-xl-5 mx-auto">
                        <div class="userReview-wrapper">

                            <!-- userReview-header -->
                            <div class="userReview-header text-center">
                                <h4 class="text-primary">Bewerte dein Erlebnis</h4>
                                <p class="fw-bold small text-dark">Dein Prüfer: {{$user->name}}</p>
                            </div>
                            <!-- userReview-header-end -->

                            <!-- userReview-item -->
                            <div class="userReview-item">
                                <p>Deine Zufriedenheit mit {{$user->name}}</p>
                                <div class="userReview-ratting">
                                    <div class="d-flex align-items-center">
                                        <div class="rating-box">
                                            <div class="rating-container">
                                                <input type="radio" name="rating" value="5" id="star-5"> <label for="star-5">&#9733;</label>

                                                <input type="radio" name="rating" value="4" id="star-4"> <label for="star-4">&#9733;</label>

                                                <input type="radio" name="rating" value="3" id="star-3"> <label for="star-3">&#9733;</label>

                                                <input type="radio" name="rating" value="2" id="star-2"> <label for="star-2">&#9733;</label>

                                                <input type="radio" name="rating" value="1" id="star-1"> <label for="star-1">&#9733;</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- userReview-item-end -->

                            <!-- userReview-item -->
                            <div class="userReview-item">
                                <p>Bitte teile uns mit, was dir an deinem persönlichen Kfz-Prüfer gefallen, aber auch nicht gefallen hat.</p>
                                <div class="userReview">
                                    <div class="userReview-form ">
                                        <textarea name="" id="rating_about_examiner" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- userReview-item-end -->

                            <!-- userReview-item -->
                            <div class="userReview-item">
                                <p>Dein Erlebnis als Carspector Kunde</p>
                                <div class="userReview-ratting">
                                    <div class="d-flex align-items-center rating-box">
                                        <div class="rating-container">
                                            <input type="radio" name="ratingTwo" value="5" id="star-6"> <label for="star-6">&#9733;</label>

                                            <input type="radio" name="ratingTwo" value="4" id="star-7"> <label for="star-7">&#9733;</label>

                                            <input type="radio" name="ratingTwo" value="3" id="star-8"> <label for="star-8">&#9733;</label>

                                            <input type="radio" name="ratingTwo" value="2" id="star-9"> <label for="star-9">&#9733;</label>

                                            <input type="radio" name="ratingTwo" value="1" id="star-10"> <label for="star-10">&#9733;</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- userReview-item-end -->

                            <!-- userReview-item -->
                            <div class="userReview-item">
                                <p>Was hat dir an Carspector gefallen, was nicht, und was würdest du ändern? Wir würden uns sehr über dein Feedback freuen.</p>
                                <div class="userReview-textarea">
                                    <div class="userReview-form">
                                        <textarea name="" id="rating_about_carspector" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- userReview-item-end -->

                            <!-- userReview-qa -->
                            <div class="userReview-qa">
                                <div class="userReview-qa-option ms-auto">
                                    <span>Ja</span>
                                    <span>Nein</span>
                                </div>
                                <!-- userReview--item -->
                                <div class="userReview-qa-item">
                                    <div class="userReview-qa-text">
                                        <p>Würdest du Carspector weiter empfehlen?</p>
                                    </div>
                                    <div class="userReview-qa-check gap-3">
                                        <div class="check-item">
                                            <input type="radio" class="would_you_recomend_other" checked value="1" id="qa-1" name="qa-1">
                                            <label for="qa-1">
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="check-item">
                                            <input type="radio" class="would_you_recomend_other"  value="0" id="qa-2" name="qa-1">
                                            <label for="qa-2">
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- userReview--item-end -->

                                <!-- userReview--item -->
                                <div class="userReview-qa-item">
                                    <div class="userReview-qa-text">
                                        <p>Würdest du Carspector erneut benutzen?</p>
                                    </div>
                                    <div class="userReview-qa-check gap-3">
                                        <div class="check-item">
                                            <input type="radio" class="use_again" value="1" checked id="qa-3" name="qa-2">
                                            <label for="qa-3">
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="check-item">
                                            <input type="radio" id="qa-4" value="0" class="use_again" name="qa-2">
                                            <label for="qa-4">
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- userReview--item-end -->

                                <!-- userReview--item -->
                                <div class="userReview-qa-item">
                                    <div class="userReview-qa-text">
                                        <p>Hat dir Carspector geholfen?</p>
                                    </div>
                                    <div class="userReview-qa-check gap-3">
                                        <div class="check-item">
                                            <input type="radio" class="help_you" value="1" id="qa-11" checked name="qa-3">
                                            <label for="qa-11">
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="check-item">
                                            <input type="radio" class="help_you" value="0" id="qa-12" name="qa-3">
                                            <label for="qa-12">
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- userReview--item-end -->

                                <!-- userReview--item -->
                                <div class="userReview-qa-item">
                                    <div class="userReview-qa-text">
                                        <p>Fandest du den Preis gerechtfertigt?</p>
                                    </div>
                                    <div class="userReview-qa-check gap-3">
                                        <div class="check-item">
                                            <input type="radio"  id="qa-6" name="qa-4" value="1" class="price_was_justified" checked>
                                            <label for="qa-6">
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="check-item">
                                            <input type="radio" class="price_was_justified" value="2" id="qa-7" name="qa-4">
                                            <label for="qa-7">
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- userReview--item-end -->

                                <!-- userReview--item -->
                                <div class="userReview-qa-item">
                                    <div class="userReview-qa-text">
                                        <p>Gefällt dir der Aufbau und die Bedienbarkeit der Carspector-Website?</p>
                                    </div>
                                    <div class="userReview-qa-check gap-3">
                                        <div class="check-item">
                                            <input type="radio" value="1" checked class="structure_and_usability_of_web" id="qa-8" name="qa-5">
                                            <label for="qa-8">
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="check-item">
                                            <input type="radio" id="qa-9" value="0" name="qa-5" class="structure_and_usability_of_web">
                                            <label for="qa-9">
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- userReview--item-end -->
                            </div>
                            <!-- userReview-qa-end -->

                            <!-- userReview -->
                            <div class="userReview-bottom text-center">
                                <button type="button" class="btn btn-primary-light w-100 mb-4 btn-save">Feedback absenden</button>
                                <p>Vielen Dank, dass du dir Zeit genommen hast! Das Team von Carspector dankt dir sehr für die Mithilfe für die Weiterentwicklung der Carspector Website!</p>
                            </div>
                            <!-- userReview-end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- user-review-end -->

    </main>
@endsection
@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function(e){

            $('.btn-save').on('click',function(e){
                var examiner_id='{{request('id')}}';
                var rating_with_examiner=$("input[name=rating]:checked").val();
                var rating_with_carspector=$("input[name=ratingTwo]:checked").val();
                var rating_about_examiner=$('#rating_about_examiner').val();
                var rating_about_carspector=$('#rating_about_carspector').val();
                var would_you_recomend_other=$('.would_you_recomend_other:checked').val();
                var use_again=$('.use_again:checked').val();
                var help_you=$('.help_you:checked').val();
                var price_was_justified=$('.price_was_justified:checked').val();
                var structure_and_usability_of_web=$('.structure_and_usability_of_web:checked').val();
                console.log(rating_with_examiner);
                if(rating_about_examiner.length < 3){
                    swal.fire({
                        html:"Please enter the review for examiner.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "D'accord",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    })
                    return;
                }
                if(rating_with_examiner==''){
                    swal.fire({
                        html:"Please select the star for examiner.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "D'accord",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    })
                    return;
                }
                if(examiner_id==''){
                    swal.fire({
                        html:"Please selected and examiner...",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "D'accord",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    })
                    return;
                }
                $.ajax({
                    url:"{{route('review.save')}}",
                    type:"POST",
                    data:{
                        examiner_id:examiner_id,
                        rating_with_carspector:rating_with_carspector,
                        rating_with_examiner:rating_with_examiner,
                        rating_about_examiner:rating_about_examiner,
                        rating_about_carspector:rating_about_carspector,
                        would_you_recomend_other:would_you_recomend_other,
                        use_again:use_again,
                        help_you:help_you,
                        price_was_justified:price_was_justified,
                        structure_and_usability_of_web:structure_and_usability_of_web,
                    },
                    success:function(data){
                        console.log(data);
                        if(data.sucess==true){
                            swal.fire({
                                html:data.message,
                                icon: "error",
                                confirmButtonText: "D'accord",
                                customClass: {
                                    confirmButton: "btn font-weight-bold btn-light-primary"
                                }
                            })
                        }else {
                            swal.fire({
                                html:data.message,
                                icon: "success",
                                confirmButtonText: "D'accord",
                                customClass: {
                                    confirmButton: "btn font-weight-bold btn-light-primary"
                                }
                            })
                        }
                    },
                    error:function(error){
                        console.log(error);
                            swal.fire({
                                html:"Please login to review",
                                icon: "error",
                                confirmButtonText: "D'accord",

                            })


                    }

                })
            });
        })
    </script>
@endsection
