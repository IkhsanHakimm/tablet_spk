@extends('layouts.app', ['page' => __('calculation'), 'pageSlug' => 'calculation'])

@section('content')
<div class="container">
    <h2>Hasil Perhitungan TOPSIS</h2>

    <div class="mb-5">
        <h4>Matriks Keputusan</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Alternatif</th>
                    @foreach ($criteria as $criterion)
                        <th>{{ $criterion->name }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($decisionMatrix as $index => $row)
                    <tr>
                        <td>{{ $alternatives[$index]->name }}</td>
                        @foreach ($row as $value)
                            <td>{{ $value }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mb-5">
        <h4>Matriks Normalisasi</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Alternatif</th>
                    @foreach ($criteria as $criterion)
                        <th>{{ $criterion->name }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($normMatrix as $index => $row)
                    <tr>
                        <td>{{ $alternatives[$index]->name }}</td>
                        @foreach ($row as $value)
                            <td>{{ number_format($value, 4) }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mb-5">
        <h4>Matriks Normalisasi Terbobot</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Alternatif</th>
                    @foreach ($criteria as $criterion)
                        <th>{{ $criterion->name }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($weightedNorm as $index => $row)
                    <tr>
                        <td>{{ $alternatives[$index]->name }}</td>
                        @foreach ($row as $value)
                            <td>{{ number_format($value, 4) }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mb-5">
        <h4>Solusi Ideal Positif</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    @foreach ($criteria as $criterion)
                        <th>{{ $criterion->name }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($idealPositive as $value)
                        <td>{{ number_format($value, 4) }}</td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>

    <div class="mb-5">
        <h4>Solusi Ideal Negatif</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    @foreach ($criteria as $criterion)
                        <th>{{ $criterion->name }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($idealNegative as $value)
                        <td>{{ number_format($value, 4) }}</td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>

    <div class="mb-5">
        <h4>Jarak Solusi ke Ideal Positif</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Alternatif</th>
                    <th>Jarak</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($solutionPositive as $index => $value)
                    <tr>
                        <td>{{ $alternatives[$index]->name }}</td>
                        <td>{{ number_format($value, 4) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mb-5">
        <h4>Jarak Solusi ke Ideal Negatif</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Alternatif</th>
                    <th>Jarak</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($solutionNegative as $index => $value)
                    <tr>
                        <td>{{ $alternatives[$index]->name }}</td>
                        <td>{{ number_format($value, 4) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mb-5">
        <h4>Nilai Preferensi</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Alternatif</th>
                    <th>Nilai Preferensi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($PreferenceValue as $index => $value)
                    <tr>
                        <td>{{ $alternatives[$index]->name }}</td>
                        <td>{{ number_format($value, 4) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
