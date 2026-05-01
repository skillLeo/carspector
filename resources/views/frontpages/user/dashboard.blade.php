@extends('mainpages.master-layout')
@section('title', 'Carspector | Mein Konto')
@section('meta_description', 'Verwalte deine Buchungen, sieh dir Ergebnisse an und aktualisiere deine Daten – alles an einem Ort.')
@section('header')
    @include('partials.index-header')
@endsection
@section('styles')
    <style>
        .modal-info .modal-content {
            border: none;
            padding: 15px 18px;
            border: 1px solid #ccc;
        }
        .modal-box {
            display: block;
        }
        .modal-info h4 {
            font-size: 23px;
            font-weight: 600;
            line-height: 34px;
        }
        .modal-info ul {
            margin-bottom: 15px;
        }
        .modal-info ul li {
            font-size: 17px;
            line-height: 25px;
        }
        .modal-info .modal-dialog {
            max-width: 500px;
        }
        button.modal-close {
            position: absolute;
            right: 0px;
            top: -8px;
            width: 24px;
            height: 24px;
            border: none;
            background: transparent;
            color: #000;
            font-size: 19px;
            background: #fff;
            padding: 0px;
            border-radius: 50%;
            line-height: 24px;
        }

        input.form-control:focus {
            border-color: var(--primary) !important;
            outline: none;

            }

            #opt1 .modal-dialog {
    max-width: 400px;
    width: 100%;
    margin: auto;
}


/* Mobile-Styling */
@media (max-width: 400px) {
    #opt1 .modal-dialog{
        max-width: 90%;
        width: 90%;
        margin: auto;
    }
}
#opt1 .modal-dialog-centered{
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
}


        .btn-sm-custom {
    padding: 0.6rem 1rem;
    font-size: 1rem;
  }

  /* Zusatz-Services Buttons */
.btn-service {
    background: #fff;
    transition: background-color .15s ease, border-color .15s ease, transform .15s ease;
}

.btn-service:hover:not(:disabled):not(.disabled) {
    background-color: #f5f9ff !important;
    border-color: var(--primary) !important;
    transform: translateY(-1px);
}

.btn-service:disabled,
.btn-service.disabled {
    cursor: not-allowed;
}

    </style>




