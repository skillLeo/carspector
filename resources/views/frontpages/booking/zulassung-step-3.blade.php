@extends('mainpages.master-layout')
@section('title', 'Carspector | Zulassung Schritt 3')

@section('styles')
    @include('frontpages.booking.partials.zulassung-styles')
@endsection

@section('header')
    @include('frontpages.booking.partials.zulassung-header', [
        'currentStep' => 3,
        'steps' => ['Halter', 'Kennzeichen', 'Zahlung']
    ])
@endsection

<style>

.booking-steps {
  background: #f9fafb;
  border: 1px solid #e5e7eb;
  border-radius: 10px;
  padding: 20px;
}

.steps-title {
  font-size: 18px;
  font-weight: 600;
  letter-spacing: -0.25px;
}

.step {
  display: flex;
  align-items: center;
  padding: 12px 0;
  border-bottom: 1px solid #ececec;
}

.step:last-child {
  border-bottom: none;
}

.step-number {
  min-width: 32px;
  min-height: 32px;
  width: 32px;
  height: 32px;
  border-radius: 50%;
  background: #d0d7e1;
  color: #333;
  display: flex;
  justify-content: center;
  align-items: center;
  font-weight: 600;
  margin-right: 12px;
  font-size: 15px;
  flex-shrink: 0; /* Verhindert Zusammendrücken auf kleinen Screens */
}


.current-step .step-number {
  background: #0d6efd;
  color: #fff;
}

.step-content strong {
  font-size: 15px;
  font-weight: 600;
}

@media (max-width: 991px) {

  .order-summary{
    order: -1;
  }

  .order-form{
    order: 2;
  }

}
</style>

