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
            <form action="{{ route('updatestatus.prokum', ['id'=>$prokum->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-floating mb-3">
                    <input class="form-control" name="nama" id="nama" type="text" placeholder="" value="{{ $prokum->nama }}" @role('kabag') disabled @endrole >
                    <label for="nama">Nama Produk Hukum</label>
                </div>
                <div class="form-floating mb-3">
                    <select id="tahun" name="tahun" class="form-select" aria-label="Default select example" @role('kabag') disabled @endrole >
                        @for ($i = date('Y'); $i >= date('Y') - 10; $i--)
                        <option value="{{ $i }}" @if ($i === $prokum->tahun) selected @endif >{{ $i }}</option>
                        @endfor
                      </select>
                    <label for="nama">Kategori</label>
                </div>
                <div class="form-floating mb-3">
                    <select id="id_kategori" name="id_kategori" class="form-select" aria-label="Default select example" @role('kabag') disabled @endrole >
                        @foreach ($kategori as $p)
                        <option value="{{ $p->id }}" @if ($p->id === $prokum->id_kategori) selected @endif >{{ $p->nama_kategori }}</option>
                        @endforeach
                      </select>
                    <label for="nama">Kategori</label>
                </div>
                <div class="form-floating mb-3">
                    <select id="status" name="status" class="form-select" aria-label="Default select example">
                        <option value="" selecte>--pilih status--</option>
                        @foreach ($status as $p)
                        <option value="{{ $p }}" @if ($p === $prokum->status) selected @endif >{{ $p }}</option>
                        @endforeach
                      </select>
                    <label for="nama">Status Dokumen Produk Hukum</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" @role('kabag') disabled @endrole >{{ $prokum->deskripsi }}</textarea>
                    <label for="alamat">Deskripsi</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="file" id="file" type="file" value="{{ $prokum->nama_file }}" @role('kabag') disabled @endrole >
                    <label for="file">File Prokum</label>
                    <a class="btn btn-danger btn-sm" href="{{ url($prokum->path_file) }}" alt="">Download FIle</a><br>
                </div>
                <button class="btn btn-primary" type="submit">Simpan</button>
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