@endsection
@section('content')
    <div class="modal fade" id="opt1" tabindex="-1" aria-labelledby="stepDescModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="stepDescModalLabel">Wie bist du auf Carspector aufmerksam geworden?</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Schließen"></button> -->
                </div>
                <div class="modal-body">
                    <form id="umfrageForm">
                        <div class="d-grid gap-2">
                            <input type="radio" class="btn-check" name="quelle" id="opt-google" value="Google-Suche" autocomplete="off">
                            <label class="btn btn-outline-primary btn-sm-custom" for="opt-google">Google-Suche</label>

                            <input type="radio" class="btn-check" name="quelle" id="opt-social" value="mobile.de / AutoScout24" autocomplete="off">
                            <label class="btn btn-outline-primary btn-sm-custom" for="opt-social">mobile.de / AutoScout24</label>

                            <input type="radio" class="btn-check" name="quelle" id="opt-sonstiges" value="Social Media" autocomplete="off">
                            <label class="btn btn-outline-primary btn-sm-custom" for="opt-sonstiges">Social-Media (Instagram, Facebook)</label>

                            <input type="radio" class="btn-check" name="quelle" id="opt-werbung" value="Online-Werbung" autocomplete="off">
                            <label class="btn btn-outline-primary btn-sm-custom" for="opt-werbung">Online-Werbung</label>

                            <input type="radio" class="btn-check" name="quelle" id="opt-empfehlung" value="Empfehlung" autocomplete="off">
                            <label class="btn btn-outline-primary btn-sm-custom" for="opt-empfehlung">Empfehlung</label>
                        </div>

                        <p class="fs-6 text-grey text-center pt-4 pb-2">Vielen Dank für deine Unterstützung.</p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <main class="main-area">

        <!------- My-Profile-wrapper Start ------->
        <section class="myProfile-form">
            <div class="container">
                <div class="contentBox">
                    <div class="myProfile-wrapper">
                        <!-- My-profile -->
                        <div style="padding-bottom: 50px" class="myProfile-inner">
                            <div class="step-item--header mb-5">
                                <h2 style="letter-spacing: -1.5px" class="mb-3 text-primary">Mein Profil</h2>

                                <p class="fs-6 text-grey">Hier findest du deine persönlichen Daten <br> und Infos zu deinen
                                    Buchungen.</p>

                            </div>
                            <form method="POST" action="{{route('change-phone')}}" >
                                
                                @csrf
                                <div class="form-content myProfile">
                                    <div class="form-inpus">
                                        <div class="mb-3 input-box">
                                            <label class="pb-1" for="name">Vollständiger Name</label>
                                            <input id="name" name="name" value="{{$user->name}}" type="text" class="form-control" placeholder="Vollständiger Name" disabled style="height: 60px; background-color:rgb(234, 233, 233); box-shadow: none; border: 1px solid #ddd;">
                                        </div>
                                        <div class="mb-3 input-box">
                                            <label class="pb-1" for="email">E-Mail-Adresse</label>
                                            <input id="email" name="email" type="text" value="{{$user->email}}" class="form-control" placeholder="E-Mail" disabled style="height: 60px; background-color: rgb(234, 233, 233); box-shadow: none; border: 1px solid #ddd;">
                                        </div>
                                        <div class="row gx-3">
                                            <div class="input-box col-12">
                                                <label class="pb-1" for="phone">Telefon</label>
                                                <input name="phone" value="{{$user->phone}}" {{strlen($user->phone) > 3?'disabled':''}} type="text" class="form-control" placeholder="Telefon"
                                                    style="height: 60px; background-color: #f8f8f8; box-shadow: none; border: 1px solid #ddd;">
                                            </div>
                                            <div class="col-12 mt-2">
                                                @if(strlen($user->phone) < 3)
                                            <button type="submit" class="btn btn-primary w-100"
                                                style="height: 45px !important; font-size: 16px; padding: 5px 10px; line-height: 60px">
                                                speichern
                                            </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!-- My-profile-end -->

                    </div>



                    <div class="pb-4 myProfile-bookins">
                        <div class="myProfile-booking-form">
                            <h2 class="pb-2" style="letter-spacing: -1px">Meine Buchungen</h2>

                            @if($orders->isEmpty())
                                <p style="color:rgb(192, 19, 19)">Du hast noch keine Buchungen.</p>
                                <a href="{{route('booking.option-page')}}"
                                style="border-radius: 5px; max-width: 400px; margin: 0 auto; display: block;"
                                class="pt-3 btn btn-secondary w-100">
                                    Jetzt Fahrzeug-Check buchen
                                </a>
                                <br>
                            @else
                             <br>
                            @php
                                    $counter = 1;
                                @endphp
                                @foreach($orders as $order)
  <div class="card mb-3" style="border: 1px solid #e0e0e0; border-radius: 12px; overflow: hidden;">
    
    {{-- Kopfbereich: Auftrag + Status --}}
    <div class="card-header bg-white" style="border-bottom: 1px solid #eee; padding: 14px 16px;">
      <div class="d-flex justify-content-between align-items-start gap-3">
        <div style="text-align: left; font-size: 16px; padding-top: 1px">
          <strong>
            {{ (strpos($order->vehicle_make_model, '/') !== false || strlen($order->vehicle_make_model) < 3)
                ? 'Auftrag ' . $counter
                : $order->vehicle_make_model }}
          </strong>
        </div>

        <div>
          @if($order->status == 'completed')
            <span class="badge bg-success">Abgeschlossen</span>
          @elseif($order->status == 'inspecting')
            <span class="badge bg-warning text-dark">Fertigstellung</span>
          @else
            <span class="badge bg-primary">In Bearbeitung</span>
          @endif
        </div>
      </div>
    </div>

    <div class="card-body" style="padding: 16px;">
      
      {{-- Aktionen: Details --}}
      <div class="mb-3">
        <button class="btn btn-outline-primary btn-order-details w-100"
                style="padding: 10px 16px; font-size: 15px; line-height: 1.3; box-shadow: none;"
                data-bs-toggle="modal"
                data-bs-target="#exampleModal"
                data-id="{{ $order->id }}">
          Details anzeigen
        </button>
      </div>

      {{-- Trennlinie zwischen Auftrag & Services --}}
      <hr style="margin: 14px 0; opacity: .12;">

     {{-- Zusätzliche Services (eigener Block) --}}
