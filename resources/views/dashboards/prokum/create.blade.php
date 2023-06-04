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
            <form action="/dashboard/prokum/store" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-floating mb-3">
                    <input class="form-control" name="nama" id="nama" type="text" placeholder="" value="{{ old('nama') }}">
                    <label for="nama">Nama Produk Hukum</label>
                </div>
                <div class="form-floating mb-3">
                    <select id="tahun" name="tahun" class="form-select" aria-label="Default select example">
                        @for ($i = date('Y'); $i >= date('Y') - 10; $i--)
                        <option value="{{ $i }}" @if ($i === old('tahun')) selected @endif >{{ $i }}</option>
                        @endfor
                      </select>
                    <label for="tahun">Tahun Terbit</label>
                </div>
                <div class="form-floating mb-3">
                    <select id="id_kategori" name="id_kategori" class="form-select" aria-label="Default select example">
                        @foreach ($kategori as $p)
                        <option value="{{ $p->id }}" @if ($p->id === old('id_kategori')) selected @endif >{{ $p->nama_kategori }}</option>
                        @endforeach
                      </select>
                    <label for="nama">Kategori</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                    <label for="alamat">Deskripsi</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="file" id="file" type="file" value="{{ old('file') }}">
                    <label for="foto">File Prokum</label>
                </div>
                <button class="btn btn-primary" type="submit">Tambah</button>
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