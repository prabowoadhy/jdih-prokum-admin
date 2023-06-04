@extends('mobile.layouts.master')
@section('content')
<form action="/prokum">
    <div class="input-group mb-3">
        <input id="cari" name="search" type="text" class="form-control" placeholder="katakunci pencarian" aria-label="Recipient's username" aria-describedby="button-addon2">
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
        </div>
    </div>
    </form>
    @isset($prokum)
    @foreach ($prokum as $item)
    <ol class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-start">
          <div class="ms-2 me-auto">
            <div class="fw-bold">{{ $item->kategori_file }}</div>
            {{ $item->nama_file }}
          </div>
          <a href="https://jdih.magetan.go.id/wp-content/uploads/filebase/{{ $item->file_path }}"><span class="badge bg-success rounded-pill">Download</span></a>
        </li>
      </ol>
    @endforeach
    @endisset
@endsection