@extends('mainpages.master-layout')
@section('title', 'Carspector | Kontakt')
@section('meta_description', 'Fragen zum Gebrauchtwagencheck oder Interesse an einer Beratung? Kontaktiere uns jetzt – unverbindlich per Telefon, E-Mail oder über unser Kontaktformular.')
@section('header')
    @include('partials.index-header')
@endsection

@section('content')
<style>
    /* HERO SECTION - neue Farbe */
    .contact-hero {
        background-color:rgb(240, 244, 247); /* neutraler, seriöser Farbton */
        padding: 4rem 0;
    }

    .contact-hero h1 {
        letter-spacing: -1px;
    }

    @media (max-width: 576px) {
        .contact-hero h1 {
            letter-spacing: -0.5px;
            font-size: 2rem;
        }
    }

    .hero-img {
        border-radius: 16px;
        max-width: 100%;
    }

    /* FORM DESIGN */
    .card {
        border-radius: 1rem;
        border: 1px solid #e0e0e0;
        background: #fff;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    }

    .form-label {
        font-weight: 500;
        margin-bottom: 0.35rem;
        display: block;
    }

    .form-control {
        border: 1px solid #ccc;
        background-color: #f9f9f9;
        box-shadow: none !important;
        transition: border-color 0.2s ease;
        font-size: 1rem;
        padding: 0.5rem 0.75rem;
    }

    .form-control:focus {
        border-color: var(--primary);
    }

    textarea.form-control {
        min-height: 200px;
        resize: vertical;
    }

    .btn-primary {
        border-radius: 0.5rem;
    }

    /* KONTAKTKARTEN */
    .contact-card {
        transition: all 0.3s ease-in-out;
        border-radius: 1rem;
        background-color:#f9f9f9; /* etwas dunkleres Grau-Blau */
        padding: 2rem 1rem;
        box-shadow: 0 8px 12px rgba(0,0,0,0.08); /* stärkerer Shadow */
        height: 100%;
    }

    .contact-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 28px rgba(0,0,0,0.12);
    }

    .contact-card i {
        font-size: 2.2rem;
        margin-bottom: 1rem;
    }

    .contact-card .title {
        font-weight: 600;
        font-size: 1.1rem;
    }

    .contact-card .text {
        font-size: 0.95rem;
        color: #495057;
    }

    @media (max-width: 767px) {
    .contact-form-card .form-control,
    .contact-form-card textarea {
        background-color: #f4f4f4 !important;
    }
}

           
        .help-text {
             font-size: 20px;
             letter-spacing: -0.5px;
             font-weight: 400;
             color: gray;
        }

    @media (max-width: 767px) {
        .mobpad-b {
            padding-bottom: 15px !important;
        }

        .help-text {
             font-size: 19px !important; 
             font-weight: 300 !important;
             color: black !important;
             margin: 0 auto;
        }

    .card.contact-form-card {
        box-shadow: none !important;
        border: none !important;
        padding: 0 !important;
        background-color: transparent !important;
    }

    .form-col {
        width: 100% !important;
        margin-left: auto !important;
        margin-right: auto !important;
    }

    .contact-form-card .form-control,
    .contact-form-card textarea {
        width: 100% !important;
    }

    .contact-form-card button,
    .contact-form-card .g-recaptcha {
        width: 100% !important;
        margin-left: auto;
        margin-right: auto;
        display: block;
    }
}

@media (max-width: 575px) {
        .contact-card {
            max-width: 90%;
            margin: 0 auto;
        }
    }
    .section-bg {
  background: #f6fbff !important;
}
</style>

