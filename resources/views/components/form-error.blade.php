@props(['field'])
@if($errors->has($field))
    <div class="text-danger small mt-1">{{ $errors->first($field) }}</div>
@endif