<div class="p-3" style="background: #fafafa; border: 1px solid #eee; border-radius: 10px;">

  <h6 class="mb-3 text-center" style="letter-spacing: 0px; font-size: 14px; font-weight: 700; color: #333;">
    Weitere Services für deinen Fahrzeugkauf
  </h6>

  <div class="d-grid gap-2">

  {{-- Kaufabwicklung --}}
  <button type="button"
          class="btn btn-service border d-flex align-items-center w-100"
          data-bs-toggle="modal"
          data-bs-target="#kaufabwicklungModal-{{ $order->id }}"
          style="background:#fff; padding:12px 14px; font-size:14px; color:#333; box-shadow:none;
                 text-align:left; justify-content:flex-start; min-width:0;">

    <i class="fas fa-file-signature me-1 text-primary flex-shrink-0"></i>

    <span class="flex-grow-1 text-truncate" style="padding-left: 30px; min-width:0;">
      Kaufabwicklung
    </span>

    <!-- <span class="fw-semibold text-primary ms-2 flex-shrink-0">
      (149&nbsp;€)
    </span> 

    @if($order->status !== 'completed')
      <span class="badge bg-light text-muted ms-2 flex-shrink-0"
            style="border:1px solid #e6e6e6;">
        nach Abschluss
      </span>
    @endif-->
  </button>

  {{-- Fahrzeuglieferung --}}
  <a href="https://carspector.de/fahrzeuglieferung"
     class="btn btn-service border d-flex align-items-center w-100"
     style="background:#fff; padding:12px 14px; font-size:14px; color:#333; box-shadow:none;
            text-align:left; justify-content:flex-start; min-width:0;">

    <i class="fas fa-truck text-primary flex-shrink-0"></i>

    <span class="flex-grow-1 text-truncate" style="padding-left: 28px; min-width:0;">
      Fahrzeuglieferung
    </span>
  </a>

</div>
  <p class="mt-3 mb-0 text-muted"
     style="font-size:13px; line-height:1.35; text-align:center;">
    Klicke auf einen Service, um mehr darüber zu erfahren oder direkt zu buchen.
  </p>
</div>



