@extends('mainpages.master-layout')
@section('header')
    @include('partials.index-header')
@endsection
@section('content')

<br>
<div class="pt-5 pb-5 container d-flex flex-column justify-content-center align-items-center min-vh-80 py-8">
  <div class="text-center" style="max-width: 380px; word-break: break-word;">
    <h1 class="mb-4" style="font-size: 50px; text-align: center; letter-spacing: -2px">Danke für deine Buchung der Verhandlungs-Checkliste!</h1>
    <p class="mb-4 fs-6" style="text-align: center;">Du kannst sie hier sofort herunterladen:</p>
    <a href="/Verhandlung_Checkliste_CS288215.pdf" class="btn mx-auto d-block download-btn" style="width: 325px; background-color: var(--secondary); color: #fff; display: flex; align-items: center; justify-content: center; gap: 8px;">
      <i style="padding-right: 15px" class="fas fa-download"></i>
      Jetzt herunterladen
    </a>
  </div>
</div>

<style>
  .download-btn:hover {
    background-color: var(--primary) !important;
  }
</style>


@endsection
