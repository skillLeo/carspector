<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('frontpages.index');
//});
date_default_timezone_set('Asia/Karachi');

$brands = [
    'volkswagen',
    'audi',
    'porsche',
    'mercedes-benz',
    'skoda',
    'seat',
    'bmw',
    'opel',
    'ford',
    'peugeot',
    'renault',
    'citroen',
    'fiat',
    'toyota',
    'honda',
    'hyundai',
    'mazda',
    'nissan',
    'kia',
    'volvo',
    'suzuki',
    'mitsubishi',
    'subaru',
    'chevrolet',
    'jeep',
    'alfa-romeo',
    'land-rover',
    'jaguar',
    'mini',
    'dacia',
    'chrysler',
    'maserati',
    'dodge',
    'saab',
    'smart',
    'aston-martin',
];

if(!function_exists('brandTitleFromSlug')){
    function brandTitleFromSlug(string $brand): string
    {
        $special = [
            'bmw'            => 'BMW',
            'mini'           => 'MINI',
            'saab'           => 'SAAB',
            'kia'            => 'KIA',
            'skoda'          => 'Škoda',
            'mercedes-benz'  => 'Mercedes-Benz',
            'alfa-romeo'     => 'Alfa Romeo',
            'land-rover'     => 'Land Rover',
            'aston-martin'   => 'Aston Martin',
        ];

        if (isset($special[$brand])) {
            return $special[$brand];
        }

        return collect(explode('-', $brand))
            ->map(fn ($part) => Str::ucfirst($part))
            ->implode(' ');
    }
}

Route::view('/marken', 'frontpages.marken')->name('marken');

Route::get('/marken/gebrauchtwagencheck-{brand}', function (string $brand) use ($brands) {

    abort_unless(in_array($brand, $brands, true), 404);

    return view('frontpages.marken.brand', [
        'brand'         => $brand,
        'brandTitle'    => brandTitleFromSlug($brand),
        'canonicalUrl'  => url("/marken/gebrauchtwagencheck-{$brand}"),
    ]);

})->name('marken.brand');

Route::view('/standorte/gebrauchtwagencheck-gießen', 'frontpages.giessen')->name('giessen');
Route::view('/standorte/gebrauchtwagencheck-deutschlandweit', 'frontpages.standorte.deutschlandweit')->name('standorte.deutschlandweit');
Route::view('/gebrauchtwagencheck-deutschlandweit', 'frontpages.standorte.deutschlandweit')->name('standorte.deutschlandweit');

$cities = [
    'berlin', 'duesseldorf', 'muenchen', 'hannover', 'hamburg', 'dresden', 'koeln', 'frankfurt',
    'stuttgart', 'leipzig', 'dortmund', 'bremen', 'essen', 'nuernberg', 'duisburg', 'bochum',
    'wuppertal', 'bielefeld', 'bonn', 'mannheim', 'karlsruhe', 'wiesbaden', 'muenster',
    'augsburg', 'gelsenkirchen', 'aachen', 'moenchengladbach', 'braunschweig', 'chemnitz',
    'kiel', 'erfurt', 'magdeburg', 'freiburg', 'krefeld', 'luebeck', 'oberhausen', 'hagen', 'hamm',
    'saarbruecken', 'potsdam', 'ludwigshafen', 'oldenburg', 'leverkusen',
    'osnabrueck', 'solingen', 'herne', 'neuss', 'heidelberg',
    'darmstadt', 'paderborn', 'regensburg', 'ingolstadt', 'wuerzburg',
    'wolfsburg', 'ulm', 'heilbronn', 'recklinghausen', 'goettingen',
    'rostock', 'hildesheim', 'koblenz', 'trier', 'siegen',
    'cottbus', 'konstanz', 'flensburg', 'zwickau', 'gera',
    'schwerin', 'witten', 'kempten', 'fuerth', 'neubrandenburg',
    'bayreuth', 'landshut', 'ravensburg', 'weimar', 'plauen',
    'passau', 'bottrop', 'salzgitter', 'giessen', 'hof',
    'worms', 'hanau', 'celle', 'wismar', 'bamberg',
    'delmenhorst', 'luenen', 'tuebingen', 'freising', 'gummersbach',
    'lippstadt', 'sindelfingen', 'villingen-schwenningen', 'rheine', 'ratingen',
    'marburg', 'gladbeck', 'bergisch-gladbach', 'neumuenster', 'dueren',
    'aschaffenburg', 'friedrichshafen', 'lueneburg', 'fulda', 'friedberg',
    'kaarst', 'elmshorn', 'jena', 'greven', 'hennef',
    'greifswald', 'detmold', 'minden', 'coburg', 'boeblingen',
    'cuxhaven', 'erding', 'freudenstadt', 'filderstadt', 'geesthacht',
    'itzehoe', 'emden', 'eisenach', 'heidenheim', 'hameln',
    'herford', 'homburg', 'kerpen', 'kleve', 'lahr',
    'langenfeld', 'memmingen', 'nordhorn', 'bingen', 'coesfeld',
    'dinslaken', 'ditzingen', 'eschwege', 'erkelenz', 'geislingen',
    'gersthofen', 'giengen', 'glauchau', 'greiz', 'grimma',
    'offenburg', 'straubing', 'euskirchen', 'villingen', 'ansbach',
    'bautzen', 'cloppenburg', 'deggendorf', 'limburg', 'rottweil',
    'eberswalde', 'forchheim', 'halberstadt', 'hofgeismar', 'landau',
    'merzig', 'altenburg', 'andernach', 'bitburg', 'borken',
    'eschborn', 'eckernfoerde', 'falkensee', 'aurich', 'alsfeld',
    'kevelaer', 'haan', 'peine', 'buedingen', 'balingen',
    'burgdorf', 'diepholz', 'finsterwalde', 'hemer', 'kamen',
    'werdau', 'lichtenfels', 'brilon', 'stade', 'buxtehude',
    'brandenburg', 'naumburg', 'nordenham', 'goerlitz', 'moers',
    'pirna', 'schweinfurt', 'pinneberg', 'speyer', 'neuwied',
    'remscheid', 'meppen', 'bad-kreuznach', 'gronau', 'emmendingen',
    'kaufbeuren', 'ilmenau', 'ahlen', 'ettlingen', 'zeits',
    'neuhaus', 'bernburg', 'eilenburg', 'wilhelmshaven', 'erkrath',
    'datteln', 'amberg', 'schwabach', 'viersen', 'gevelsberg',
    'gifhorn', 'seelze', 'rosenheim', 'ingelheim', 'kamp-lintfort',
    'dormagen', 'lohmar', 'wuerselen', 'weissenfels', 'eppingen',
    'aalen', 'aschersleben', 'eschweiler', 'hoyerswerda', 'friedrichsdorf',
    'pforzheim', 'dessau', 'bremerhaven', 'nordhausen', 'ruesselsheim',
];


