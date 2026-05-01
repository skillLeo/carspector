<?php

namespace App\Http\Controllers;

use App\Mail\NewBookingConfirmationMail;
use App\Models\NewBooking;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Stripe\Checkout\Session as StripeCheckoutSession;
use Stripe\Price as StripePrice;
use Stripe\Product as StripeProduct;
use Stripe\Stripe;
use Stripe\StripeClient;

class NewbookingController extends Controller
{
    private const WIZARD_SESSION_KEY = 'new_booking_wizard';

    public function create(): RedirectResponse
    {
        return redirect()->route('zulassung.step1.show');
    }

    public function store(): RedirectResponse
    {
        return redirect()->route('zulassung.step1.show');
    }

    public function stepOne()
    {
        return view('frontpages.booking.zulassung-step-1', [
            'data' => $this->wizardData(),
        ]);
    }

    public function stepOneStore(Request $request): RedirectResponse
    {
        $validated = $this->validateStepOne($request);

        $hasDelivery = $request->boolean('has_delivery_address');

        $payload = [
            'customer_first_name' => $validated['customer_first_name'],
            'customer_last_name' => $validated['customer_last_name'],
            'customer_email' => $validated['customer_email'],
            'customer_street' => $validated['customer_street'],
            'customer_house_number' => $validated['customer_house_number'],
            'customer_postal_code' => $validated['customer_postal_code'],
            'customer_city' => $validated['customer_city'],
            'has_delivery_address' => $hasDelivery,
            'delivery_first_name' => $validated['delivery_first_name'] ?? null,
            'delivery_last_name' => $validated['delivery_last_name'] ?? null,
            'delivery_street' => $validated['delivery_street'] ?? null,
            'delivery_house_number' => $validated['delivery_house_number'] ?? null,
            'delivery_postal_code' => $validated['delivery_postal_code'] ?? null,
            'delivery_city' => $validated['delivery_city'] ?? null,
        ];

        if (!$hasDelivery) {
            $payload['delivery_first_name'] = null;
            $payload['delivery_last_name'] = null;
            $payload['delivery_street'] = null;
            $payload['delivery_house_number'] = null;
            $payload['delivery_postal_code'] = null;
            $payload['delivery_city'] = null;
        }

        $this->persistWizardData($payload);

        return redirect()->route('zulassung.step2.show');
    }

    public function stepTwo()
    {
        if (!$this->hasStepOneData()) {
            return redirect()->route('zulassung.step1.show');
        }

        return view('frontpages.booking.zulassung-step-2', [
            'data' => $this->wizardData(),
            'months' => $this->monthOptions(),
            'specialPlateOptions' => $this->specialPlateOptions(),
        ]);
    }

    public function stepTwoStore(Request $request): RedirectResponse
    {
        if (!$this->hasStepOneData()) {
            return redirect()->route('zulassung.step1.show');
        }

        $validated = $this->validateStepTwo($request);

        $seasonal = $request->boolean('seasonal_plate');
        $needsSticker = $request->boolean('needs_emission_sticker');
        $fiveDay = $request->boolean('five_day_registration');

        $payload = [
            'license_plate_type' => $validated['license_plate_type'],
            'desired_license_plate' => $validated['desired_license_plate'] ?? null,
            'reservation_pin' => $validated['reservation_pin'] ?? null,
            'seasonal_plate' => $seasonal,
            'season_from_month' => $validated['season_from_month'] ?? null,
            'season_to_month' => $validated['season_to_month'] ?? null,
            'special_plate' => $validated['special_plate'] ?? null,
            'needs_emission_sticker' => $needsSticker,
            'five_day_registration' => $fiveDay,
            'evb_number' => strtoupper(str_replace(' ', '', $validated['evb_number'])),
        ];

        if (!$seasonal) {
            $payload['season_from_month'] = null;
            $payload['season_to_month'] = null;
        }

        $this->persistWizardData($payload);

        return redirect()->route('zulassung.step3.show');
    }