{{-- Modal: Kaufabwicklung --}}
<div class="modal fade"
     id="kaufabwicklungModal-{{ $order->id }}"
     tabindex="-1"
     aria-labelledby="kaufabwicklungModalLabel-{{ $order->id }}"
     aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered" style="max-width:520px;">
    <div class="modal-content" style="border-radius:14px; border:1px solid #eee; overflow:hidden;">

      {{-- Header mit Icon links + X rechts + Trennlinie --}}
      <div class="modal-header"
           style="padding:14px 16px; border-bottom:1px solid rgba(0,0,0,.08);">
        <div class="d-flex align-items-start gap-2" style="min-width:0;">
          {{-- FA Icon oben links --}}
          <div class="flex-shrink-0"
               style="width:34px; height:34px; border-radius:10px; background:#f5f9ff;
                      display:flex; align-items:center; justify-content:center; margin-top:2px;">
            <i class="fas fa-file-signature" style="color:var(--primary); font-size:16px;"></i>
          </div>

          <div style="min-width:0;">
            <h5 class="modal-title pt-1 text-truncate"
                id="kaufabwicklungModalLabel-{{ $order->id }}"
                style="font-weight:700; padding-left: 12px; letter-spacing:-.2px;">
              Kaufabwicklung
            </h5>
            <!-- <small class="text-muted" style="font-size:13px;">
              Zusatzservice für deinen Auftrag
            </small> -->
          </div>
        </div>

        <button type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Schließen"></button>
      </div>

      {{-- Body --}}
      <div class="modal-body" style="padding:16px; text-align:left;">

        <p class="mb-3" style="font-size:15.5px; color:#444;">
          Unsere Experten übernehmen für dich die komplette Kaufabwicklung inkl. Preisverhandlung –
          transparent, sicher und stressfrei:
        </p>

        <ul class="mb-3"
            style="list-style:none; padding-left:0; margin:0; font-size:15.5px; color:#444;">
          <li class="d-flex align-items-start mb-2">
            <i class="fas fa-check-circle me-2" style="color:#28a745; margin-top:3px;"></i>
            <span>Preisverhandlung mit dem Verkäufer auf Grundlage des Prüfberichts</span>
          </li>
          <li class="d-flex align-items-start mb-2">
            <i class="fas fa-check-circle me-2" style="color:#28a745; margin-top:3px;"></i>
            <span>Prüfung und Erstellung aller Vertragsunterlagen</span>
          </li>
          <li class="d-flex align-items-start mb-2">
            <i class="fas fa-check-circle me-2" style="color:#28a745; margin-top:3px;"></i>
            <span>Koordination der nächsten Schritte &amp; Übergabe</span>
          </li>
          <li class="d-flex align-items-start">
            <i class="fas fa-check-circle me-2" style="color:#28a745; margin-top:3px;"></i>
            <span>Regelmäßige Updates während des gesamten Prozesses</span>
          </li>
        </ul>

        <div style="padding-top: 2px; font-size:15px; font-weight:700; color:#111;">
          Nur 149&nbsp;€ <span class="text-muted" style="font-weight:500; font-size:13px;">inkl. MwSt.</span>
        </div>

        @if($order->status !== 'completed')
          <div class="p-2 rounded mt-3"
               style="background:#fff7e6; border:1px solid #ffe2a8; font-size:14.5px; color:#6b4f00;">
            Dieser Service ist erst buchbar, sobald der Auftrag abgeschlossen ist.
          </div>
        @endif

      </div>

      {{-- Footer: wenn completed -> keine Trennlinie + weniger Abstand nach oben --}}
      <div class="modal-footer"
           style="
             padding: {{ $order->status === 'completed' ? '0 16px 14px 16px' : '12px 16px' }};
             {{ $order->status === 'completed' ? 'border-top:0;' : 'border-top:1px solid rgba(0,0,0,.06);' }}
           ">

        @if($order->status === 'completed')
          <a href="https://buy.stripe.com/fZufZgcoFdBXbxL9d05Rm1O"
             class="btn btn-primary w-100"
             style="height:48px; font-size:16px; font-weight:700; margin-top:3px;">
            Jetzt Kaufabwicklung buchen
          </a>
        @else
          <button type="button"
                  class="btn btn-primary w-100"
                  disabled
                  style="height:48px; font-size:16px; font-weight:700; opacity:.65; cursor:not-allowed;">
            Jetzt Kaufabwicklung buchen
          </button>
        @endif
      </div>

    </div>
  </div>