if(!function_exists('cityTitleFromSlug')){
    function cityTitleFromSlug(string $city): string
    {
        // Sonderfälle mit ß oder Spezialschreibung
        $special = [
            'weissenfels'     => 'Weißenfels',
            'gross-gerau'     => 'Groß-Gerau', // falls irgendwann
            'giessen'     => 'Gießen',
        ];

        if (isset($special[$city])) {
            return $special[$city];
        }

        // Grundform
        $title = Str::of($city)
            ->replace('-', ' ')
            ->lower();

        // NUR Umlaut-Regeln (KEIN ss → ß)
        $title = str_replace(
            ['ae', 'oe', 'ue'],
            ['ä', 'ö', 'ü'],
            $title
        );

        // Wörter korrekt groß schreiben
        return collect(explode(' ', $title))
            ->map(fn ($word) =>
                mb_strtoupper(mb_substr($word, 0, 1)) . mb_substr($word, 1)
            )
            ->implode(' ');
    }
}


Route::get('/standorte/gebrauchtwagencheck-{city}', function (string $city) use ($cities) {

    abort_unless(in_array($city, $cities, true), 404);

    return view('frontpages.standorte.city', [
        'city'          => $city,
        'cityTitle'     => cityTitleFromSlug($city),
        'canonicalUrl'  => url("/standorte/gebrauchtwagencheck-{$city}"),
    ]);

})->name('standorte.city');


$staedte = [
    'berlin',
    'duesseldorf',
    'muenchen',
    'hannover',
    'hamburg',
    'dresden',
    'koeln',
    'frankfurt',
    'stuttgart',
    'leipzig',
    'dortmund',
    'bremen',
];

foreach ($staedte as $stadt) {
    Route::redirect("/gebrauchtwagencheck-$stadt", "/standorte/gebrauchtwagencheck-$stadt", 301);
}
Route::get('/buchung', function () {
    return redirect()->away('https://carspector.de/booking-step-1');
});

Route::view('/zulassung', 'frontpages.vorteile.zulassung')->name('vorteile.zulassung');

Route::view('/kaufabwicklung-danke', 'frontpages.kauf-danke')->name('kauf-danke');
Route::view('/purchase-handling-thanks', 'frontpages.pur-thanks')->name('pur-thanks');

Route::view('/elektro', 'frontpages.vorteile.elektro')->name('vorteile.elektro');
Route::view('/batterie-check-elektroauto', 'frontpages.vorteile.batterie-check')->name('vorteile.batterie-check');

Route::view('/geschaeftskunden', 'frontpages.b2b')->name('b2b');
Route::view('/ueber-uns', 'frontpages.ueber-uns')->name('ueber-uns');
Route::view('/fin-abfrage', 'frontpages.fin-abfrage')->name('fin.abfrage');
Route::view('/karriere', 'frontpages.karriere')->name('karriere');
Route::view('/danke', 'frontpages.danke')->name('danke');
Route::view('/danke-2', 'frontpages.danke-2')->name('danke-2');
Route::view('/erfahrungen', 'frontpages.erfahrungen')->name('erfahrungen');
Route::redirect('/rezensionen', '/erfahrungen', 301);
Route::view('/check', 'frontpages.landingtest23')->name('landingtest23');
Route::view('/check-info', 'frontpages.check-info')->name('check-info');
Route::post('/landingtest23-submit', [\App\Http\Controllers\BrevoLeadController::class, 'submit'])->name('landingtest23.submit');

Route::view('/examiner-thanks', 'frontpages.examiner-thanks')->name('examiner-thanks');