    public function stepThree()
    {
        if (!$this->hasStepTwoData()) {
            return redirect()->route('zulassung.step1.show');
        }

        $data = $this->wizardData();

        return view('frontpages.booking.zulassung-step-3', [
            'data' => $data,
            'summary' => $this->calculatePricing($data),
        ]);
    }

    public function stepThreeStore(Request $request)
    {
        if (!$this->hasStepTwoData()) {
            return redirect()->route('zulassung.step1.show');
        }

        $validated = $this->validateStepThree($request);

        $payload = [
            'iban' => strtoupper(str_replace(' ', '', $validated['iban'])),
            'tax_signature' => $this->normalizeSignature($validated['tax_signature']),
            'poa_signature' => $this->normalizeSignature($validated['poa_signature']),
        ];

        $this->persistWizardData($payload);

        $allData = $this->wizardData();
        $checkoutSession = $this->finalizeBooking($allData);

        return redirect($checkoutSession->url);
    }

    public function success(Request $request)
    {
        $sessionId = $request->query('session_id');
        $booking = null;
        $months = $this->monthOptions();
        $fallbackBookingId = Session::pull('new_booking_id');
        $shouldSendConfirmation = false;

        if ($sessionId) {
            $booking = NewBooking::where('checkout_session_id', $sessionId)->first();

            if ($booking) {
                $stripe = new StripeClient(stripe_secrete());
                $session = $stripe->checkout->sessions->retrieve($sessionId);
                if (($session->payment_status ?? null) === 'paid') {
                    $alreadyPaid = $booking->checkout_status === 'paid';
                    $booking->checkout_status = 'paid';
                    if (isset($session->amount_total)) {
                        $booking->amount_eur = $session->amount_total / 100;
                    }
                    $booking->status = 'completed';
                    $booking->save();

                    if (!$alreadyPaid && $booking->customer_email) {
                        $shouldSendConfirmation = true;
                    }
                }
            }
        }

        if (!$booking && $fallbackBookingId) {
            $booking = NewBooking::find($fallbackBookingId);
        }

        if ($shouldSendConfirmation && $booking && $booking->customer_email) {
            Mail::to($booking->customer_email)->send(new NewBookingConfirmationMail($booking, $months));
        }

        return view('frontpages.booking.new-success', [
            'order' => $booking,
            'monthLabels' => $months,
        ]);
    }

    public function cancel(): RedirectResponse
    {
        return redirect()->route('zulassung.step1.show')->with('status', 'Die Stripe-Zahlung wurde abgebrochen.');
    }

