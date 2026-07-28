<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style>
  @page { margin: 20mm 16mm 24mm 16mm; }
  html, body { font-family: Helvetica, Arial, sans-serif; color: #1a1a1a; font-size: 12px; margin: 0; padding: 0; }

  /* ── Footer (every page) ── */
  footer {
    position: fixed; bottom: -22mm; left: 0; right: 0; height: 16mm;
    border-top: 1px solid #cbd5e1; padding-top: 4mm;
    font-size: 9px; color: #94a3b8;
  }
  .hf-tbl { width: 100%; border-collapse: collapse; }
  .page-num:before   { content: counter(page); }
  .page-total:before { content: counter(pages); }

  /* ── Top blue stripe ── */
  .top-stripe { background-color: #1e40af; height: 4px; margin-bottom: 12px; }

  /* ── Header ── */
  .doc-header { margin-bottom: 18px; }
  .doc-header-tbl { width: 100%; border-collapse: collapse; }
  .doc-header-tbl td { vertical-align: middle; padding: 0; }
  .header-right { text-align: right; font-size: 10px; color: #475569; line-height: 1.9; }
  .header-right b { color: #1e40af; }
  .header-rule { border: none; border-top: 2px solid #1e40af; margin: 10px 0 0 0; }

  /* ── Title block ── */
  .title-block { border-left: 4px solid #1e40af; padding-left: 12px; margin-bottom: 16px; }
  .doc-title { font-size: 24px; font-weight: bold; color: #0f172a; margin: 0 0 3px; }
  .doc-sub { font-size: 10px; color: #64748b; margin: 0; }

  /* ── Info table ── */
  .info-wrap { border: 1px solid #e2e8f0; margin-bottom: 20px; }
  .info-tbl { width: 100%; border-collapse: collapse; font-size: 11px; }
  .info-tbl tr { border-bottom: 1px solid #e2e8f0; }
  .info-tbl tr:last-child { border-bottom: none; }
  .info-tbl tr.odd  { background-color: #f0f5ff; }
  .info-tbl tr.even { background-color: #ffffff; }
  .info-tbl td { padding: 7px 12px; }
  .info-tbl td.lbl { font-weight: bold; color: #1e40af; width: 35%; border-right: 1px solid #e2e8f0; }
  .info-tbl td.val { color: #1a1a1a; }

  /* ── Section banner ── */
  .sect-banner {
    background-color: #1e40af; color: #ffffff;
    font-size: 10px; font-weight: bold; text-transform: uppercase; letter-spacing: 1.2px;
    padding: 7px 14px; margin-bottom: 14px;
  }
  .sect-banner-break {
    page-break-before: always;
    background-color: #1e40af; color: #ffffff;
    font-size: 10px; font-weight: bold; text-transform: uppercase; letter-spacing: 1.2px;
    padding: 7px 14px; margin-bottom: 14px;
  }

  /* ── Photo card ── */
  .photo-pair { page-break-before: always; }
  .photo-card {
    border: 1px solid #e2e8f0;
    background-color: #f8fafc;
    padding: 8px;
    margin-bottom: 10mm;
  }
  .photo-tbl { width: 100%; border-collapse: collapse; }
  .photo-tbl td { text-align: center; padding: 0; }
  .photo-tbl img { max-width: 100%; max-height: 110mm; height: auto; width: auto; }

  /* ── Caption bar ── */
  .caption-bar { background-color: #1e40af; margin-top: 7px; }
  .caption-tbl { width: 100%; border-collapse: collapse; }
  .caption-tbl td { padding: 5px 10px; vertical-align: middle; }
  .cap-num { color: #ffffff; font-size: 9px; font-weight: bold; white-space: nowrap; width: 1%; }
  .cap-divider { background-color: #3b60d4; width: 1px; padding: 0; }
  .cap-text { color: #ffffff; font-size: 10px; padding-left: 10px; }

  .no-photos { text-align: center; color: #94a3b8; padding: 30px 0; font-size: 12px; }


.photo-page {
    page-break-after: always;
}

.photo-item {
    height: 95mm;         
    margin-bottom: 10mm;   
    text-align: center;
}

.photo-box {
    height: 90mm;
}

.photo-box img {
    max-width: 92%;
    max-height: 90mm;
    object-fit: contain;
}

.photo-caption {
    margin-top: 3mm;       
    font-size: 14px;
    text-align: center;
    line-height: 1.2;
}

.photo-page {
    page-break-after: always;
}

.next-photo-page {
    padding-top: 35mm;
}
</style>
</head>
<body>
@php
$isEn = isset($isEn) ? (bool)$isEn : (bool)($order->document_in_english ?? false);
  $L = $isEn ? [
    'title'       => 'Photo Documentation',
    'sub'         => 'This photo documentation contains',
    'photo'       => 'photo',
    'photos'      => 'photos',
    'client'      => 'Client',
    'vehicle'     => 'Vehicle',
    'report_no'   => 'Report No.',
    'date'        => 'Date',
    'req_count'   => 'Required Photos',
    'dmg_count'   => 'Damage Photos',
    'sect_req'    => 'Required Photos',
    'sect_dmg'    => 'Damage Photos',
    'sect_other'  => 'Other Photos',
    'photo_label' => 'Photo',
    'created'     => 'Created',
    'report_nr'   => 'Report-Nr.',
    'copyright'   => 'Carspector',
    'page'        => 'Page',
    'of'          => 'of',
    'damage_label' => 'Damage',
    'attachment_title' => 'Photo Documentation',
    'order_number' => 'Order number',
  ] : [
    'title'       => 'Fotodokumentation',
    'sub'         => 'Die Fotodokumentation enthält',
    'photo'       => 'Foto',
    'photos'      => 'Fotos',
    'client'      => 'Auftraggeber',
    'vehicle'     => 'Fahrzeug',
    'report_no'   => 'Bericht-Nr.',
    'date'        => 'Datum',
    'req_count'   => 'Pflichtfotos',
    'dmg_count'   => 'Schadenfotos',
    'sect_req'    => 'Pflichtfotos',
    'sect_dmg'    => 'Schadenfotos',
    'sect_other'  => 'Weitere Fotos',
    'photo_label' => 'Bild',
    'created'     => 'Erstellt',
    'report_nr'   => 'Bericht-Nr.',
    'copyright'   => 'Carspector',
    'page'        => 'Seite',
    'of'          => 'von',
    'damage_label' => 'Schaden',
    'attachment_title' => 'Lichtbildanlage',
    'order_number' => 'Auftragsnummer',
  ];
@endphp

<!-- <header>
  <table class="hf-table">
    <tr>
      <td style="width:50%; text-align:left; vertical-align:middle;">
        <img src="{{ $logoPath }}" alt="Carspector Logo" style="height:37px; display:block;">
      </td>
      <td style="width:50%; text-align:right; vertical-align:middle; font-size:10px; color:#475569; line-height:1.6;">
        <div><strong style="color:#1e40af;">{{ $L['report_nr'] }}</strong> {{ $reportNo }}</div>
        <div>{{ $L['created'] }}: {{ $reportDt }}</div>
      </td>
    </tr>
  </table>
</header>

<footer>
  <table class="hf-table">
    <tr>
      <td style="width:60%;">
        © {{ date('Y') }} – {{ $L['copyright'] }}
      </td>
      <td style="width:40%; text-align:right;">
        {{ $L['page'] }} <span class="page-num"></span>
        {{ $L['of'] }} <span class="page-total"></span>
      </td>
    </tr>
  </table>
</footer> -->

<main>

<div style="
    text-align:center;
    margin-top:70px;
    margin-bottom:60px;
">
    <div style="
        font-size:28px;
        font-weight:bold;
        margin-bottom:10px;
    ">
        {{ $L['attachment_title'] }}
    </div>

    <div style="
        font-size:14px;
        color:#64748b;
        line-height:1.8;
    ">
        {{ $vehicleLabel }}
        &nbsp;&nbsp;•&nbsp;&nbsp;
        {{ $L['order_number'] }}: {{ $order->orderno ?? '#' . $order->id }}
        &nbsp;&nbsp;•&nbsp;&nbsp;
        {{ $totalCount }} {{ $totalCount !== 1 ? $L['photos'] : $L['photo'] }}
    </div>
</div>

@php
$allPhotos = collect()
    ->merge($pflichtChunks->flatten(1))
    ->merge($damageChunks->flatten(1))
    ->merge($generalChunks->flatten(1))
    ->values();

$photoPairs = $allPhotos->chunk(2);
@endphp

@foreach($photoPairs as $pair)
  <div class="photo-page {{ $loop->first ? 'first-photo-page' : 'next-photo-page' }}"
     style="{{ $loop->last ? 'page-break-after: auto;' : '' }}">

    @foreach($pair as $photo)
      <div class="photo-item">
        <div class="photo-box">
          @if(!empty($photo['path']) && file_exists($photo['path']))
            <img src="{{ $photo['path'] }}" alt="">
          @endif
        </div>

       <div class="photo-caption"> {{ $L['photo_label'] }} {{ $photo['num'] }} 
        @if(!empty($photo['caption'])): {{ $photo['caption'] }} 
        @endif 
      </div>
      </div>
    @endforeach

  </div>
@endforeach

@if($pflichtChunks->isEmpty() && $damageChunks->isEmpty() && $generalChunks->isEmpty())
  <div class="no-photos">{{ $isEn ? 'No photos available.' : 'Keine Fotos vorhanden.' }}</div>
@endif

</main>
</body>
</html>