Route::view('/faq/allgemein', 'frontpages.faq.allgemein')->name('faq.allgemein');
Route::view('/faq/zahlung', 'frontpages.faq.zahlung')->name('faq.zahlung');
Route::view('/faq/buchung', 'frontpages.faq.buchung')->name('faq.buchung');
Route::view('/faq/ablauf', 'frontpages.faq.ablauf')->name('faq.ablauf');
Route::view('/faq/fragen-gebrauchtwagencheck', 'frontpages.faq.fragen-gebrauchtwagencheck')->name('faq.fragen-gebrauchtwagencheck');
Route::view('standorte', 'frontpages.standorte')->name('standorte');

Route::view('/landing-entfernung', 'frontpages.landing-entfernung')->name('landing-entfernung');
Route::view('/landing-zeit', 'frontpages.landing-zeit')->name('landing-zeit');
Route::view('/landing-techniklaie', 'frontpages.landing-techniklaie')->name('landing-techniklaie');
Route::view('/landing-verkaeufer', 'frontpages.landing-verkaeufer')->name('landing-verkaeufer');

Route::get('/clear-balance',[\App\Http\Controllers\FrontPageController::class,'clearBalance'])->name('balance.clear');
Route::get('/impressum',[\App\Http\Controllers\FrontPageController::class,'impressum'])->name('impressum');
Route::get('/faq',[\App\Http\Controllers\FrontPageController::class,'faq'])->name('faq');
Route::get('/agb',[\App\Http\Controllers\FrontPageController::class,'agb'])->name('agb');
Route::get('/datenschutz',[\App\Http\Controllers\FrontPageController::class,'datenschutz'])->name('datenschutz');
Route::get('/widerruf',[\App\Http\Controllers\FrontPageController::class,'widerruf'])->name('widerruf');
Route::get('/preise',[\App\Http\Controllers\FrontPageController::class,'preise'])->name('preise');
Route::get('/buchung-s4',[\App\Http\Controllers\FrontPageController::class,'bookingS4'])->name('buchung-s4');
Route::get('/review-page',[\App\Http\Controllers\FrontPageController::class,'reviewPage'])->name('review-page');
Route::get('/promo-check',[\App\Http\Controllers\FrontPageController::class,'promoCheck'])->name('promo.check');

Route::get('/inhalt',[\App\Http\Controllers\FrontPageController::class,'inhalt'])->name('inhalt');
Route::get('/angebot',[\App\Http\Controllers\FrontPageController::class,'angebot'])->name('angebot');
//Route::get('/verhandlung-download-717',[\App\Http\Controllers\FrontPageController::class,'verhandlungdownload'])->name('verhandlungdownload');
Route::get('/vorkaufcheck',[\App\Http\Controllers\FrontPageController::class,'vorkaufcheck'])->name('vorkaufcheck');
Route::get('/kaufabwicklung',[\App\Http\Controllers\FrontPageController::class,'kaufabwicklung'])->name('kaufabwicklung');

Route::get('/contact',[\App\Http\Controllers\FrontPageController::class,'kontakt'])->name('kontakt');
Route::get('/kontakt',[\App\Http\Controllers\FrontPageController::class,'kontakt'])->name('kontakt');

Route::post('/post-vortile-6',[\App\Http\Controllers\FrontPageController::class,'storeVortile'])->name('votile.post');
Route::get('/vortile-store',[\App\Http\Controllers\FrontPageController::class,'vortileSuccess'])->name('votile.success');

Route::get('/vorteile',[\App\Http\Controllers\FrontPageController::class,'gebrauchtwagencheck'])->name('gebrauchtwagencheck');
Route::get('/vorteile1',[\App\Http\Controllers\FrontPageController::class,'kaufbegleitung'])->name('kaufbegleitung');
Route::get('/vorteile2',[\App\Http\Controllers\FrontPageController::class,'oldtimer'])->name('oldtimer');
Route::get('/vorteile3',[\App\Http\Controllers\FrontPageController::class,'transporter'])->name('transporter');
Route::get('/vorteile4',[\App\Http\Controllers\FrontPageController::class,'sportwagen'])->name('sportwagen');
Route::get('/vorteile5',[\App\Http\Controllers\FrontPageController::class,'wohnmobil'])->name('wohnmobil');
Route::get('/vorteile6',[\App\Http\Controllers\FrontPageController::class,'inseratvergleich'])->name('inseratvergleich');

Route::get('/inserat-vergleich',[\App\Http\Controllers\FrontPageController::class,'inseratvergleich'])->name('inseratvergleich');

Route::get('/rezensionen',[\App\Http\Controllers\FrontPageController::class,'rezensionen'])->name('rezensionen');
Route::get('/stadtplz',[\App\Http\Controllers\FrontPageController::class,'stadtplz'])->name('stadtplz');
Route::post('/store-stadtplz',[\App\Http\Controllers\FrontPageController::class,'postStadtplz'])->name('store.stadtplz');
Route::get('/fahrzeuglieferung',[\App\Http\Controllers\FrontPageController::class,'fahrzeuglieferung'])->name('fahrzeuglieferung');
Route::post('/store-fahrzeuglieferung',[\App\Http\Controllers\FrontPageController::class,'postFahrzeuglieferung'])->name('store.fahrzeuglieferung');

