@extends('layouts.app', ['page' => __('result'), 'pageSlug' => 'result'])

@section('content')
<div class="container">
    <h2>Results</h2>

    @if (session('toast_success'))
        <div class="alert alert-success">
            {{ session('toast_success') }}
        </div>
    @endif

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Rank</th>
                <th>ID</th>
                <th>Code</th>
                <th>Name</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sortedResults as $result)
                <tr>
                    <td>{{ $result->rank }}</td>
                    <td>{{ $result->id }}</td>
                    <td>{{ $result->code }}</td>
                    <td>{{ $result->name }}</td>
                    <td>{{ $result->grade }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

<!-- Custom CSS -->
<style>
    .form-control {
        color: black !important;
    }

    .form-control::placeholder {
        color: #6c757d;
    }
</style>

