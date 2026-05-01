<div class="d-flex justify-content-end gap-2">
    <button type="button" class="btn btn-sm btn-light-primary px-3 btn-new-booking-detail" data-id="{{ $booking->id }}">Details</button>
    <button type="button" class="btn btn-sm btn-light-warning px-3 btn-new-booking-edit" data-id="{{ $booking->id }}">Bearbeiten</button>
    <button type="button" class="btn btn-sm btn-light-danger px-3 btn-new-booking-delete" data-id="{{ $booking->id }}">Löschen</button>
</div>