@section('content')
<div class="container py-4 py-md-5">
    <div class="booking-grid">
        <section class="order-form">
            <form id="zulassungStep3Form" action="{{ route('zulassung.step3.store') }}" method="POST" class="panel">
                @csrf
                <div class="panel-header">
                    <div>
                        <h3 class="mb-0">IBAN &amp; Vollmachten</h3>
                    </div>

                </div>
                <div class="panel-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <p class="mb-1 fw-semibold">Bitte prüfe deine Angaben:</p>
                            <ul class="mb-0 ps-3">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-4">
                        <label class="form-label">IBAN für Kfz-Steuer-Einzug *</label>
                        <input type="text" name="iban" class="form-control" value="{{ old('iban', $data['iban'] ?? '') }}" required>
                        <p class="note-muted mt-2">Wir benötigen deine IBAN für die Kfz-Steuer. Die Belastung erfolgt erst nach erfolgreicher Zulassung.</p>
                        <x-form-error field="iban" />
                    </div>

                    @php
                        $taxSignature = old('tax_signature');
                        if(!$taxSignature && !empty($data['tax_signature'])) {
                            $taxSignature = 'data:image/png;base64,' . $data['tax_signature'];
                        }
                        $poaSignature = old('poa_signature');
                        if(!$poaSignature && !empty($data['poa_signature'])) {
                            $poaSignature = 'data:image/png;base64,' . $data['poa_signature'];
                        }
                    @endphp

                    <div class="mt-4">
                        <label class="form-label">Unterschrift Steuer (SEPA) *</label>
                        <p class="note-muted mb-2">Mit dieser Signatur erlaubst du dem Finanzamt den Einzug der Kfz-Steuer.</p>
                        <div class="signature-pad">
                            <div id="taxSignaturePad" class="signature-surface"></div>
                        </div>
                        <div class="signature-actions">
                            <button class="btn-signature-clear" id="taxSignatureClear">Zurücksetzen</button>
                            <!-- <span class="note-muted">Pflicht für die Zulassung.</span> -->
                        </div>
                        <input type="hidden" name="tax_signature" id="taxSignatureInput" value="{{ $taxSignature }}">
                        <x-form-error field="tax_signature" />
                    </div>

                    <div style="padding-top: 40px !important" class="pb-3">
                        <label class="form-label">Unterschrift Vollmacht *</label>
                        <p class="note-muted mb-2">Hiermit bevollmächtigst du den Zulassungsdienst, dich bei der Zulassungsstelle zu vertreten.</p>
                        <div class="signature-pad">
                            <div id="poaSignaturePad" class="signature-surface"></div>
                        </div>
                        <div class="signature-actions">
                            <button class="btn-signature-clear" id="poaSignatureClear">Zurücksetzen</button>
                            <!-- <span class="note-muted">Pflicht für die Zulassung.</span> -->
                        </div>
                        <input type="hidden" name="poa_signature" id="poaSignatureInput" value="{{ $poaSignature }}">
                        <x-form-error field="poa_signature" />
                    </div>

                    <div class="d-flex flex-wrap justify-content-between gap-3 mt-3">
                        <!-- <a href="{{ route('zulassung.step2.show') }}" class="btn btn-back">Zurück</a> -->
                        <button type="submit" class="btn btn-secondary btn-next">Zulassung jetzt beauftragen</button>
                    </div>
      
                    <div class="d-flex justify-content-center align-items-center gap-2 my-3">
                        <i class="fa-solid fa-shield-check" style="font-size: 18px; color: var(--primary)"></i>
                        <p style="font-size: 16px" class="mb-0">Sichere Zahlung via Stripe</p>
                    </div>

                     <div class="booking-steps mt-4">
                
                <h4 class="steps-title mb-3">So geht es nach deiner Buchung weiter:</h4>

                <div class="step current-step">
                    <div class="step-number">1</div>
                    <div class="step-content">
                    <strong>Online-Buchung (aktueller Schritt)</strong>
                    </div>
                </div>

                <div class="step">
                    <div class="step-number">2</div>
                    <div class="step-content">
                    <strong>Zusendung der Fahrzeugdokumente an unseren Zulassungsdienst</strong>
                    </div>
                </div>

                <div class="step">
                    <div class="step-number">3</div>
                    <div class="step-content">
                    <strong>Zulassung des Fahrzeugs bei der zuständigen Zulassungsstelle</strong>
                    </div>
                </div>

                <div class="step">
                    <div class="step-number">4</div>
                    <div class="step-content">
                        <strong>Versand der Kennzeichen und Unterlagen an den Halter</strong>
                    </div>
                </div>

                </div>
                </div>
     

            </form>
            
        </section>

        <aside class="order-summary">
            <!-- <div class="mobile-summary-trigger">
                <button class="collapse-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#summaryCollapse" aria-expanded="true">
                    Übersicht
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
            </div> -->
            @php
                $isDesired = ($data['license_plate_type'] ?? null) === 'desired';
                $options = [];
                if(!empty($data['needs_emission_sticker'])) $options[] = 'Feinstaub-Plakette';
                if(!empty($data['five_day_registration'])) $options[] = '5-Tages-Zulassung inkl. Versicherung';
            @endphp
            <div class="collapse d-lg-block show" id="summaryCollapse">
                <div class="panel summary">
                    <div class="panel-header">
                        <h3 class="mb-0">Deine Buchung</h3>
                                         <span class="badge-inline">3/3</span>
                    </div>
                    <div class="panel-body">
                        <div class="summary-section mb-4">
                            <p class="summary-title">Halter</p>
                            <div class="summary-block">
                                <div class="summary-name">{{ ($data['customer_first_name'] ?? '') }} {{ ($data['customer_last_name'] ?? '') }}</div>
                                <div class="summary-address">{{ ($data['customer_street'] ?? '') }} {{ ($data['customer_house_number'] ?? '') }}<br>{{ ($data['customer_postal_code'] ?? '') }} {{ ($data['customer_city'] ?? '') }}</div>
                                @if(!empty($data['customer_email']))
                                    <div class="summary-email">{{ $data['customer_email'] }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="summary-section mb-4">
                            <p class="summary-title">Kennzeichen</p>
                            <div class="summary-block">
                                <div class="summary-pair"><span>Art</span><strong>{{ $isDesired ? 'Wunschkennzeichen' : 'StVA-Zuteilung' }}</strong></div>
                                @if($isDesired)
                                    <div class="summary-pair"><span>Reserviert als</span><strong>{{ $data['desired_license_plate'] ?? '–' }}</strong></div>
                                @endif
                                @if(!empty($data['seasonal_plate']))
                                    <div class="summary-pair"><span>Saison</span><strong>{{ $data['season_from_month'] ?? '-' }} – {{ $data['season_to_month'] ?? '-' }}</strong></div>
                                @endif
                                @if(!empty($data['special_plate']))
                                    <div class="summary-pair"><span>Spezial</span><strong>{{ $data['special_plate'] }}</strong></div>
                                @endif
                                <div class="summary-pair"><span>eVB</span><strong>{{ $data['evb_number'] ?? '–' }}</strong></div>
                                @if(!empty($options))
                                    <div class="summary-pair"><span>Extras</span><strong>{{ implode(', ', $options) }}</strong></div>
                                @endif
                            </div>
                        </div>

                        <div class="summary-section">
                            <p class="summary-title">Preisübersicht</p>

                            <div class="price-list">
                                @foreach($summary['items'] as $item)
                                    <div class="price-row">
                                        <div>
                                            <span class="price-label">{{ $item['label'] }}</span>
                                        </div>
                                        <strong>{{ number_format($item['amount'], 2, ',', '.') }}&nbsp;€</strong>
                                    </div>
                                @endforeach

                                <div class="price-row">
                                    <div>
                                        <span class="price-label">2x Kennzeichen</span>
                                    </div>
                                    <strong>gratis</strong>
                                </div>
                            </div>
                        </div>
                                <div class="text-muted small mt-3">
                                    Der Zulassungsservice beinhaltet bereits amtliche Gebühren und den Versand.
                                </div>
                            <div class="pt-1"></div>
                            <div class="summary-total-pill">
                                <div>
                                    <span>Gesamtbetrag</span>
                                    <strong>{{ number_format($summary['total'], 2, ',', '.') }}&nbsp;€</strong>
                                </div>
                                <small>inkl. MwSt.</small>
                            </div>
                            <!-- <div class="text-muted small mt-2">
                                Gesamtpreis inkl. MwSt., Versand und amtlicher Gebühren der Zulassungsstelle.
                            </div> -->
                        </div>

                         <!-- <div class="d-flex flex-wrap justify-content-between gap-3 mt-3 d-lg-none">
                            <button type="submit" form="zulassungStep3Form" class="btn btn-secondary btn-next w-100">
                                Jetzt beauftragen
                            </button>
                        </div> -->
                        </div>
                </div>
            </div>
        </aside>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('vendor/jq-signature.min.js') }}"></script>
    <script>
        jQuery(function ($) {
            const setupSignature = (surfaceSelector, inputSelector, clearSelector) => {
                const $surface = $(surfaceSelector);
                const $input = $(inputSelector);
                if (!$surface.length || !$input.length) {
                    return;
                }

                $surface.jqSignature({ lineColor: '#111827', background: '#ffffff', lineWidth: 2, width: '100%', height: 220 });

                if ($input.val()) {
                    try { $surface.jqSignature('importData', $input.val()); } catch (e) {}
                }

                const sync = () => {
                    const dataUrl = $surface.jqSignature('getDataURL');
                    $input.val(dataUrl);
                };

                $surface.on('jq.signature.changed', sync);
                $surface.on('mouseup touchend', () => setTimeout(sync, 50));
                $(clearSelector).on('click', function (event) {
                    event.preventDefault();
                    $surface.jqSignature('clearCanvas');
                    $input.val('');
                });
            };

            setupSignature('#taxSignaturePad', '#taxSignatureInput', '#taxSignatureClear');
            setupSignature('#poaSignaturePad', '#poaSignatureInput', '#poaSignatureClear');
        });
    </script>
@endsection
