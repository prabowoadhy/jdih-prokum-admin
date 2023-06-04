@extends('layouts.dashboards.master')
@push('css')

@endpush

@section('content')
<div class="main-content">
    <div class="title">
        {{-- Produk Hukum --}}
    </div>
    <div class="content-wrapper">
        <div class="row same-height">
        <div class="col-md-8">
            <form action="{{ route('update.kategori', ['id'=>$kategori->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-floating mb-3">
                    <input class="form-control" name="nama_kategori" id="nama_kategori" type="text" placeholder="" value="{{ $kategori->nama_kategori }}">
                    <label for="nama">Nama Kategori</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3">{{ $kategori->deskripsi }}</textarea>
                    <label for="alamat">Deskripsi</label>
                </div>
                <button type="submit">Ubah</button>
            </form>
        </div>
        <div class="col-md-4">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </div>
    </div>
    </div>
</div>
@endsection

@push('js')
    
@endpush