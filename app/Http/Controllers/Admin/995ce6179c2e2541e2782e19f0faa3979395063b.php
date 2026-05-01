<?php $__env->startSection('styles'); ?>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var cityInput = document.getElementById('city-input');
    var availabilityMessage = document.getElementById('availability-message');

    cityInput.addEventListener('blur', function () {
        // Überprüfe, ob der User etwas eingegeben hat
        if (cityInput.value.trim() !== '') {
            // Füge die Klasse für die grüne Umrandung hinzu
            cityInput.classList.add('success');
            // Zeige die Nachricht an
            availabilityMessage.style.display = 'block';
        }
    });

    cityInput.addEventListener('input', function () {
        // Entferne die grüne Umrandung und Nachricht, wenn der User die Eingabe ändert
        cityInput.classList.remove('success');
        availabilityMessage.style.display = 'none';
    });
});
    </script>
    <style>

            .form-control.form-control-sm {
                height: 50px;
                font-size: 15px;
                margin-bottom: 15px;
            }


            .form-login .form-wrapper, .form-profile .form-wrapper {
                max-width: 450px;
            }


        .section-btn {
            border: 0px;
            height: 46px;
            color: black;
            background-color: white;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            font-size: 17px;
            font-weight: 500;
            font-family: var(--font-1);
            border-radius: 5px;
            box-shadow: 0 4px 25px 0 rgba(0, 0, 0, 0.25);
            transition: all .25s ease-in-out;
        }
        .section-btn:hover {
            background-color: var(--primary);
        }
        .btn-check:checked+.btn, .btn.active, .btn.show, .btn:first-child:active, :not(.btn-check)+.btn:active {
            background-color: var(--secondary) !important;
            color: white !important;
        }
        .btn-check:checked+.bntno, .bntno.active, .bntno.show, .bntno:first-child:active, :not(.btn-check)+.bntno:active {
            background-color:#d33131 !important;
            color: white !important;
        }

        .exam-card-header-icon {
            margin-right: 15px;
        }

        #city-input.success {
            border: 2px solid var(--secondary);
        }

        @media  screen and (min-width: 767px) {

            .fs-4 {
            padding-top: 50px;
        }

        }


    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <main>

        <!-- step-info -->
        <section class="step-wrap">

            <form action="<?php echo e(route('store.stadtplz')); ?>" class="row form-wrapper mx-auto" method="POST">
                <?php echo csrf_field(); ?>
                <div class="container-sm">
                    <div class="mb-5 mb-md-3 text-center text-lg-center">
                        <h3 class="fs-4">Fahrzeuglieferung</h3>
                    </div>
                    <div class="row mb-5 pt-lg-5">
                        <div class="col-lg-7 mx-auto">
                            <div class="bg-white step-card rounded-1 py-4 px-lg-4 p-3 pb-4 shadow-1 position-relative">

                                <div class="exam-card-header">
                                        <div class="exam-card-header-icon">
                                            <img src="<?php echo e(asset('assets/imgs/shipping.png')); ?>" alt="kilometerstand check prüfung tachomanipulation">
                                        </div><p style="text-align: left; font-size: 19px; font-weight: 550; padding-top: 12px; padding-left: 0px">Kauf eines Fahrzeugs geplant?</p>
                                    </div>
                                    <div style="text-align: left; font-size: 17px" class="exam-card-body">
                                        Wir liefern dein gewünschtes Fahrzeug ganz entspannt zu dir nach Hause.
                                    </div>
                                    <div style="padding-top: 15px" id="multiCollapseExample1" class="multi-collapse show d-lg-block">
                                        <ul class="mb-4">
                                            <li>
                                                <span class="icon"><img src="<?php echo e(asset('front/imgs/icons/check-faq.png')); ?>" alt="auto pkw vor dem kauf prüfen lassen" height="25px"></span>
                                                Schnelle Lieferung
                                            </li>
                                            <li>
                                                <span class="icon"><img src="<?php echo e(asset('front/imgs/icons/check-faq.png')); ?>" alt="transporter kleintransporter prüfung" height="25px"></span>
                                                Versicherter Transport
                                            </li>
                                            <li>
                                                <span class="icon"><img src="<?php echo e(asset('front/imgs/icons/check-faq.png')); ?>" alt="transporter kleintransporter prüfung" height="25px"></span>
                                                LIVE Verfolgung
                                            </li>
                                        </ul>
                                    </div>
                                    <hr>



                                    <div style="padding-top: 25px" class="row mb-5 mb-md-4">
                                            <div class="col-12">
                                                <h5 style="font-weight: 550">Details zum Fahrzeug</h5>
                                            </div>
                                            <div style="padding-top: 15px" class="">
                                                <div class="mb-3 mb-lg-4">
                                                    <p class="mb-0 text-black fs-6">Marke & Modell<sup class="text-primary">*</sup></p>
                                                    <div class="input-box">
                                                        <input name="vehicle_make_model" style="height: 55px" type="text" value="<?php echo e(old('vehicle_make_model')); ?>" placeholder="Audi A6 Kombi" class="form-control form-control-sm shadow">
                                                        <?php $__errorArgs = ['vehicle_make_model'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <p class="text-black fs-6 m-0">Standort<sup class="text-primary">*</sup></p>
                                                <div class="input-box">
                                                    <input name="location" style="height: 55px" value="<?php echo e(old('location')); ?>" type="text" placeholder="Adresse + PLZ" class="form-control form-control-sm shadow">
                                                    <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <h5 style="font-weight: 550">Verkäufer</h5>
                                        </div>
                                        <div style="padding-top: 15px" class="">
                                            <div class="mb-3">
                                                <p class="mb-0 text-black fs-6">Privat oder Händler?<sup class="text-primary">*</sup></p>
                                                <div class="input-box">
                                                    <input name="private_or_dealer" value="<?php echo e(old('private_or_dealer')); ?>" style="height: 55px" placeholder="Autohaus Müller" type="text" class="form-control form-control-sm shadow">
                                                    <?php $__errorArgs = ['private_or_dealer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="padding-top: 5px" class="">
                                            <div class="mb-3">
                                                <p class="mb-0 text-black fs-6">Name des Verkäufers<sup class="text-primary">*</sup></p>
                                                <div class="input-box">
                                                    <input name="seller_name" value="<?php echo e(old('seller_name')); ?>" style="height: 55px" placeholder="Vollständiger Name" type="text" class="form-control form-control-sm shadow">
                                                    <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="padding-top: 5px" class="">
                                            <div class="mb-3">
                                                <p class="mb-0 text-black fs-6">Telefon des Verkäufers<sup class="text-primary">*</sup></p>
                                                <div class="input-box">
                                                    <input name="seller_phone" value="<?php echo e(old('seller_phone')); ?>" style="height: 55px" placeholder="0157 1234567" type="text" class="form-control form-control-sm shadow">
                                                    <?php $__errorArgs = ['seller_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                        </div>

                                        <br><hr style="padding-top: 25px">
                                        <div class="col-12">
                                            <h5 style="font-weight: 550">Lieferdaten</h5>
                                        </div>
                                        <div style="padding-top: 15px" class="">
                                            <div class="mb-3">
                                                <p class="mb-0 text-black fs-6">Lieferadresse<sup class="text-primary">*</sup></p>
                                                <div class="input-box">
                                                    <input name="delivery_address" value="<?php echo e(old('delivery_address')); ?>" style="height: 55px" placeholder="Adresse + PLZ" type="text" class="form-control form-control-sm shadow">
                                                    <?php $__errorArgs = ['delivery_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="padding-top: 5px" class="">
                                            <div class="mb-3">
                                                <p class="mb-0 text-black fs-6">Gewünschtes Lieferdatum und andere Hinweise<span style="color: gray; font-size: 15px"> (optional)</span></p>
                                                <div class="input-box">
                                                    <textarea name="desc" style="height: 100px; font-size:15px" class="form-control shadow" id="" cols="30" rows="20"><?php echo e(old('desc')); ?></textarea>
                                                    <?php $__errorArgs = ['desc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                        </div>

                                        <br><br>
                                        <div class="col-12">
                                            <h5 style="font-weight: 550">Deine Kontaktdaten</h5>
                                        </div>
                                        <div style="padding-top: 15px" class="">
                                            <div class="mb-3">
                                                <p class="mb-0 text-black fs-6">Vollständiger Name<sup class="text-primary">*</sup></p>
                                                <div class="input-box">
                                                    <input name="full_name" value="<?php echo e(old('full_name')); ?>" style="height: 55px" placeholder="Max Mustermann" type="text" class="form-control form-control-sm shadow">
                                                    <?php $__errorArgs = ['full_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="padding-top: 5px" class="">
                                            <div class="mb-3">
                                                <p class="mb-0 text-black fs-6">E-Mail<sup class="text-primary">*</sup></p>
                                                <div class="input-box">
                                                    <input name="email" value="<?php echo e(old('email')); ?>" style="height: 55px" placeholder="mail@carspector.de" type="text" class="form-control form-control-sm shadow">
                                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                        </div>


                                        <p style="padding-top: 15px" class="mb-0 text-black fs-6">Pflichtfelder mit <sup class="text-primary">*</sup> markiert.</p>
                                        <br><br><button type="submit" href="" style="width: 100%; height: 55px; font-size: 17px" class="btn btn-secondary shadow">Jetzt unverbindlich anfragen</button>
                                        <p style="padding-top:40px; font-size: 16px; font-weight: 500">Wir prüfen unsere Verfügbarkeiten und senden dir innerhalb kurzer Zeit ein individuelles, unverbindliches Angebot per E-Mail zu.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('mainpages.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /homepages/0/d893595161/htdocs/dev-cs/resources/views/frontpages/stadtplz.blade.php ENDPATH**/ ?>