Route::get('/inseratwertgutachten',[\App\Http\Controllers\FrontPageController::class,'inseratcheck'])->name('inseratcheck');
Route::get('/gebrauchtwagencheck',[\App\Http\Controllers\FrontPageController::class,'gebrauchtwagencheck'])->name('gebrauchtwagencheck');
Route::get('/kaufbegleitung',[\App\Http\Controllers\FrontPageController::class,'kaufbegleitung'])->name('kaufbegleitung');
Route::get('/oldtimer',[\App\Http\Controllers\FrontPageController::class,'oldtimer'])->name('oldtimer');
Route::get('/transporter',[\App\Http\Controllers\FrontPageController::class,'transporter'])->name('transporter');
Route::get('/sportwagen',[\App\Http\Controllers\FrontPageController::class,'sportwagen'])->name('sportwagen');
Route::get('/wohnmobil',[\App\Http\Controllers\FrontPageController::class,'wohnmobil'])->name('wohnmobil');
Route::get('/inseratcheck',[\App\Http\Controllers\FrontPageController::class,'inseratcheck'])->name('inseratcheck');

Route::get('/preisermittlung',[\App\Http\Controllers\FrontPageController::class,'wertermittlung'])->name('preisermittlung');
Route::get('/wertermittlung',[\App\Http\Controllers\FrontPageController::class,'wertermittlung'])->name('wertermittlung');

Route::get('/review',[\App\Http\Controllers\FrontPageController::class,'review']);
Route::post('/review-save',[\App\Http\Controllers\FrontPageController::class,'saveReview'])->name('review.save');
Route::get('/support',[\App\Http\Controllers\FrontPageController::class,'support'])->name('support');
Route::post('/post-contact',[\App\Http\Controllers\FrontPageController::class,'postContact'])->name('contact.post');

Route::get('/partner-werden',[\App\Http\Controllers\ExaminerController::class,'index'])->name('examiner.home');
Route::redirect('/partner-werden', '/partner', 301);
Route::get('examiners',[\App\Http\Controllers\BookingController::class,'bookingStep1'])->name('examiners');

Route::get('/check-examiner',[\App\Http\Controllers\BookingController::class,'bookingStep1'])->name('examiner.check');
//Route::get('/check-examiner1',[\App\Http\Controllers\FrontPageController::class,'checkExaminer1'])->name('examiner.check');
Route::post('/check-examiner',[\App\Http\Controllers\FrontPageController::class,'postExaminerCity'])->name('examiner.city');


Route::get('profile/{id}',[\App\Http\Controllers\FrontPageController::class,'examinerProfile'])->name('examiner.profile');
Route::get('profile1/{id}',[\App\Http\Controllers\FrontPageController::class,'examinerProfile1'])->name('examiner.profile1');

Route::get('order/{id}',[\App\Http\Controllers\FrontPageController::class,'orderDetail'])->name('order.details');
Route::get('order1/{id}',[\App\Http\Controllers\FrontPageController::class,'orderDetail1'])->name('order.details1');

Route::get('order-pdf/{number?}',[\App\Http\Controllers\FrontPageController::class,'orderPdf'])
    ->whereNumber('number')
    ->name('order.pdf');
Route::get('order-pdf-en/{number?}',[\App\Http\Controllers\FrontPageController::class,'orderPdfEn'])
    ->whereNumber('number')
    ->name('order.pdf.en');
