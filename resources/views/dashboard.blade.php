@extends('layouts.dashboards.master')
@push('css')
<link rel="stylesheet" href="{{ asset('') }}vendor/chart.js/Chart.min.css">
@endpush

@section('content')
<div class="main-content">
    <div class="title">
        Dashboard
    </div>
    <div class="content-wrapper">
        <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary bg-success text-white shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                {{ $categories[0]->nama_kategori }}</div>
                            <div class="h5 mb-0 font-weight-bold">{{ $categories[0]->prokum_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success bg-warning text-white shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                {{ $categories[1]->nama_kategori }}</div>
                            <div class="h5 mb-0 font-weight-bold">{{ $categories[1]->prokum_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info bg-danger text-white shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                {{ $categories[2]->nama_kategori }}
                            </div>
                                <div class="h5 mb-0 font-weight-bold">{{ $categories[2]->prokum_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning bg-success text-white shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                {{ $categories[3]->nama_kategori }}</div>
                            <div class="h5 mb-0 font-weight-bold ">{{ $categories[3]->prokum_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


</div>
@endsection

@push('js')
<script src="../vendor/chart.js/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="../assets/js/pages/index.min.js"></script>
@endpush