@extends('layouts.dashboards.master')
@push('css')
<link href="{{ asset('vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
<link href="{{ asset('vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="main-content">
    <div class="title">
        {{-- Produk Hukum --}}
    </div>
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Produk Hukum</h4>
                    </div>
                    <div class="card-body">
                        @if (auth()->user()->can('create prokum'))
                            <a href="{{ route('create.prokum') }}" type="button" class="btn btn-primary btn-sm mb-3">Tambah Data</a>
                        @endif
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Local</button>
                                </li>
                                {{-- <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false" tabindex="-1">Server JDIH Magetan</button>
                                </li> --}}
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    {{  $dataTable->table() }}
                                </div>
                                {{-- <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    {{ $prokumjdih->table() }}
                                </div> --}}
                            </div>
                        
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