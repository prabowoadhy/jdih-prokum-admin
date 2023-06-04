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
            <form action="{{ route('store.user') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-floating mb-3">
                    <input class="form-control" name="nama" id="nama" type="text" placeholder="" value="{{ old('nama') }}">
                    <label for="nama">Nama</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="email" id="email" type="text" placeholder="" value="{{ old('email') }}">
                    <label for="nama">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <select id="role" name="role" class="form-select" aria-label="Default select example">
                        @foreach ($role as $p)
                        <option value="{{ $p->id }}" @if ($p->id === old('role')) selected @endif >{{ $p->name }}</option>
                        @endforeach
                      </select>
                    <label for="nama">Role</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="password" id="password" type="password">
                    <label for="password">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="password_confirmation" id="password_confirmation" type="password">
                    <label for="password">Konfirmasi Password</label>
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