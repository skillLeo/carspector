<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#01449a">

    <title>@yield('title', 'Carspector | Gebrauchtwagencheck – professionelle Fahrzeugprüfung deutschlandweit')</title>
    <meta name="description" content="@yield('meta_description', 'Lass dein Wunschfahrzeug vor dem Kauf professionell prüfen – unabhängiger Gebrauchtwagencheck vor Ort. Deutschlandweit nach TÜV-Richtlinien.')">

    <link rel="icon" href="/favicon.ico">

    <!-- === CSS CDNs & StyleSheets === -->
    <link rel="stylesheet" href="{{ asset('theme-1/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme-1/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme-1/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('theme-1/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('theme-1/css/responsive.css') }}">

    @yield('styles')

   
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MFTV9XF9');</script>
<!-- End Google Tag Manager -->

<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '407563301697559');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=407563301697559&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->

<!-- TikTok Pixel Code Start -->
<script>
!function (w, d, t) {
  w.TiktokAnalyticsObject=t;var ttq=w[t]=w[t]||[];ttq.methods=["page","track","identify","instances","debug","on","off","once","ready","alias","group","enableCookie","disableCookie","holdConsent","revokeConsent","grantConsent"],ttq.setAndDefer=function(t,e){t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}};for(var i=0;i<ttq.methods.length;i++)ttq.setAndDefer(ttq,ttq.methods[i]);ttq.instance=function(t){for(
var e=ttq._i[t]||[],n=0;n<ttq.methods.length;n++)ttq.setAndDefer(e,ttq.methods[n]);return e},ttq.load=function(e,n){var r="https://analytics.tiktok.com/i18n/pixel/events.js",o=n&&n.partner;ttq._i=ttq._i||{},ttq._i[e]=[],ttq._i[e]._u=r,ttq._t=ttq._t||{},ttq._t[e]=+new Date,ttq._o=ttq._o||{},ttq._o[e]=n||{};n=document.createElement("script")
;n.type="text/javascript",n.async=!0,n.src=r+"?sdkid="+e+"&lib="+t;e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(n,e)};


  ttq.load('CTVQ93BC77U6098JJBV0');
  ttq.page();
}(window, document, 'ttq');
</script>
<!-- TikTok Pixel Code End -->




<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "Carspector",
  "url": "https://www.carspector.de",
  "logo": "https://www.carspector.de/favicon.ico",
  "description": "Carspector bietet deutschlandweit Gebrauchtwagenchecks vor Ort an.",
  "contactPoint": [{
    "@type": "ContactPoint",
    "telephone": "+4921192325550",
    "contactType": "customer support",
    "email": "info@carspector.de",
    "areaServed": "DE",
    "availableLanguage": ["de", "en"],
    "hoursAvailable": [{
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": [
        "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"
      ],
      "opens": "09:00",
      "closes": "18:00"
    }]
  }],
  "sameAs": [
  "https://www.facebook.com/carspector",
  "https://www.instagram.com/carspector.de",
  "https://www.x.com/carspector",
  "https://www.tiktok.com/@carspector", 
  "https://www.youtube.com/@carspector_de"
]
}
</script>


<!-- <script>
  window.dataLayer = window.dataLayer || [];
  window.addEventListener('message', function(event) {
    if (event.data && event.data.name === 'UC_CONSENT_UPDATED') {
      dataLayer.push({ event: 'all_consents_granted' });
    }
  });
</script> -->


    <!-- Google tag (gtag.js) 
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-65LCZE82B5"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-65LCZE82B5');
    </script>

     Google tag (gtag.js) 
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-11007240787"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-11007240787');
</script>




 <script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "Review",
  "itemReviewed": {
    "@type": "Product",
    "name": "Gebrauchtwagencheck",
    "aggregateRating": {
      "@type": "AggregateRating",
      "ratingValue": 4.8,
      "ratingCount": 2715
    }
  },
  "reviewRating": {
    "@type": "Rating",
    "ratingValue": 5,
    "bestRating": 5,
    "worstRating": 1
  },
  "author": {
    "@type": "Person",
    "name": "Kunde"
  },
  "datePublished": "2025-01-17"
}
</script> -->

<!-- <script>(function(w,r){w._rwq=r;w[r]=w[r]||function(){(w[r].q=w[r].q||[]).push(arguments)}})(window,'rewardful');</script>
<script async src='https://r.wdfl.co/rw.js' data-rewardful='3bf063'></script> -->
<style>

    footer a:hover {
        color: var(--primary) !important;
    }
    
        .b-pad {
            letter-spacing: 0px !important;
        }
    
@media (max-width: 500px) {
    div[style*="display: flex; flex-wrap: wrap"] > div {
        flex: 1 1 100% !important;
        min-width: 100% !important;
    }
}

@media (min-width: 926px) {
  .line-break::after {
    content: "";
    display: block;
  }
}
.mobile-submenu li,
.mobile-nav-item {
    margin-bottom: 4px; /* oder 2px für noch enger */
}

.mobile-submenu a,
.mobile-nav-link {
    padding-bottom: 7px;
}
     .section-bg {
  background: #f2f7fc !important;
}
</style>
</head>

<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MFTV9XF9"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


<!-- End Google Tag Manager (noscript) -->

<!-- =====Mobile Header Area End===== -->

<!-- =====Header Area Start===== -->
@yield('header')
<!-- =====Header Area End===== -->

<!-- =====Main Area Start===== -->
@yield('content')
<!-- =====Main Area End===== -->