Route::group(['prefix'=>'examiner'],function(){
//Route::group(['domain'=>'examiner.craveteck.pk'],function(){

    Route::get('/order/{id}',[\App\Http\Controllers\FrontPageController::class,'orderCs'])->name('examiner.order')->middleware('auth');
    Route::post('examination-complete',[\App\Http\Controllers\FrontPageController::class,'completeExamination'])->name('examination.complete')->middleware('auth');
    Route::get('/examination-condition/{id}',[\App\Http\Controllers\FrontPageController::class,'examCondition'])->name('examiner.conditions')->middleware('auth');
    Route::get('/vehicle-data/{id}',[\App\Http\Controllers\FrontPageController::class,'vehicleData'])->name('examiner.vehicle.data')->middleware('auth');
    Route::get('/vehicle-document/{id}',[\App\Http\Controllers\FrontPageController::class,'vehicleDocs'])->name('examiner.vehicle.docs')->middleware('auth');
    Route::get('/tires/{id}',[\App\Http\Controllers\FrontPageController::class,'tries'])->name('examiner.tries')->middleware('auth');
    Route::get('/body/{id}',[\App\Http\Controllers\FrontPageController::class,'triesBody'])->name('examiner.tries.body')->middleware('auth');
    Route::get('/vehicle-light/{id}',[\App\Http\Controllers\FrontPageController::class,'vehicleLight'])->name('examiner.vehicle.light')->middleware('auth');
    Route::get('/external-condition/{id}',[\App\Http\Controllers\FrontPageController::class,'externalCondition'])->name('examiner.external.condition')->middleware('auth');
    Route::get('/technology/{id}',[\App\Http\Controllers\FrontPageController::class,'technology'])->name('examiner.technology')->middleware('auth');
    Route::get('/test-drive/{id}',[\App\Http\Controllers\FrontPageController::class,'testDrive'])->name('examiner.test.drive')->middleware('auth');
    Route::get('/interior/{id}',[\App\Http\Controllers\FrontPageController::class,'interior'])->name('examiner.interior')->middleware('auth');
    Route::get('/other-conclusion/{id}',[\App\Http\Controllers\FrontPageController::class,'otherConclusion'])->name('examiner.other.conclusion')->middleware('auth');
    Route::get('/photo/{id}',[\App\Http\Controllers\FrontPageController::class,'vehiclePhoto'])->name('examiner.vehicle.photo')->middleware('auth');
    Route::get('/paint-thickness-condition/{id}',[\App\Http\Controllers\FrontPageController::class,'paintThicknessCondition'])->name('examiner.paint.thickness.condition')->middleware('auth');
    Route::get('/pdf/{id}',[\App\Http\Controllers\FrontPageController::class,'pdf'])->name('examiner.pdf')->middleware('auth');
    // Cost calculations page (damages repeater)
    Route::get('/cost-calculations/{id}', [\App\Http\Controllers\FrontPageController::class, 'costCalculations'])->name('examiner.cost.calculations')->middleware('auth');
    Route::post('store-examination',[\App\Http\Controllers\FrontPageController::class,'storeExaminer'])->name('examination.store')->middleware('auth');
    Route::post('store-examination-images',[\App\Http\Controllers\FrontPageController::class,'storeExaminationImages'])->name('examination.store.images')->middleware('auth');
    Route::get('examination-delete-image/{id}',[\App\Http\Controllers\FrontPageController::class,'deleteExaminationImage'])->name('examination.delete.image')->middleware('auth');
    Route::post('store-examination-documents',[\App\Http\Controllers\FrontPageController::class,'storeExaminationDocuments'])->name('examination.store.documents')->middleware('auth');
    Route::get('examination-delete-document/{id}',[\App\Http\Controllers\FrontPageController::class,'deleteExaminationDocument'])->name('examination.delete.document')->middleware('auth');
    Route::post('examination-sort-images',[\App\Http\Controllers\FrontPageController::class,'sortExaminationImages'])->name('examination.sort.images')->middleware('auth');
    Route::post('examination-sort-documents',[\App\Http\Controllers\FrontPageController::class,'sortExaminationDocuments'])->name('examination.sort.documents')->middleware('auth');
    Route::post('examination-update-meta',[\App\Http\Controllers\FrontPageController::class,'updateExaminationMeta'])->name('examination.update.meta')->middleware('auth');
    Route::post('examination-update-ausstattung',[\App\Http\Controllers\FrontPageController::class,'updateExaminationAusstattung'])->name('examination.update.ausstattung')->middleware('auth');
    Route::post('examination-update-image',[\App\Http\Controllers\FrontPageController::class,'updateExaminationImage'])->name('examination.update.image')->middleware('auth');
    Route::get('examination-images-zip/{id}',[\App\Http\Controllers\FrontPageController::class,'downloadExaminationImagesZip'])->name('examination.images.zip')->middleware('auth');
    Route::get('examination-images-list/{id}',[\App\Http\Controllers\FrontPageController::class,'listExaminationImages'])->name('examination.images.list')->middleware('auth');


    Route::get('/register',[\App\Http\Controllers\FrontPageController::class,'registerExaminer'])->name('examiner.register');
    Route::permanentRedirect('/register', '/partner')->name('examiner.register');
    Route::get('/',[\App\Http\Controllers\ExaminerController::class,'index'])->name('examiner.home');
    Route::get('/login',[\App\Http\Controllers\ExaminerController::class,'login'])->name('examiner.login');

    Route::post('register',[\App\Http\Controllers\ExaminerRegisterController::class,'register'])->name('examiner.register');
    Route::get('/dashboard',[\App\Http\Controllers\ExaminerController::class,'dashboard1'])->name('examiner.dashboard');
    Route::get('/dashboard1',[\App\Http\Controllers\ExaminerController::class,'dashboard'])->name('examiner.dashboard1');
    Route::get('/edit-profile',[\App\Http\Controllers\ExaminerController::class,'editProfile'])->name('examiner.edit-profile');
    Route::post('/update-profile',[\App\Http\Controllers\ExaminerController::class,'updateProfile'])->name('examiner.update-profile');
    Route::post('/change-price',[\App\Http\Controllers\ExaminerController::class,'changePrice'])->name('examiner.change-price');
    Route::post('/update-cities',[\App\Http\Controllers\ExaminerController::class,'updateCities'])->name('examiner.update-cities');
    Route::get('/delete-city/{id}',[\App\Http\Controllers\ExaminerController::class,'deleteCity'])->name('examiner.delete-city');
    Route::get('/availability',[\App\Http\Controllers\ExaminerController::class,'availability'])->name('examiner.availability');
    Route::post('/update-image',[\App\Http\Controllers\ExaminerController::class,'updateImage'])->name('examiner.update-image');
    Route::get('/fetch-times',[\App\Http\Controllers\ExaminerController::class,'fetchTimes'])->name('availability.times');
    Route::post('/save-availability',[\App\Http\Controllers\ExaminerController::class,'saveAvailability'])->name('examiner.save-availability');
    Route::post('post-withdraw',[\App\Http\Controllers\ExaminerController::class,'postWithdraw'])->name('post-withdraw');
    Route::get('/examiner-bookings',[\App\Http\Controllers\ExaminerController::class,'pastBookings'])->name('examiner.bookings');
    Route::get('update-availability',[\App\Http\Controllers\ExaminerController::class,'updateAvailability'])->name('examiner.update-available');
});
Route::group(['prefix'=>'user','middleware'=>'auth'],function(){
   Route::get('/dashboard',[\App\Http\Controllers\UserController::class,'dashboard'])->name('user.dashboard');
   Route::get('/update-heard-about',[\App\Http\Controllers\UserController::class,'heardAbout'])->name('user.update.heard-about');;
   Route::any('/change-phone',[\App\Http\Controllers\UserController::class,'changePhone'])->name('change-phone');
});
Route::get('/admin/login',[\App\Http\Controllers\FrontPageController::class,'adminLogin'])->name('admin.login');