</div>




    </div>
  </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                     @if(!$orders->isEmpty())
                        @if($orders->where('status', 'completed')->isNotEmpty())
                            <div style="max-width: 500px; margin: 0 auto; margin-top: 35px"
                                class="section-bg info-box d-flex align-items-start gap-3 p-3 border rounded">
                                <i class="fas fa-info-circle fa-lg text-primary mt-2"></i>
                                <div>
                                    <p class="mb-2" style="font-size: 15px;">
                                        <strong>Dein Auftrag ist abgeschlossen – jetzt kannst du von weiteren Services profitieren.</strong><br><br>
                                        Auf Wunsch übernehmen unsere erfahrenen Experten gerne für dich die komplette Kaufabwicklung: 
                                        Wir klären alle Vertragsmodalitäten, verhandeln den Kaufpreis direkt mit dem Verkäufer 
                                        und setzen alles daran, für dich das bestmögliche Angebot zu erzielen. 
                                        Während des gesamten Prozesses halten wir dich selbstverständlich auf dem Laufenden. <br><br>
                                        Gerne organisieren wir auch die Fahrzeuglieferung bis zu dir nach Hause – schnell, bequem und versichert.
                                    </p>
                                </div>
                            </div>
                        @else
                            <div style="max-width: 500px; margin: 0 auto; margin-top: 35px"
                                class="section-bg info-box d-flex align-items-start gap-3 p-3 border rounded">
                                <i class="fas fa-info-circle fa-lg text-primary mt-2"></i>
                                <div>
                                    <p class="mb-2" style="font-size: 15px;">
                                        <strong>Du möchtest den nächsten Schritt gehen?</strong><br>
                                        Unsere Experten übernehmen gerne für dich die komplette Kaufabwicklung – von der Preisverhandlung mit dem Verkäufer bis hin zur Erstellung und Prüfung des Kaufvertrags. 
                                        <br><br>Auf Wunsch organisieren wir außerdem die Lieferung des Fahrzeugs direkt zu dir nach Hause. 
                                        Eine unverbindliche Anfrage oder Buchung kannst du ganz einfach über den Button in deinem Auftrag vornehmen.
                                    </p>
                                    <!-- <a href="{{ route('kontakt') }}" class="text-primary fw-semibold" style="text-decoration: none;">
                                        Jetzt Kontakt aufnehmen &rarr;
                                    </a> -->
                                </div>
                            </div>
                        @endif
                    @endif

                    <section class="pb-5 pt-4 link-area">
                    @if(!$orders->isEmpty())
                    <hr class="pt-4">
                    <a href="{{route('booking.option-page')}}"
                        style="border-radius: 5px; max-width: 350px; margin: 0 auto; display: block;"
                        class="pt-3 btn btn-secondary w-100">
                        Neuen Fahrzeug-Check buchen
                    </a>
                    <div style="padding-top: 35px">
                    @endif
                    @if($orders->isEmpty())
                    <br>
                    @endif
                        <div class="text-center">
                            <a href="#" onclick="document.getElementById('logout-form').submit();" class="link link-primary bg-white fw-semibold">Abmelden</a>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </section>
                </div>
            </div>
            </div>
        </section>
        <!------- My-Profile-wrapper End ------->


    </main>
    <!-- Modal -->
    <div class="modal modal-info fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="row modal-box clearfix g-3 position-relative">
                    <button type="button" class="modal-close shadow" style="margin-right: auto" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                    <div class="col-12">
                        <div class="" id="booking_detail">


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->

@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $(document).on('click','.btn-order-details',function(e){
            var id=$(this).attr('data-id');
            $.ajax({
                url:"{{url('order1')}}/"+id,
                type:"GET",
                data:{},
                success:function(data){
                    $('#booking_detail').html(data);
                },
                error:function(erorr){

                }
            })
        })

        $(document).on('change','.btn-check',function(e){
            var heard_about=$('.btn-check:checked').val();
            $.ajax({
                url:"{{route('user.update.heard-about')}}",
                type:"GET",
                data:{heard_about:heard_about},
                success:function(data){
                   console.log(data);
                   $('#opt1').modal('hide');
                    Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Vielen Dank für dein Feedback!",
                    showConfirmButton: true,
                });
                },
                error:function(error){
                    var message = 'Bitte versuche es erneut.';
                    if (error.responseJSON && error.responseJSON.message) {
                        message = error.responseJSON.message;
                    }
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title:"Fehler",
                        text: message,
                        showConfirmButton: true,

                    });
                }
            })
        })
    </script>

    @if(!auth()->user()->heard_about)
    <script>
        setTimeout(function(){
            $('#opt1').modal('show');
        },500)
    </script>
    @endif
    @if(session('success-message'))
        <script>
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Vielen Dank für deine Buchung!",
                showConfirmButton: true,

            });
        </script>
    @endif
@endsection
