@extends('mobile.layouts.master')
@section('content')
<h1 class="h1 mb-4 text-center">
    <img src="{{ asset('assets/images/logo_magetan.png') }}" class="img w-25" alt="...">
      <br>Aplikasi Jaringan Dokumentasi & Informasi Hukum</h1>
    <div class="row text-center">
        <div class="col-6 d-grid gap-2">
          <button type="button" class="btn mb-4 btn-primary btn-lg">
            <i class="fa fa-university fa-5x"></i><br> Peraturan Daerah
          </button>
        </div>
        <div class="col-6 d-grid gap-2">
          <button type="button" class="btn mb-4 btn-info btn-lg">
            <i class="fa fa-suitcase fa-5x"></i><br> Peraturan Bupati
          </button>
        </div>
        <div class="col-6 d-grid gap-2">
          <button type="button" class="btn mb-2 btn-success btn-lg">
            <i class="fa fa-gavel fa-5x"></i><br> Keputusan Bupati
          </button>
        </div>
        <div class="col-6 d-grid gap-2">
          <button type="button" class="btn mb-2 btn-warning btn-lg">
            <i class="fa fa-bullhorn fa-5x"></i><br> Instruksi Bupati
          </button>
        </div>
    </div>
@endsection