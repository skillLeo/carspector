@php
    $steps = $steps ?? ['Fahrzeug', 'Check', 'Buchung'];
    $current = $currentStep ?? 1;
@endphp
<header class="header bg-primary header-step position-relative z-3">
  <div class="container">
    <div class="header-wrapper d-flex flex-wrap align-items-center justify-content-center justify-content-md-between mx-auto position-relative">
      <div class="header-logo">
        <a href="{{ url('/') }}" class="logo d-inline-flex align-items-center gap-3"><img
                    src="logo-slogan-white.png" alt=""></a>
      </div>
      <div class="step-navigation">
        @foreach($steps as $index => $label)
            @php
                $position = $index + 1;
                $classes = $position === $current ? 'current' : ($position < $current ? 'checked' : '');
            @endphp
            <button type="button" class="{{ $classes }}">
              <span class="ind"></span><span class="text">{{ $label }}</span>
            </button>
        @endforeach
      </div>

      <div class="milestones d-flex flex-column align-items-center text-center">
        <i class="fas fa-award text-secondary milestone-icon"></i>
        <span class="text-white milestone-text">Top-Anbieter 2025</span>
      </div>

    </div>
  </div>
</header>

