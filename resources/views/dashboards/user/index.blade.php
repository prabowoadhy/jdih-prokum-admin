@extends('layouts.dashboards.master')
@push('css')
<link href="{{ asset('vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
<link href="{{ asset('vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="main-content">
    <div class="title">
        User
    </div>
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>User</h4>
                    </div>
                    <div class="card-body">
                        @if (auth()->user()->can('create user'))
                            <a href="{{ route('create.user') }}" type="button" class="btn btn-primary btn-sm mb-3">Tambah Data</a>
                        @endif
                        {{  $dataTable->table() }}
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
    

</div>
@endsection

@push('js')
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    {{ $dataTable->scripts() }}
    <script>
        function confirmDelete(url) {
            if (confirm('Are you sure you want to delete this item?')) {
                window.location.href = url;
            }
        }
    </script>
@endpush