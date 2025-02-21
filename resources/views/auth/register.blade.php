@extends('layouts.app', ['class' => 'register-page', 'page' => __('Register Page'), 'contentClass' => 'register-page'])

@section('content')
<div class="row">
    <div class="col-md-5 ml-auto">
        <div class="info-area info-horizontal mt-5">
            <div class="icon icon-warning">
                <i class="tim-icons icon-tablet-2"></i>
            </div>
            <div class="description">
                <h3 class="info-title">{{ __('Sistem Pendukung Keputusan') }}</h3>
                <p class="description">
                    {{ __('Menggunakan metode TOPSIS untuk membantu pemilihan tablet yang sesuai dengan kriteria yang diinginkan.') }}
                </p>
            </div>
        </div>
        <div class="info-area info-horizontal">
            <div class="icon icon-primary">
                <i class="tim-icons icon-components"></i>
            </div>
            <div class="description">
                <h3 class="info-title">{{ __('Kriteria Penilaian') }}</h3>
                <p class="description">
                    {{ __('Mempertimbangkan berbagai aspek untuk penilaian yang akurat.') }}
                </p>
            </div>
        </div>
        <div class="info-area info-horizontal">
            <div class="icon icon-info">
                <i class="tim-icons icon-laptop"></i>
            </div>
            <div class="description">
                <h3 class="info-title">{{ __('Hasil Rekomendasi') }}</h3>
                <p class="description">
                    {{ __('Sistem memberikan rekomendasi tablet berdasarkan perhitungan TOPSIS.') }}
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-7 mr-auto">
        <div class="card card-register card-white">
            <div class="card-header">
                <img class="card-img" src="{{ asset('black') }}/img/card-primary.png" alt="Card image">
                <h4 class="card-title">{{ __('Register') }}</h4>
            </div>
            <form class="form" method="post" action="{{ route('register') }}">
                @csrf

                <div class="card-body">
                    <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-single-02"></i>
                            </div>
                        </div>
                        <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}">
                        @include('alerts.feedback', ['field' => 'name'])
                    </div>
                    <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-email-85"></i>
                            </div>
                        </div>
                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}">
                        @include('alerts.feedback', ['field' => 'email'])
                    </div>
                    <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-lock-circle"></i>
                            </div>
                        </div>
                        <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}">
                        @include('alerts.feedback', ['field' => 'password'])
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-lock-circle"></i>
                            </div>
                        </div>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('Confirm Password') }}">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-round btn-lg">{{ __('Register') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