<!-- =====Footer Area End===== -->
@if(!in_array(\Request::route()->getName(),['booking.option-page','booking.step-2','booking.step-3', 'buchung-s4', 'zulassung.step1.show', 'zulassung.step2.show', 'zulassung.step3.show']))

    <footer class="footer-area section-bg" style=" padding: 50px 0 20px; font-family: Lato, sans-serif;">
  <div style="
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
    box-sizing: border-box;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 40px;
    text-align: left;
  ">
<div style="display: flex; flex-wrap: wrap; gap: 40px; justify-content: space-between;">
            <!-- Logo & Description -->
             <div style="flex: 1 1 325px; min-width: 200px">
                <div style="margin-bottom: 25px;">
                    <a href="{{ url('/') }}">
                        <img src="/logo-footer-v2.png" alt="Carspector" style="max-width: 250px;">
                    </a>
                </div>
                <p style="color: #333; font-size: 15px; line-height: 1.8;">
                  Carspector bietet deutschlandweit Gebrauchtwagenchecks an, mit dem Ziel, den Gebrauchtwagenkauf transparenter und sicherer
                  <span class="line-break"></span> zu gestalten.
                </p>
            </div>

            <!-- Kontakt Block -->
             <div style="flex: 1 1 250px; min-width: 160px;">
                <h4 class="b-pad" style="color: var(--primary); font-size: 17px; margin-bottom: 15px;">Kontakt</h4>
                <p style="margin: 5px 0; color: #333; font-size: 16px; line-height: 1.8;">Telefon: <a href="tel:+4921192325550" style="color: #333; text-decoration: none;">+49 211 92325550</a></p>
                <p style="margin: 5px 0; color: #333; font-size: 16px; line-height: 1.8;">E-Mail: <a href="mailto:info@carspector.de" style="color: #333; text-decoration: none;">info@carspector.de</a></p>

                <div style="margin-top: 20px; display: flex; gap: 17px; font-size: 25px;">
                    <a href="https://www.instagram.com/carspector.de" style="color: #E1306C;"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.facebook.com/carspector" style="color: #3b5998;"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.tiktok.com/@carspector" style="color: #000000;"><i class="fab fa-tiktok"></i></a>
                    <a href="https://www.youtube.com/@carspector_de" style="color: #FF0000;"><i class="fab fa-youtube"></i></a>
                    <a href="https://www.linkedin.com/company/carspector" style="color: #0077b5;"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>

            <!-- Seiten -->
             <div style="flex: 1 1 175px; min-width: 160px;">
                <h4 class="b-pad" style="color: var(--primary); font-size: 17px; margin-bottom: 15px;">Seiten</h4>
                <ul style="list-style: none; padding: 0; color: #333; line-height: 1.8; font-size: 16px;">
                    <li><a href="{{route('ueber-uns')}}" style="text-decoration: none; color: #333;">Über uns</a></li>
                    <li><a href="{{route('standorte')}}" style="text-decoration: none; color: #333;">Standorte</a></li>
                    <li><a href="{{route('marken')}}" style="text-decoration: none; color: #333;">Marken</a></li>
                    <li><a href="{{route('kontakt')}}" style="text-decoration: none; color: #333;">Kontakt</a></li>
                    <li><a href="{{route('karriere')}}" style="text-decoration: none; color: #333;">Karriere</a></li>
                    <li><a href="{{route('b2b')}}" style="text-decoration: none; color: #333;">Geschäftskunden / B2B</a></li>
                </ul>
            </div>

            <!-- Rechtliches -->
             <div style="flex: 1 1 75px; min-width: 100px;">
                <h4 class="b-pad" style="color: var(--primary); font-size: 16px; margin-bottom: 17px;">Rechtliches</h4>
                <ul style="list-style: none; padding: 0; color: #333; line-height: 1.8; font-size: 16px;">
                    <li><a href="{{route('impressum')}}" style="text-decoration: none; color: #333;">Impressum</a></li>
                    <li><a href="{{route('agb')}}" style="text-decoration: none; color: #333;">AGB</a></li>
                    <li><a href="{{route('datenschutz')}}" style="text-decoration: none; color: #333;">Datenschutz</a></li>
                    <li><a href="{{route('widerruf')}}" style="text-decoration: none; color: #333;">Widerruf</a></li>
                </ul>
            </div>

        </div> 
    </div>

        <div style="text-align: center; padding-top: 40px; font-size: 14px; color: #999;">
            &copy; Carspector 2026
        </div>
    </div>
</footer>

@endif
<!-- =====Footer Area End===== -->



<!-- === jQuery CDNs & Scripts === -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="{{ asset('theme-1/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('theme-1/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('theme-1/js/counterup.min.js') }}"></script>
<script src="{{ asset('theme-1/js/swiper-bundle.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('theme-1/js/script.js') }}"></script>
<script src="{{ asset('theme-1/js/plugin.js') }}"></script>
@if(session('success'))
    <script>
        toastr.success('','{{session('success')}}')
    </script>
@endif
@if(session('error'))
    <script>
        toastr.error('','{{session('success')}}')
    </script>
@endif
@yield('scripts')

<script>
    document.querySelectorAll('.mobile-nav-item a[data-bs-toggle="collapse"]').forEach(item => {
    item.addEventListener('click', function () {
        const openItems = document.querySelectorAll('.collapse.show');
        openItems.forEach(openItem => {
            if (openItem !== document.querySelector(this.getAttribute('href'))) {
                new bootstrap.Collapse(openItem, { toggle: true });
            }
        });
    });
});

    </script>

    <!-- <script src="https://cdn.brevo.com/js/sdk-loader.js" async></script>
<script>
    // Version: 2.0
    window.Brevo = window.Brevo || [];
    Brevo.push([
        "init",
        {
        client_key: "jga1ceciz19odmmctj4imy4w"
        }
    ]);
</script> -->

</body>

</html>
