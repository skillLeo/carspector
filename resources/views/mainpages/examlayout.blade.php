{{-- resources/views/mainpages/examlayout.blade.php --}}
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="@yield('meta_description', 'Gebrauchtwagencheck vor Ort – Carspector.')">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Carsceptor - Gebrauchtwagencheck | Zertifiziert')</title>

    <meta name="theme-color" content="#01449A">
    <meta name="msapplication-navbutton-color" content="#01449A">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="#01449A">

    <link rel="icon" href="/favicon.ico">

    {{-- CSS Assets --}}
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet" type="text/css">

    @yield('styles')

    <style>
        :root { --primary:#01449A; --text:#0f172a; }

        html, body { height:100%; margin:0; color:var(--text); background:#fff; }
        .page-wrap { min-height:100%; display:flex; flex-direction:column; }

        /* ===== Header ===== */
        #only-logo-header {
            display:flex;
            align-items:center;
            justify-content:center;
            padding:20px 12px;
            background:var(--primary);
        }

        #only-logo-header img {
            width: min(250px, 70vw);
            height: auto;
        }

        @media (max-width: 576px) {
            #only-logo-header img {
                width: min(225px, 60vw); /* kleiner auf Mobil */
            }
        }

        /* ===== Content ===== */
        .content { flex:1 0 auto; padding:0; }

        /* ===== Footer ===== */
        #mini-footer {
            flex-shrink:0;
            border-top:1px solid rgba(2,6,23,0.08);
            padding:28px 16px;
            text-align:center;
            background:#f5f7fa;   /* hellblauer/hellgrauer Hintergrund */
            font-size:17px;
            line-height:1.5;
        }
        #mini-footer a {
            color:var(--primary);
            text-decoration:none;
            font-weight:500;
        }
        #mini-footer a:hover {
            text-decoration:underline;
        }
    </style>
</head>
<body>
<div class="page-wrap">
    {{-- HEADER --}}
    <header id="only-logo-header">
        <img src="https://carspector.de/logo-admin.png" alt="">
    </header>

    {{-- CONTENT --}}
    <main class="content">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer id="mini-footer">
        <p style="margin:0; font-weight:600;">Hilfe benötigt?</p>
        <div style="margin-top:8px;">
            📞 <a href="tel:+4915774993273">015774993273</a> &nbsp;|&nbsp;
            💬 <a href="https://wa.me/4915774993273" target="_blank" rel="noopener">WhatsApp</a> &nbsp;|&nbsp;
            ✉️ <a href="mailto:partner@carspector.de">partner@carspector.de</a>
        </div>
    </footer>
</div>

{{-- Scripts --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
<script src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('front/js/swiper-bundle.min.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{ asset('front/js/scripts.js') }}"></script>
<script>
  // Back button handler: set next_url and submit the externalConditionForm
  $(document).on('click', '.js-save-back', function(e) {
    e.preventDefault();
    try {
      var $btn = $(this);
      var $form = $btn.closest('form#externalConditionForm');
      if ($form.length === 0) { $form = $('#externalConditionForm'); }
      if ($form.length === 0) { return; }

      var id = ($form.find('input[name="id"]').val() || '').toString().trim();
      if (id) {
          var backUrl = '/examiner/order/' + encodeURIComponent(id);
          var $next = $('input[name="next_url"]').val(backUrl);
          console.log($('input[name="next_url"]').val())
          $form.trigger('submit');
      }
      // Ensure correct form indicator
      // var $flag = $form.find('input[name="form"]').first();
      //
      // if ($flag.length) { $flag.val('save-back'); }
      // else { $form.append('<input type="hidden" name="form" value="save-back">'); }

      //
    } catch (err) { /* noop */ }
  });
</script>
<script>
    $(document).ready(function() {
        var editFieldName='';
        $(document).on('click','.btn-comment',function(e){
            e.preventDefault();
            editFieldName=$(this).data('name');
            console.log(editFieldName);

            var editValue= $('input[name='+editFieldName+']').val();
            $('.comment-text').val(editValue);


        });
        $(document).on('keyup','.comment-text',function (){

            $('input[name='+editFieldName+']').val($(this).val());

        })
    })
</script>
@yield('scripts')

@if(session('success'))
<script>toastr.success('', @json(session('success')));</script>
@endif
@if(session('error'))
<script>toastr.error('', @json(session('error')));</script>
@endif

</body>
</html>