    private function createStripeCheckout(float $amount, ?string $customerEmail = null): StripeCheckoutSession
    {
        Stripe::setApiKey(stripe_secrete());

        $lineItem = $this->buildLineItem($amount);

        $payload = [
            'line_items' => [$lineItem],
            'mode' => 'payment',
            'payment_method_types' => ['card', 'paypal', 'klarna', 'giropay'],
            'success_url' => route('new-booking.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('new-booking.cancel'),
        ];

        if ($customerEmail) {
            $payload['customer_email'] = $customerEmail;
        }

        return StripeCheckoutSession::create($payload);
    }

    private function buildLineItem(float $amount): array
    {
        $lineItem = [
            'quantity' => 1,
        ];

        $taxRateId = config('services.new_booking.tax_rate_id');
        if ($taxRateId) {
            $lineItem['tax_rates'] = [$taxRateId];
        }

        $priceId = config('services.new_booking.price_id');
        $configuredAmount = (float) (config('services.new_booking.amount_eur') ?? 0);

        if ($priceId && abs($amount - $configuredAmount) < 0.01) {
            $lineItem['price'] = $priceId;
            return $lineItem;
        }

        $product = StripeProduct::create([
            'name' => config('services.new_booking.product_name', 'Kfz-Zulassungsdienst'),
            'description' => config('services.new_booking.description', 'Wir übernehmen die komplette Kfz-Zulassung für dich und senden dir nach erfolgreicher Anmeldung die Kennzeichen sowie alle zugehörigen Unterlagen bequem nach Hause.'),
        ]);

        $price = StripePrice::create([
            'product' => $product->id,
            'unit_amount' => (int) round($amount * 100),
            'currency' => 'EUR',
        ]);

        $lineItem['price'] = $price->id;
        return $lineItem;
    }

    private function monthOptions(): array
    {
        return [
            '01' => 'Januar',
            '02' => 'Februar',
            '03' => 'März',
            '04' => 'April',
            '05' => 'Mai',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'August',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Dezember',
        ];
    }

    private function specialPlateOptions(): array
    {
        return [
            'H-Kennzeichen (Oldtimer)',
            'E-Kennzeichen (Elektro)',
            // 'Grünes Kennzeichen',
            // 'Kurzzeitkennzeichen (05)',
            // 'Rotes 07er-Kennzeichen',
            // 'Diplomatenkennzeichen',
        ];
    }

    private function validateStepOne(Request $request): array
    {
        return $request->validate([
            'customer_first_name' => ['required', 'string', 'max:255'],
            'customer_last_name' => ['required', 'string', 'max:255'],
            'customer_email' => ['required', 'string', 'email', 'max:255'],
            'customer_street' => ['required', 'string', 'max:255'],
            'customer_house_number' => ['required', 'string', 'max:50'],
            'customer_postal_code' => ['required', 'string', 'max:30'],
            'customer_city' => ['required', 'string', 'max:255'],
            'has_delivery_address' => ['nullable', 'boolean'],
            'delivery_first_name' => ['required_if:has_delivery_address,1', 'nullable', 'string', 'max:255'],
            'delivery_last_name' => ['required_if:has_delivery_address,1', 'nullable', 'string', 'max:255'],
            'delivery_street' => ['required_if:has_delivery_address,1', 'nullable', 'string', 'max:255'],
            'delivery_house_number' => ['required_if:has_delivery_address,1', 'nullable', 'string', 'max:50'],
            'delivery_postal_code' => ['required_if:has_delivery_address,1', 'nullable', 'string', 'max:30'],
            'delivery_city' => ['required_if:has_delivery_address,1', 'nullable', 'string', 'max:255'],
        ]);
    }

    private function validateStepTwo(Request $request): array
    {
        $months = array_keys($this->monthOptions());

        return $request->validate([
            'license_plate_type' => ['required', Rule::in(['desired', 'stva_assigned'])],
            'desired_license_plate' => ['required_if:license_plate_type,desired', 'nullable', 'string', 'max:30'],
            'reservation_pin' => ['required_if:license_plate_type,desired', 'nullable', 'string', 'max:50'],
            'seasonal_plate' => ['nullable', 'boolean'],
            'season_from_month' => [Rule::requiredIf(fn () => $request->boolean('seasonal_plate')), 'nullable', Rule::in($months)],
            'season_to_month' => [Rule::requiredIf(fn () => $request->boolean('seasonal_plate')), 'nullable', Rule::in($months)],
            'special_plate' => ['nullable', 'string', 'max:255'],
            'needs_emission_sticker' => ['nullable', 'boolean'],
            'five_day_registration' => ['nullable', 'boolean'],
            'evb_number' => ['required', 'string', 'max:50'],
        ]);
    }

    private function validateStepThree(Request $request): array
    {
        return $request->validate([
            'iban' => ['required', 'string', 'max:34', 'regex:/^[A-Za-z]{2}[0-9A-Za-z]{10,30}$/'],
            'tax_signature' => ['required', 'string', 'max:2000000', 'regex:/^data:image\/png;base64,/i'],
            'poa_signature' => ['required', 'string', 'max:2000000', 'regex:/^data:image\/png;base64,/i'],
        ], [
            'iban.regex' => 'Bitte gib eine gültige IBAN an.',
        ]);
    }

    private function wizardData(): array
    {
        return Session::get(self::WIZARD_SESSION_KEY, []);
    }

    private function persistWizardData(array $payload): void
    {
        Session::put(self::WIZARD_SESSION_KEY, array_merge($this->wizardData(), $payload));
    }

    private function clearWizardData(): void
    {
        Session::forget(self::WIZARD_SESSION_KEY);
    }

    private function hasStepOneData(): bool
    {
        $data = $this->wizardData();
        return isset($data['customer_first_name'], $data['customer_last_name'], $data['customer_email']);
    }

    private function hasStepTwoData(): bool
    {
        $data = $this->wizardData();
        return $this->hasStepOneData() && isset($data['license_plate_type'], $data['evb_number']);
    }

    private function normalizeSignature(?string $value): ?string
    {
        if (!$value) {
            return null;
        }

        $value = trim($value);
        $prefix = 'data:image/png;base64,';
        if (Str::startsWith($value, $prefix)) {
            $value = substr($value, strlen($prefix));
        }

        return $value ?: null;
    }

    private function calculatePricing(array $data): array
    {
        $items = [
            [
                'label' => 'Zulassungsservice',
                'amount' => 159.0,
            ],
        ];

        if (($data['license_plate_type'] ?? null) === 'desired') {
            $items[] = [
                'label' => 'Wunschkennzeichen',
                'amount' => 10.0,
            ];
        }

        if (!empty($data['five_day_registration'])) {
            $items[] = [
                'label' => '5-Tages-Zulassung inkl. Versicherung',
                'amount' => 100.0,
            ];
        }

        if (!empty($data['needs_emission_sticker'])) {
            $items[] = [
                'label' => 'Feinstaub-Plakette',
                'amount' => 5.0,
            ];
        }

        $total = 0.0;
        foreach ($items as $item) {
            $total += $item['amount'];
        }

        return [
            'items' => $items,
            'total' => $total,
        ];
    }

    private function finalizeBooking(array $data): StripeCheckoutSession
    {
        $pricing = $this->calculatePricing($data);

        $booking = NewBooking::create([
            'first_name' => $data['customer_first_name'],
            'last_name' => $data['customer_last_name'],
            'customer_email' => $data['customer_email'],
            'street' => $data['customer_street'],
            'house_number' => $data['customer_house_number'],
            'postal_code' => $data['customer_postal_code'],
            'city' => $data['customer_city'],
            'license_plate_type' => $data['license_plate_type'],
            'desired_license_plate' => $data['desired_license_plate'] ?? null,
            'reservation_pin' => $data['reservation_pin'] ?? null,
            'is_seasonal' => !empty($data['seasonal_plate']),
            'season_from_month' => $data['season_from_month'] ?? null,
            'season_to_month' => $data['season_to_month'] ?? null,
            'special_plate' => $data['special_plate'] ?? null,
            'has_delivery_address' => !empty($data['has_delivery_address']),
            'delivery_first_name' => $data['delivery_first_name'] ?? null,
            'delivery_last_name' => $data['delivery_last_name'] ?? null,
            'delivery_street' => $data['delivery_street'] ?? null,
            'delivery_house_number' => $data['delivery_house_number'] ?? null,
            'delivery_postal_code' => $data['delivery_postal_code'] ?? null,
            'delivery_city' => $data['delivery_city'] ?? null,
            'customer_signature' => $data['customer_signature'] ?? null,
            'tax_signature' => $data['tax_signature'] ?? null,
            'poa_signature' => $data['poa_signature'] ?? null,
            'needs_emission_sticker' => !empty($data['needs_emission_sticker']),
            'five_day_registration' => !empty($data['five_day_registration']),
            'evb_number' => $data['evb_number'] ?? null,
            'iban' => $data['iban'] ?? null,
            'status' => 'pending',
            'checkout_status' => 'initiated',
            'amount_eur' => $pricing['total'],
            'tax_rate_id' => config('services.new_booking.tax_rate_id'),
        ]);

        $checkoutSession = $this->createStripeCheckout($pricing['total'], $data['customer_email'] ?? null);

        $booking->update([
            'checkout_session_id' => $checkoutSession->id,
            'checkout_status' => 'pending',
        ]);

        Session::put('new_booking_id', $booking->id);
        $this->clearWizardData();

        return $checkoutSession;
    }
}
