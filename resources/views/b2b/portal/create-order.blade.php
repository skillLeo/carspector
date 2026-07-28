@extends('layouts.b2b')
@section('title', 'New Order')

@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6"><h1 class="m-0">Place New Order</h1></div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('b2b.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">New Order</li>
        </ol>
    </div>
</div>
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">

        @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <ul class="mb-0 ps-3">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <form action="{{ route('b2b.orders.store') }}" method="POST" novalidate>
            @csrf

            {{-- Section 1: Vehicle Information --}}
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-car me-2 text-primary"></i> Vehicle Information</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="vehicle_make_model">
                            Make &amp; Model <span class="text-danger">*</span>
                        </label>
                        <input type="text" id="vehicle_make_model" name="vehicle_make_model"
                               class="form-control @error('vehicle_make_model') is-invalid @enderror"
                               value="{{ old('vehicle_make_model') }}"
                               placeholder="e.g. BMW 320i, Mercedes C200, Audi A4" required>
                        @error('vehicle_make_model')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold" for="make_year">
                                First Registration <span class="text-danger">*</span> <span class="text-muted fw-normal">(MM.YYYY)</span>
                            </label>
                            <input required type="text" id="make_year" name="make_year"
                                   class="form-control @error('make_year') is-invalid @enderror"
                                   value="{{ old('make_year') }}"
                                   placeholder="e.g. 03.2021">
                            @error('make_year')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold" for="mileage">
                                Mileage <span class="text-danger">*</span> <span class="text-muted fw-normal">(km)</span>
                            </label>
                            <input required type="text" id="mileage" name="mileage"
                                   class="form-control @error('mileage') is-invalid @enderror"
                                   value="{{ old('mileage') }}"
                                   placeholder="e.g. 85000">
                            @error('mileage')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold" for="vin_number">
                                VIN / Chassis Number <span class="text-muted fw-normal">(optional)</span>
                            </label>
                            <input type="text" id="vin_number" name="vin_number"
                                   class="form-control @error('vin_number') is-invalid @enderror"
                                   value="{{ old('vin_number') }}"
                                   placeholder="17-character VIN">
                            @error('vin_number')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold" for="listing_link">
                                Listing Link <span class="text-muted fw-normal">(optional)</span>
                            </label>
                            <input type="url" id="listing_link" name="listing_link"
                                   class="form-control @error('listing_link') is-invalid @enderror"
                                   value="{{ old('listing_link') }}"
                                   placeholder="https://...">
                            @error('listing_link')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- Section 2: Location & Contact --}}
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-map-marker-alt me-2 text-danger"></i> Location &amp; Contact</h5>
                </div>
                <div class="card-body">
                        <div class="mb-3">
                        <label class="form-label fw-semibold" for="vehicle_country">
                            Country <span class="text-danger">*</span>
                        </label>
                        <select id="vehicle_country" name="vehicle_country"
                                class="form-select @error('vehicle_country') is-invalid @enderror" required>
                            <option value="">— Select country —</option>
                            @php
                                $countries = ['Germany','Netherlands'];
                            @endphp
                            @foreach($countries as $c)
                            <option value="{{ $c }}" {{ old('vehicle_country') === $c ? 'selected' : '' }}>{{ $c }}</option>
                            @endforeach
                        </select>
                        @error('vehicle_country')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="vehicle_location">
                            Vehicle Location (Full Address) <span class="text-danger">*</span>
                        </label>
                        <textarea id="vehicle_location" name="vehicle_location" rows="2"
                                  class="form-control @error('vehicle_location') is-invalid @enderror"
                                  placeholder="Street, house number, postal code, city" required>{{ old('vehicle_location') }}</textarea>
                        @error('vehicle_location')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
 
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold" for="contact_person">
                                Contact Person at Location <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="contact_person" name="contact_person"
                                   class="form-control @error('contact_person') is-invalid @enderror"
                                   value="{{ old('contact_person') }}"
                                   placeholder="Full name" required>
                            @error('contact_person')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold" for="contact_phone">
                                Contact Phone <span class="text-danger">*</span>
                            </label>
                            <input type="tel" id="contact_phone" name="contact_phone"
                                   class="form-control @error('contact_phone') is-invalid @enderror"
                                   value="{{ old('contact_phone') }}"
                                   placeholder="+49 ..." required>
                            @error('contact_phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- Section 3: Service Selection --}}
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-clipboard-check me-2 text-success"></i> Service Selection</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="inspection_type">
                            Inspection Type <span class="text-danger">*</span>
                        </label>
                        <select id="inspection_type" name="inspection_type"
                                class="form-select @error('inspection_type') is-invalid @enderror" required>
                            <option value="">— Select inspection type —</option>
                            <option value="Check XL"  {{ old('inspection_type') === 'Check XL'  ? 'selected' : '' }}>Check XL</option>
                            <option value="Check XXL" {{ old('inspection_type') === 'Check XXL' ? 'selected' : '' }}>Check XXL</option>
                        </select>
                        @error('inspection_type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- SoH Check — only visible when country = Germany --}}
                    <div class="mb-3" id="soh_check_wrapper" style="display:none;">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="soh_check" value="1"
                                   id="soh_check" {{ old('soh_check') ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="soh_check">
                                SoH Check required
                                <!-- <span class="text-muted fw-normal" style="font-size:.85rem;">
                                    (State of Health battery check — Germany only)
                                </span> -->
                            </label>
                        </div>
                    </div>

                    {{-- Documents in English — auto-selected --}}
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="documents_in_english" value="1"
                                   id="documents_in_english" checked>
                            <label class="form-check-label fw-semibold" for="documents_in_english">
                                Documents in English
                                <!-- <span class="text-muted fw-normal" style="font-size:.85rem;">
                                    (Emails and PDF report will be in English)
                                </span> -->
                            </label>
                        </div>
                    </div>

                    <!-- <div class="mb-3">
                        <label class="form-label fw-semibold" for="special_notes">
                            Special Notes / Instructions <span class="text-muted fw-normal">(optional)</span>
                        </label>
                        <textarea id="special_notes" name="special_notes" rows="3"
                                  class="form-control @error('special_notes') is-invalid @enderror"
                                  placeholder="Any special requirements, access instructions, or notes for the inspector..."
                                  maxlength="1000">{{ old('special_notes') }}</textarea>
                        @error('special_notes')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <div class="form-text" id="notes-counter">0 / 1000</div>
                    </div> -->
                </div>
            </div>

            <!-- {{-- Non-Germany notice --}}
            <div id="non_germany_notice" class="alert alert-info d-flex align-items-start gap-2" style="display:none !important;">
                <i class="fas fa-info-circle mt-1"></i>
                <span>For vehicles outside Germany, our team will handle inspector assignment manually. You will be contacted to confirm next steps.</span>
            </div>

            <div class="alert alert-light border d-flex align-items-start gap-2">
                <i class="fas fa-paper-plane mt-1 text-primary"></i>
                <span>After submitting, our inspection team will be notified automatically. You can track the order status in your portal.</span>
            </div> -->

            <div class="d-flex justify-content-between">
                <a href="{{ route('b2b.dashboard') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Cancel
                </a>
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="fas fa-paper-plane me-2"></i> Place Inspection Order
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('js')
<script>
const countrySelect  = document.getElementById('vehicle_country');
const sohWrapper     = document.getElementById('soh_check_wrapper');
const sohCheck       = document.getElementById('soh_check');
const nonGermanyNote = document.getElementById('non_germany_notice');

function updateCountryUI() {
    const isGermany = countrySelect.value === 'Germany';
    sohWrapper.style.display     = isGermany ? '' : 'none';
    nonGermanyNote.style.display = (!countrySelect.value || isGermany) ? 'none' : '';
    if (!isGermany) sohCheck.checked = false;
}

countrySelect.addEventListener('change', updateCountryUI);
updateCountryUI();

// Notes counter
const textarea = document.getElementById('special_notes');
const counter  = document.getElementById('notes-counter');
if (textarea && counter) {
    textarea.addEventListener('input', () => { counter.textContent = textarea.value.length + ' / 1000'; });
    counter.textContent = textarea.value.length + ' / 1000';
}
</script>
@endsection