Route::get('user-register',[\App\Http\Controllers\BookingController::class,'userRegister'])->name('user.register');
Route::post('post-user-order-register',[\App\Http\Controllers\BookingController::class,'userOrderRegister'])->name('user.order.register');


Route::get('booking-2',[\App\Http\Controllers\BookingController::class,'step2'])->name('booking.step2');
Route::get('booking-options',[\App\Http\Controllers\BookingController::class,'options'])->name('booking.options');

Route::get('booking-request',[\App\Http\Controllers\BookingController::class,'bookingStep1'])->name('booking.option-page');
Route::get('option-page',[\App\Http\Controllers\BookingController::class,'bookingStep1'])->name('booking.option-page');
Route::get('booking/step-1',[\App\Http\Controllers\BookingController::class,'bookingStep1'])->name('booking.option-page-1');
Route::get('booking-step-1',[\App\Http\Controllers\BookingController::class,'bookingStep1'])->name('booking.option-page');
Route::get('option-transporter',[\App\Http\Controllers\BookingController::class,'bookingStep1'])->name('booking.option-transporter');
Route::get('booking-step-2',[\App\Http\Controllers\BookingController::class,'bookingStep2'])->name('booking.step-2');
Route::get('booking-step-3',[\App\Http\Controllers\BookingController::class,'bookingStep3'])->name('booking.step-3');
Route::get('booking-step-3-new',[\App\Http\Controllers\BookingController::class,'bookingStep3New'])->name('booking.step-3');

Route::get('zulassung-1',[\App\Http\Controllers\NewbookingController::class,'stepOne'])->name('zulassung.step1.show');
Route::post('zulassung-1',[\App\Http\Controllers\NewbookingController::class,'stepOneStore'])->name('zulassung.step1.store');
Route::get('zulassung-2',[\App\Http\Controllers\NewbookingController::class,'stepTwo'])->name('zulassung.step2.show');
Route::post('zulassung-2',[\App\Http\Controllers\NewbookingController::class,'stepTwoStore'])->name('zulassung.step2.store');
Route::get('zulassung-3',[\App\Http\Controllers\NewbookingController::class,'stepThree'])->name('zulassung.step3.show');
Route::post('zulassung-3',[\App\Http\Controllers\NewbookingController::class,'stepThreeStore'])->name('zulassung.step3.store');

Route::get('new-booking',[\App\Http\Controllers\NewbookingController::class,'create'])->name('new-booking.create');
Route::post('new-booking',[\App\Http\Controllers\NewbookingController::class,'store'])->name('new-booking.store');
Route::get('new-booking/success',[\App\Http\Controllers\NewbookingController::class,'success'])->name('new-booking.success');
Route::get('new-booking/cancel',[\App\Http\Controllers\NewbookingController::class,'cancel'])->name('new-booking.cancel');



Route::group(['prefix'=>'booking'],function(){
//   Route::get('step-1',[\App\Http\Controllers\BookingController::class,'step1'])->name('booking.step1');
   Route::get('calculate-price',[\App\Http\Controllers\BookingController::class,'calculatePrice'])->name('booking.price.calculate');

   Route::get('step-1-option-b',[\App\Http\Controllers\BookingController::class,'step1Option'])->name('booking.step1Optionb');
   Route::post('step-1',[\App\Http\Controllers\BookingController::class,'postStep1'])->name('booking.step1');
   Route::get('request',[\App\Http\Controllers\BookingController::class,'bookingStep1'])->name('booking.request');
   Route::post('post-request',[\App\Http\Controllers\BookingController::class,'bookingPostRequest'])->name('booking.request.post');
//   Route::get('step-2',[\App\Http\Controllers\BookingController::class,'step2'])->name('booking.step2');
   Route::post('step-2',[\App\Http\Controllers\BookingController::class,'postStep2'])->name('booking.step2-post');
   Route::get('step-3',[\App\Http\Controllers\BookingController::class,'step3'])->name('booking.step3');
   Route::get('/fetch-slots',[\App\Http\Controllers\BookingController::class,'getSlots'])->name('fetch.slots');
   Route::get('tologin',[\App\Http\Controllers\BookingController::class,'toLogin'])->name('tologin');
   Route::get('/register',[\App\Http\Controllers\BookingController::class,'register'])->name('booking.register');
});

Route::post('pay-now',[\App\Http\Controllers\CheckoutController::class,'payNow'])->name('pay-now');
Route::get('success',[\App\Http\Controllers\CheckoutController::class,'success'])->name('success');
Route::get('vortile-success',[\App\Http\Controllers\CheckoutController::class,'vortileSuccess'])->name('vortile.success.payment');
Route::get('payment-success/{id}',[\App\Http\Controllers\CheckoutController::class,'paymentSuccess'])->name('payment.success');

