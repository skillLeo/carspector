@extends('mainpages.master-layout')
@section('title', 'Carspector | Buchung abgeschlossen')
@section('header')
    @include('partials.index-header')
@endsection
@section('style')
    <style>
        .success-wrap {
            max-width: 580px;
            margin: 120px auto 80px;
            padding: 0 16px;
        }
        .success-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0,0,0,.10);
            overflow: hidden;
        }
        .success-card .card-header {
            background-color: #01449a;
            color: #fff;
            text-align: center;
            padding: 20px;
        }
        .success-card .card-header h2 {
            color: #fff;
            font-size: 32px;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        .success-card .card-body {
            padding: 30px 32px;
        }
        .vehicle-form label {
            font-weight: 500;
            margin-bottom: 4px;
        }
        .vehicle-form .form-control {
            border-radius: 8px;
        }
        .btn-confirm {
            background-color: #01449a;
            color: #fff;
            border-radius: 8px;
            padding: 10px 28px;
            font-size: 16px;
            border: none;
            width: 100%;
            transition: background-color .2s;
        }
        .btn-confirm:hover { background-color: #013a7a; color:#fff; }
        .field-hint { font-size: 12px; color: #888; margin-top: 2px; }
        .autofilled-badge {
            font-size: 11px;
            background: #e8f0fe;
            color: #01449a;
            border-radius: 4px;
            padding: 1px 7px;
            margin-left: 6px;
            font-weight: 400;
        }
        .form-floating-like {
    position: relative;
}

.form-floating-like label {
    position: absolute;
    top: 18px;
    left: 14px;
    font-size: .95rem;
    color: #6b7280;
    transition: all .15s ease;
    pointer-events: none;
    background: transparent;
}

.form-floating-like input.form-control {
    height: 60px;
    padding: 18px 14px 8px;
    border: 1px solid #d1d5db;
    background: #f9f9f9;
    border-radius: 8px;
    box-shadow: none !important;
}

.form-floating-like input:focus {
    border-color: var(--primary);
    background: #f9f9f9;
}

.form-floating-like input:focus + label,
.form-floating-like input:not(:placeholder-shown) + label {
    transform: translateY(-16px);
    font-size: .75rem;
    color: var(--primary);
    background: #fff;
    padding: 0 6px;
    left: 10px;
}

.btn-book {
    padding: 17px 32px;
    font-size: 1rem;
    font-weight: 600;
    border-radius: 8px;
}
    </style>
@endsection
@section('content')

<script>fbq('track', 'Purchase');</script>
<script>
  gtag('event', 'conversion', {
      'send_to': 'AW-11007240787/LguQCOueg7IaENPU1IAp',
      'transaction_id': ''
  });
</script>

@php
    $orderEmail = isset($order) ? $order->email : '';
    $finalEmail = old('email', $orderEmail);
@endphp
@if(strlen($finalEmail) > 3)
    <script>
        rewardful('convert', { email: {!! json_encode($finalEmail) !!} });
    </script>
@endif

<div style="max-width: 700px; width: 95%; margin: 0 auto;" class="pt-4 success-wrap">
    <div class="success-card card">
        <div class="card-header">
            <h2>
                <span class="fa-stack" style="font-size:0.55em;">
                    <i class="fa-solid fa-circle fa-stack-2x" style="color:var(--secondary);"></i>
                    <i class="fa-solid fa-check fa-stack-1x" style="color:white;"></i>
                </span>
                Vielen Dank!
            </h2>
               <p class="pt-3 pb-2" style="font-size: 16px">
                Die Zahlung war erfolgreich – vielen Dank für dein Vertrauen in Carspector!
                Eine Buchungsbestätigung wurde an deine E-Mail geschickt.
            </p>

        </div>

         @auth
                 @if(auth()->user()->type === 'admin' || auth()->user()->type === 'staff')
                                <a href="{{ route('admin.renew.timer', $order->uuid ?: $order->id) }}"
                                   style="white-space:nowrap;font-size:12px;color:#92400e;text-decoration:underline;">
                                    ↺ Timer erneuern
                                </a>
                            @endif
                        @endauth

        <div class="card-body">
         
            @php
                $formExpired = isset($order) && !$order->vehicle_details_confirmed
                    && $order->vehicle_form_expires_at
                    && $order->vehicle_form_expires_at->isPast();
            @endphp

            @if(isset($order) && $order->vehicle_details_confirmed)
                {{-- ── Locked: already confirmed ───────────────── --}}
                <div class="alert alert-success text-left" style="border-radius:8px;">
                    <i class="fa-solid fa-check-circle me-2"></i>
                    Die Fahrzeugdaten wurden erfolgreich gespeichert. Wir starten nun mit der weiteren Bearbeitung deines Auftrags.
                </div>
                <!-- <hr style="margin: 20px 0;"> -->
                <p class="pt-2" style="font-size:16px; color: black">
                    Erstelle jetzt einen kostenlosen Account über den Link, den du per E-Mail erhalten hast, um jederzeit auf deine Buchung und den aktuellen Auftragsstatus zugreifen zu können.
                    <br><br>
                    Bereits registriert?
                    <a href="{{ route('login') }}" style="color:#01449a">Anmelden</a>.
                </p>

            @elseif(isset($order) && $formExpired)
                {{-- ── Expired ──────────────────────────────────── --}}
                <div class="alert alert-warning text-center" style="border-radius:8px;">
                    <i class="fa-solid fa-clock me-2"></i>
                    Wir bearbeiten deinen Auftrag bereits.
                </div>
                <p style="font-size:16px; color: black; margin-top:12px;">
                        Du brauchst nichts weiter zu tun – unser Team kümmert sich bereits darum.
                        Falls du dennoch Fragen oder weitere Anmerkungen hast, melde dich gerne unter
                        <a href="mailto:info@carspector.de" style="color:#01449a;">info@carspector.de</a>
                        mit der Auftragsnummer:
                        <strong>{{ $order->orderno ?? '#'.$order->id }}</strong>
                    </p>
                    <hr style="margin: 20px 0;">
                     <p style="font-size:16px; color: black">
                    Erstelle jetzt einen kostenlosen Account über den Link, den du per E-Mail erhalten hast, um jederzeit auf deine Buchung und den aktuellen Auftragsstatus zugreifen zu können.
                    <br><br>
                    Bereits registriert?
                    <a href="{{ route('login') }}" style="color:#01449a">Anmelden</a>.
                </p>

            @elseif(isset($order))
                {{-- ── Vehicle details form ────────────────────── --}}
                @if($order->vehicle_form_expires_at && !$order->vehicle_details_confirmed)
                    <div id="processing-bar">

                         <!-- <div id="processing-bar" style="background:#fff8e1;border:1px solid #ffe082;border-radius:10px;padding:12px 16px;margin-bottom:18px;"> -->
    
                        <!-- <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;font-size:14px;color:#444;">
                            <i class="fa-solid fa-bolt" style="color:#f59e0b;"></i>
                            <span>
                                Du kannst die Fahrzeugdaten jetzt kurz hinterlegen, damit wir deinen Auftrag direkt bearbeiten können. 
                            Alternativ lesen wir die Daten manuell aus dem Inserat aus und hinterlegt diese für dich.
                            </span>
                        </div>   -->

                        <!-- <div style="height:6px;background:#f3f4f6;border-radius:999px;overflow:hidden;">
                            <div id="timer-progress"
                                style="height:100%;width:100%;background:#f59e0b;border-radius:999px;transition:width 1s linear;">
                            </div>
                        </div> -->
                        <!-- 
                        <div style="margin-top:6px;font-size:12px;color:#777;text-align:right">
                            Manuelle Bearbeitung startet in 
                            <strong id="timer-countdown">15:00</strong>
                        </div> -->
                    </div>
                    <script>
                    (function(){
                        var expiresAt = {{ $order->vehicle_form_expires_at->timestamp * 1000 }};
                        function tick() {
                            var remaining = Math.max(0, Math.floor((expiresAt - Date.now()) / 1000));
                            var m = Math.floor(remaining / 60);
                            var s = remaining % 60;
                            var el = document.getElementById('timer-countdown');
                            if (el) el.textContent = m + ':' + (s < 10 ? '0' : '') + s;
                            if (remaining <= 0) {
                                var bar = document.getElementById('timer-bar');
                                if (bar) { bar.style.background='#fee2e2'; bar.style.borderColor='#fca5a5'; }
                                var btn = document.querySelector('.btn-book');
                                if (btn) { btn.disabled = true; btn.textContent = 'Zeit abgelaufen'; }
                                setTimeout(function(){ location.reload(); }, 2000);
                                return;
                            }
                            setTimeout(tick, 1000);
                        }
                        tick();
                    })();
                    </script>
                @endif
                <!-- <hr style="margin: 0 0 22px;"> -->
                <h5 class="pt-2" style="font-weight:600; margin-bottom:4px;">
                    <i class="fa-solid fa-car me-2" style="color:#01449a;"></i>
                    Fahrzeugdaten bestätigen
                </h5>
                <p style="font-size:15px; color:#555; margin-bottom:18px;">
                    Bitte überprüfe und vervollständige die Fahrzeugdaten, damit wir den Auftrag schnellstmöglich bearbeiten können.
                </p>

                @if ($errors->any())
                    <div class="alert alert-danger" style="border-radius:8px; font-size:14px;">
                        <strong>Marke &amp; Modell</strong> ist ein Pflichtfeld.
                    </div>
                @endif

                <form action="{{ route('payment.vehicle.save', $order->id) }}" method="POST" class="vehicle-form">
                    @csrf

                    @if(old('advertisement_link', $order->advertisement_link))
    <div class="mb-3 pt-2">
        
        <p style="
            font-size:14px;
            font-weight:600;
            color:#374151;
            margin-bottom:3px;
        ">
            Link zum Inserat
        </p>

        <div style="
            display:flex;
            align-items:center;
            gap:10px;
        ">
            <input type="text"
                   class="form-control"
                   value="{{ old('advertisement_link', $order->advertisement_link) }}"
                   readonly
                   style="
            height:60px !important;
            background:#f9f9f9 !important;
            border:1px solid #d1d5db !important;
            border-radius:8px !important;
            box-shadow:none !important;
            outline:none !important;
            padding:14px 16px !important;
            font-size:15px !important;
            color: gray;
       ">

            <a href="{{ old('advertisement_link', $order->advertisement_link) }}"
               target="_blank"
               style="
                    color:#01449a;
                    font-size:14px;
                    font-weight:600;
                    text-decoration:none;
                    white-space:nowrap;
                    display:flex;
                    align-items:center;
                    gap:5px;
               ">
                Inserat öffnen
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
            </a>
        </div>

    </div>
@endif

                    <div class="mb-3 form-floating-like">
                         <p style="
            font-size:14px;
            font-weight:600;
            color:#374151;
            margin-bottom:3px;
        ">
            Marke & Modell
        </p>
                @if($order->vehicle_make_model)
            <span style="
                display:inline-block !important;
                padding:2px 8px !important;
                font-size:11px !important;
                font-weight:500 !important;
                color:#01449a !important;
                background:#e8f0fe !important;
                border-radius:5px !important;
                line-height:1.4 !important;
            ">
                Automatisch erkannt
            </span>
        @endif
        <input type="text"
               name="vehicle_make_model"
               id="vehicle_make_model"
               class="form-control @error('vehicle_make_model') is-invalid @enderror"
               value="{{ old('vehicle_make_model', $order->vehicle_make_model) }}"
               placeholder="z.B. Audi A6"
               required
               style="
            height:60px !important;
            background:#f9f9f9 !important;
            border:1px solid #d1d5db !important;
            border-radius:8px !important;
            box-shadow:none !important;
            outline:none !important;
            padding:14px 16px !important;
            font-size:15px !important;
       ">

        <!-- <label style="
        display:block;
        margin-bottom:8px;
        font-weight:500 !important;
        color:#111827 !important;
    ">
        Marke &amp; Modell -->


    </label>

        <!-- <div class="field-hint mt-1">
            Fahrzeugmarke und Modellbezeichnung
        </div> -->
    </div>

    

        <div class="mb-3 form-floating-like">

         <p style="
            font-size:14px;
            font-weight:600;
            color:#374151;
            margin-bottom:3px;
        ">
            Erstzulassung
        </p>

              @if($order->make_year)
                        <span style="
                display:inline-block !important;
                padding:2px 8px !important;
                font-size:11px !important;
                font-weight:500 !important;
                color:#01449a !important;
                background:#e8f0fe !important;
                border-radius:5px !important;
                line-height:1.4 !important;
            ">
                Automatisch erkannt
            </span>
                    @endif

                <input type="text"
                       name="make_year"
                       id="make_year"
                       class="form-control"
                       value="{{ old('make_year', $order->make_year) }}"
                       placeholder="z.B. 05.2019" required style="
            height:60px !important;
            background:#f9f9f9 !important;
            border:1px solid #d1d5db !important;
            border-radius:8px !important;
            box-shadow:none !important;
            outline:none !important;
            padding:14px 16px !important;
            font-size:15px !important;
       ">

    
              
    

            </div>
  

        <div class="mb-3 form-floating-like">
             <p style="
            font-size:14px;
            font-weight:600;
            color:#374151;
            margin-bottom:3px;
        ">
            Kilometerstand
        </p>

                   
                    @if($order->mileage)
                        <span style="
                display:inline-block !important;
                padding:2px 8px !important;
                font-size:11px !important;
                font-weight:500 !important;
                color:#01449a !important;
                background:#e8f0fe !important;
                border-radius:5px !important;
                line-height:1.4 !important;
            ">
                Automatisch erkannt
            </span>
                    @endif
                <input type="text"
                       name="mileage"
                       id="mileage"
                       class="form-control"
                       value="{{ old('mileage', $order->mileage) }}"
                       placeholder="z.B. 25.125 km" required style="
            height:60px !important;
            background:#f9f9f9 !important;
            border:1px solid #d1d5db !important;
            border-radius:8px !important;
            box-shadow:none !important;
            outline:none !important;
            padding:14px 16px !important;
            font-size:15px !important;
       ">


            </div>


       <!-- <hr style="margin-top: 30px"> -->

    <p style="font-weight:600; font-size:17px; margin-bottom:14px; padding-top: 10px">
        <i class="fa-solid fa-user me-2" style="color:#01449a;"></i>
        Verkäufer
    </p>
    
    <div class="form-check mb-3 mt-2">
            <input type="checkbox"
                name="private_seller"
                id="private_seller"
                value="1"
                class="form-check-input"
                {{ old('private_seller') ? 'checked' : '' }}
                style="
            width:17px;
            height:17px;
            border:1px solid black;
            cursor:pointer;
        ">
            <label class="form-check-label" for="private_seller" style="font-size:15px; color:#374151">
                Verkäufer ist eine Privatperson (kein Händler)
            </label>
        </div>

        <div id="privateSellerHint"
            style="
                display:none;
                font-size:14px;
                color:#6b7280;
                background:#f3f4f6;
                border-radius:8px;
                padding:10px 12px;
                margin-bottom:24px;
            ">
            Falls du die vollständige Adresse nicht kennst, reichen auch die Postleitzahl und der Ort aus. Die genaue Anschrift klären wir anschließend telefonisch mit dem Verkäufer.
        </div>

    <div class="mb-3 form-floating-like">

     <p style="
            font-size:14px;
            font-weight:600;
            color:#374151;
            margin-bottom:3px;
        ">
            Name des Verkäufers / Händlers
        </p>
                @if($order->listing_seller_name)
            <span style="display:inline-block !important;padding:2px 8px !important;font-size:11px !important;font-weight:500 !important;color:#01449a !important;background:#e8f0fe !important;border-radius:5px !important;line-height:1.4 !important;">
                Automatisch erkannt
            </span>
        @endif
        <input required type="text"
               name="listing_seller_name"
               id="listing_seller_name"
               class="form-control"
               value="{{ old('listing_seller_name', $order->listing_seller_name) }}"
               placeholder="z.B. Autohandel XYZ / Verkäufer A."
               style="height:60px !important;background:#f9f9f9 !important;border:1px solid #d1d5db !important;border-radius:8px !important;box-shadow:none !important;outline:none !important;padding:14px 16px !important;font-size:15px !important;">

    </div>

    <div class="mb-3 form-floating-like">
         <p style="
            font-size:14px;
            font-weight:600;
            color:#374151;
            margin-bottom:3px;
        ">
            Adresse des Verkäufers
        </p>
          @if($order->listing_seller_address)
            <span style="display:inline-block !important; padding:2px 8px !important;font-size:11px !important;font-weight:500 !important;color:#01449a !important;background:#e8f0fe !important;border-radius:5px !important;line-height:1.4 !important;">
                Automatisch erkannt
            </span>
        @endif
        <input required type="text"
               name="listing_seller_address"
               id="listing_seller_address_field"
               class="form-control"
               value="{{ old('listing_seller_address', $order->listing_seller_address) }}"
               placeholder="z.B. Autostr. 15, 12345 Autodorf"
               style="height:60px !important;background:#f9f9f9 !important;border:1px solid #d1d5db !important;border-radius:8px !important;box-shadow:none !important;outline:none !important;padding:14px 16px !important;font-size:15px !important;">
      
    </div>

    <div style="padding-bottom: 30px" class="form-floating-like">
         <p style="
            font-size:14px;
            font-weight:600;
            color:#374151;
            margin-bottom:3px;
        ">
            Telefonnummer des Verkäufers
        </p>
              @if($order->seller_phone)
            <span style="display:inline-block !important; padding:2px 8px !important;font-size:11px !important;font-weight:500 !important;color:#01449a !important;background:#e8f0fe !important;border-radius:5px !important;line-height:1.4 !important;">
                Automatisch erkannt
            </span>
        @endif
        <input required type="text"
               name="seller_phone"
               id="seller_phone"
               class="form-control"
               value="{{ old('seller_phone', $order->seller_phone) }}"
               placeholder="z.B. 0123 / 4567891"
               style="height:60px !important;background:#f9f9f9 !important;border:1px solid #d1d5db !important;border-radius:8px !important;box-shadow:none !important;outline:none !important;padding:14px 16px !important;font-size:15px !important;">
  
    </div>


    <div class="pb-2 booking-action text-center">
        <button type="submit" style="height: 55px; width: 100%" class="btn btn-secondary btn-book">
            Daten bestätigen
            <i class="fa-solid fa-arrow-right ms-1"></i>
        </button>
    </div>

    <p style="
    font-size:15px;
    color:#6b7280;
    margin-top:12px;
    text-align:center;
">
    Nach der Bestätigung beginnen wir automatisch mit der Bearbeitung und kontaktieren den Verkäufer, um einen Termin zur Fahrzeugbesichtigung zu vereinbaren.
</p>

</div>
                </form>

            @else
                {{-- ── Fallback: no order data ─────────────────── --}}
                <p style="font-size:16px; color: black">
                    Erstelle jetzt einen kostenlosen Account über den Link, den du per E-Mail erhalten hast, um jederzeit auf deine Buchung und den aktuellen Auftragsstatus zugreifen zu können.
                    <br><br>
                    Bereits registriert?
                    <a href="{{ route('login') }}" style="color:#01449a">Anmelden</a>.
                </p>
            @endif
        </div>
    </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    fetch('/tiktok_event_post.sh', { method: 'GET' }).catch(() => {});
  });
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const checkbox = document.getElementById('private_seller');
    const hint = document.getElementById('privateSellerHint');

    function toggleHint() {
        hint.style.display = checkbox.checked ? 'block' : 'none';
    }

    toggleHint();
    checkbox.addEventListener('change', toggleHint);
});
</script>

@endsection
