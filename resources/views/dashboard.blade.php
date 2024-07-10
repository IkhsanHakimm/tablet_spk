@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-lg-12">
            <h2 class="page-header">Dashboard</h2>
        </div>
    </div>
    <div class="row">
        <!-- Card for Jumlah Kriteria -->
        <div class="col-md-6 mb-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="card-text">Jumlah Kriteria</p>
                            <h2 class="card-title">{{ $jumlahKriteria }}</h2>
                        </div>
                        <div>
                            <i class="fa fa-list-alt fa-5x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card for Jumlah Alternatif -->
        <div class="col-md-6 mb-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="card-text">Jumlah Alternatif</p>
                            <h2 class="card-title">{{ $jumlahAlternatif }}</h2>
                        </div>
                        <div>
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