Route::get('/change-password',[\App\Http\Controllers\UserController::class,'changePassword'])->name('password.change');
Route::post('/change-password',[\App\Http\Controllers\UserController::class,'storePassword'])->name('password.store');
Auth::routes();
Route::get('auth/google', [\App\Http\Controllers\GoogleLoginController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [\App\Http\Controllers\GoogleLoginController::class, 'handleGoogleCallback']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->middleware(['auth','admin_or_staff'])->name('admin');
Route::group(['prefix'=>'user','middleware'=>['auth','admin_or_staff']],function(){
   Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('user.view');
   Route::post('/store-user', [App\Http\Controllers\Admin\UserController::class, 'postUser'])->name('user.store');
   Route::get('/fetch-users',[\App\Http\Controllers\Admin\UserController::class,'fetchUser']);

});
Route::group(['prefix'=>'admin','middleware'=>['auth','admin_or_staff']],function(){

    Route::middleware('admin')->group(function () {
        Route::get('/fake-examiner',[App\Http\Controllers\Admin\UserController::class,'changeExaminer'])->name('fake.examiners');
        Route::get('/send-customer-pdf/{id}',[App\Http\Controllers\Admin\BookingController::class,'sendCustomerPDF'])->name('send.customer.pdf');

        Route::get('/examinations',[App\Http\Controllers\Admin\ExaminationController::class,'examinations'])->name('admin.examinations');
        Route::get('/examination-fetch',[App\Http\Controllers\Admin\ExaminationController::class,'fetch'])->name('examinations.fetch');
        Route::get('/examination-delete/{id}',[App\Http\Controllers\Admin\ExaminationController::class,'delete'])->name('examination.delete');

        Route::get('/examiners', [App\Http\Controllers\Admin\UserController::class, 'examiners'])->name('examiners.view');
        Route::get('/partners', [App\Http\Controllers\Admin\UserController::class, 'partners'])->name('partners.view');
        Route::get('/users-heard', [App\Http\Controllers\Admin\UserController::class, 'heardAbout'])->name('users.heard_about');
        Route::get('/users-exports', [App\Http\Controllers\Admin\UserController::class, 'export'])->name('users.export');
        Route::get('/admins', [App\Http\Controllers\Admin\UserController::class, 'admins'])->name('admins.view');
        Route::get('/staff', [App\Http\Controllers\Admin\UserController::class, 'staff'])->name('staff.view');
        Route::get('/unverified', [App\Http\Controllers\Admin\UserController::class, 'unverified'])->name('unverified.view');

        Route::get('/reviews',[\App\Http\Controllers\Admin\UserController::class,'reviews'])->name('admin.reviews');
        Route::get('fetch-reviews',[\App\Http\Controllers\Admin\UserController::class,'fetchReviews']);
        Route::get('review-delete/{id}',[\App\Http\Controllers\Admin\UserController::class,'deleteReview']);

        Route::get('booking-status/{id}',[\App\Http\Controllers\Admin\BookingController::class,'bookingStatus'])->name('admin.booking.status');

        Route::get('/withdraw-requests',[\App\Http\Controllers\AdminController::class,'withdrawRequest'])->name('admin.withdraw-request');
        Route::post('update-withdraw-status',[\App\Http\Controllers\AdminController::class,'updateStatus'])->name('admin.withdraw-status');
        Route::get('fetch-withdraw',[\App\Http\Controllers\AdminController::class,'fetchWithdraw'])->name('fetch.withdraw');
        Route::get('/delete-request/{id}',[\App\Http\Controllers\AdminController::class,'deleteRequest'])->name('delete-request');

        Route::get('/partner-logos', [\App\Http\Controllers\Admin\PartnerLogoController::class, 'index'])->name('admin.partner-logos.index');
        Route::post('/partner-logos', [\App\Http\Controllers\Admin\PartnerLogoController::class, 'store'])->name('admin.partner-logos.store');
        Route::delete('/partner-logos/{partnerLogo}', [\App\Http\Controllers\Admin\PartnerLogoController::class, 'destroy'])->name('admin.partner-logos.destroy');

        Route::get('/profile-settings', [\App\Http\Controllers\Admin\ProfileSettingsController::class, 'edit'])->name('admin.profile.settings');
        Route::post('/profile-settings/email', [\App\Http\Controllers\Admin\ProfileSettingsController::class, 'updateEmail'])->name('admin.profile.settings.email');
        Route::post('/profile-settings/password', [\App\Http\Controllers\Admin\ProfileSettingsController::class, 'updatePassword'])->name('admin.profile.settings.password');
        Route::post('/profile-settings/picture', [\App\Http\Controllers\Admin\ProfileSettingsController::class, 'updatePicture'])->name('admin.profile.settings.picture');
        Route::post('/profile-settings/2fa/enable', [\App\Http\Controllers\Admin\ProfileSettingsController::class, 'enableTwoFactor'])->name('admin.profile.settings.2fa.enable');
        Route::post('/profile-settings/2fa/verify', [\App\Http\Controllers\Admin\ProfileSettingsController::class, 'verifyTwoFactor'])->name('admin.profile.settings.2fa.verify');
        Route::post('/profile-settings/2fa/disable', [\App\Http\Controllers\Admin\ProfileSettingsController::class, 'disableTwoFactor'])->name('admin.profile.settings.2fa.disable');
    });

    Route::get('/search-users',[App\Http\Controllers\Admin\UserController::class,'searchUsers'])->name('admin.users.search');
    Route::post('update-city',[\App\Http\Controllers\Admin\UserController::class,'updateCity'])->name('admin.update-city');
    Route::post('update-price',[\App\Http\Controllers\Admin\UserController::class,'updatePrice'])->name('admin.update-price');

    Route::get('user/profile/{id}',[\App\Http\Controllers\Admin\UserController::class,'profile'])->name('admin.profile');
    Route::post('adjust-balance',[\App\Http\Controllers\UserController::class,'adjustBalance'])->name('adjust-balance');
    Route::get('delete-review/{id}',[\App\Http\Controllers\Admin\UserController::class,'deleteReview'])->name('delete-review');
    Route::get('delete-transaction/{id}',[\App\Http\Controllers\Admin\UserController::class,'deleteTransaction'])->name('delete-transaction');
    Route::get('verify-now/{id}',[\App\Http\Controllers\Admin\UserController::class,'verifyNow'])->name('verify-now');
    Route::get('delete-user/{id}',[\App\Http\Controllers\Admin\UserController::class,'deleteUser'])->name('delete-user');
    Route::get('delete-booking/{id}',[\App\Http\Controllers\Admin\UserController::class,'deleteBooking'])->name('booking.delete');
    Route::get('delete-users',[\App\Http\Controllers\Admin\UserController::class,'deleteUsers'])->name('delete.users');

    Route::get('bookings',[\App\Http\Controllers\Admin\BookingController::class,'bookings'])->name('admin.bookings');
    Route::get('/booking/edit',[\App\Http\Controllers\Admin\BookingController::class,'editBooking'])->name('booking.edit');

    Route::post('booking-store',[\App\Http\Controllers\Admin\BookingController::class,'storeBooking'])->name('admin.booking.store');
    Route::post('send-examiner-email',[\App\Http\Controllers\Admin\BookingController::class,'sendExaminerEmail'])->name('admin.examiner.email');
    Route::get('fetch-bookings',[\App\Http\Controllers\Admin\BookingController::class,'fetchBookings'])->name('bookings.fetch');
    Route::get('new-bookings',[\App\Http\Controllers\Admin\BookingController::class,'newBookings'])->name('admin.new-bookings.index');
    Route::get('fetch-new-bookings',[\App\Http\Controllers\Admin\BookingController::class,'fetchNewBookings'])->name('admin.new-bookings.fetch');
    Route::get('new-bookings/{newBooking}',[\App\Http\Controllers\Admin\BookingController::class,'showNewBooking'])->name('admin.new-bookings.show');
    Route::get('new-bookings/{newBooking}/data',[\App\Http\Controllers\Admin\BookingController::class,'newBookingData'])->name('admin.new-bookings.data');
    Route::put('new-bookings/{newBooking}',[\App\Http\Controllers\Admin\BookingController::class,'updateNewBooking'])->name('admin.new-bookings.update');
    Route::delete('new-bookings/{newBooking}',[\App\Http\Controllers\Admin\BookingController::class,'deleteNewBooking'])->name('admin.new-bookings.delete');
});
Route::get('/fetch-examiners',[\App\Http\Controllers\BookingController::class,'fetchExaminers'])->name('examiners.fetch');
Route::post('/assign-examiner',[\App\Http\Controllers\BookingController::class,'assignExaminer'])->name('examiners.assign');
Route::get('/booking-detail/{id}',[\App\Http\Controllers\BookingController::class,'bookingDetail'])->name('booking.detail');
Route::get('/partner-password/{id}',[\App\Http\Controllers\FrontPageController::class,'partnerPassword'])->name('partner.password');
Route::post('/partner-password-update',[\App\Http\Controllers\FrontPageController::class,'partnerPasswordUpdate'])->name('partner.password.update');

Route::get('/orders',[\App\Http\Controllers\UserController::class,'orders']);
Route::get('fake-examiner',[\App\Http\Controllers\FrontPageController::class,'fakeExaminers']);

Route::get('/db-seed',function (){
   \Illuminate\Support\Facades\Artisan::call('migrate:fresh --seed');
});
Route::get('partner',[\App\Http\Controllers\FrontPageController::class,'newBooking'])->name('booking.new');
Route::post('store-booking',[\App\Http\Controllers\FrontPageController::class,'sendNewBooking'])->name('booking.send');
Route::get('/',[\App\Http\Controllers\FrontPageController::class,'index'])->name('index');

// Two-factor challenge routes
Route::get('/two-factor/challenge', [\App\Http\Controllers\Auth\TwoFactorController::class, 'showChallenge'])->name('two-factor.challenge');
Route::post('/two-factor/challenge', [\App\Http\Controllers\Auth\TwoFactorController::class, 'verifyChallenge'])->name('two-factor.verify');

// Order damages routes
Route::group(['prefix' => 'order-damages'], function () {
    Route::get('/{orderId}', [\App\Http\Controllers\OrderDamageController::class, 'fetch'])->name('order-damages.fetch');
    Route::post('/save', [\App\Http\Controllers\OrderDamageController::class, 'save'])->name('order-damages.save');
    Route::post('/toggle-show', [\App\Http\Controllers\OrderDamageController::class, 'toggleShow'])->name('order-damages.toggle');
});