<main>
    <!-- 🟦 HERO SECTION -->
    <section class="contact-hero">
        <div class="container">
            <div class="row align-items-center gy-4">
                <div class="col-md-6 text-center text-md-start">
                    <h1 style="font-size: 40px !important; letter-spacing: -1px" class="display-5 fw-bold mb-3">Kontaktiere uns</h1>
                    <p style="max-width: 400px" class="help-text lead">Wir helfen dir gerne weiter – telefonisch, per Mail oder direkt über das Formular.</p>
                    <a href="tel:+4921192325550" style="border-radius: 5px" class="btn btn-primary btn-lg mt-4">
                        <i class="fa-light fa-phone me-2"></i> 0211 92325550
                    </a>
                    <div style="padding-top: 20px" class="mobpad-b text-muted"><b>Mo–Sa:</b> 9:00–18:00 Uhr</div>
                </div>
                <div class="col-md-6 text-center">
                    <img src="/theme-1/imgs/contactpic.png" alt="Kontakt Illustration" class="hero-img">
                </div>
            </div>
        </div>
    </section>

    <!-- 🟨 KONTAKTFORMULAR -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="card contact-form-card p-4 p-lg-5 mx-auto" style="max-width: 720px;">
                <h3 style="font-size: 30px !important; letter-spacing: -0.5px" class="text-center mb-5">Schreibe uns eine <span class="text-primary">Nachricht</span></h3>
                @if(session('success'))
                    <div class="alert alert-success text-center">{{ session('success') }}</div>
                @endif

                <form action="{{ route('contact.post') }}" method="POST" id="contact-form">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6 mb-3 form-col">
                            <input type="text" class="form-control" name="name" id="name"
                                value="{{ old('name') }}" placeholder="Vollständiger Name*" required>
                            @error('name')<div class="text-danger small mt-1">Dies ist ein Pflichtfeld.</div>@enderror
                        </div>
                        <div class="col-12 col-md-6 mb-3 form-col">
                            <input type="email" class="form-control" name="email" id="email"
                                value="{{ old('email') }}" placeholder="E-Mail*" required>
                            @error('email')<div class="text-danger small mt-1">Dies ist ein Pflichtfeld.</div>@enderror
                        </div>
                    </div>
                    <div class="">
                        <textarea class="form-control" name="message" id="message"
                                placeholder="Wie können wir helfen?*" required>{{ old('message') }}</textarea>
                        @error('message')<div class="text-danger small mt-1">Dies ist ein Pflichtfeld.</div>@enderror
                    </div>
                    <div style="font-size: 15px" class="text-md text-grey pt-3 mt-1 mb-4">Pflichtfelder mit * markiert.</div>
                    <div class="form-check mb-3"> 
                        <input class="form-check-input" type="checkbox" name="privacy_consent" id="privacy_consent" required style="border-color: gray; transform: scale(1.1); margin-top: 0.25rem; cursor: pointer;">
                        <label class="form-check-label small text-muted" for="privacy_consent">
                            Ich habe die 
                            <a class="text-primary" href="{{ route('datenschutz') }}" rel="noopener noreferrer">Datenschutzerklärung</a> 
                            zur Kenntnis genommen und willige ein, dass meine Angaben zur Kontaktaufnahme und zur Bearbeitung meiner Anfrage gespeichert und verarbeitet werden.
                        </label>
                    </div>
                    <div class="pt-2 mb-3">
                        <div class="g-recaptcha" data-sitekey="6LfYSIAqAAAAAE9j6XmbdSe9UAIjo5KQTAplX3qF"
                            data-callback="onRecaptchaSuccess"></div>
                        @error('g-recaptcha-response')<div class="text-danger small mt-1">Bitte bestätigen Sie, dass Sie kein Roboter sind.</div>@enderror
                    </div>
                    
                    <button style="border-radius: 5px" type="submit" class="btn btn-primary w-100 btn-lg" id="submit-btn" disabled>
                        Nachricht abschicken <i class="fa fa-paper-plane ms-2"></i>
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- 🟩 WEITERE KONTAKTWEGE -->
    <section class="py-5">
        <div class="container">
            <h4 style="font-size: 30px !important; letter-spacing: -0.5px" class="text-center mb-5">Weitere <span class="text-primary">Kontaktmöglichkeiten</span></h4>
            <div class="row justify-content-center g-4">
                <div class="col-sm-6 col-md-4">
                    <div class="contact-card text-center">
                        <i class="fab fa-whatsapp text-success"></i>
                        <div class="title">WhatsApp</div>
                        <div class="text pt-1 mb-3">Chatte direkt mit unserem Team</div>
                        <a href="https://wa.me/+4915774993273?text=Hey%20Carspector!" style="border-radius: 5px" class="btn btn-success btn-sm px-4">Jetzt schreiben</a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="contact-card text-center">
                        <i class="fa-regular fa-envelope text-primary"></i>
                        <div class="title">E-Mail</div>
                        <div class="text pt-1 mb-3">Wir antworten innerhalb kurzer Zeit</div>
                        <a href="mailto:info@carspector.de" style="border-radius: 5px" class="btn btn-primary btn-sm px-4">E-Mail schreiben</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@section('scripts')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    function onRecaptchaSuccess() {
        document.getElementById('submit-btn').disabled = false;
    }
</script>
@endsection
