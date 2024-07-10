@extends('layouts.app', ['page' => __('Nilai Alternative'), 'pageSlug' => 'nilai alternative'])

@section('content')
<div class="container">
    <h2>Nilai Alternatif</h2>

    @if (session('toast_success'))
        <div class="alert alert-success">
            {{ session('toast_success') }}
        </div>
    @endif

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                @foreach ($criteria as $criterion)
                    <th>{{ $criterion->name }}</th>
                @endforeach
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alternatives as $alternative)
                <tr>
                    <td>{{ $alternative->id }}</td>
                    <td>{{ $alternative->name }}</td>
                    @foreach ($criteria as $criterion)
                        <td>
                            @php
                                $form = $forms[$alternative->id]->firstWhere('criteria_id', $criterion->id);
                                $grade = $form ? $form->grade : '-';
                            @endphp
                            {{ $grade }}
                        </td>
                    @endforeach
                    <td>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#gradeFormModal-{{ $alternative->id }}">Lihat/Edit Nilai</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @foreach ($alternatives as $alternative)
        <div class="modal fade" id="gradeFormModal-{{ $alternative->id }}" tabindex="-1" aria-labelledby="gradeFormModalLabel-{{ $alternative->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('grades.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="alternative_id" value="{{ $alternative->id }}">

                        <div class="modal-header">
                            <h5 class="modal-title" id="gradeFormModalLabel-{{ $alternative->id }}">Edit Nilai untuk {{ $alternative->name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            @foreach ($criteria as $criterion)
                                @php
                                    $form = $forms[$alternative->id]->firstWhere('criteria_id', $criterion->id);
                                @endphp
                                <div class="form-group">
                                    <label for="criteria-{{ $form->id }}">{{ $criterion->name }}</label>
                                    <input type="number" name="{{ $form->id }}" id="criteria-{{ $form->id }}" class="form-control" value="{{ $form->grade }}" required>
                                </div>
                            @endforeach
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- Custom CSS -->
<style>
    .form-control {
        color: black !important;
    }

    .form-control::placeholder {
        color: #6c757d;
    }
</style>

@endsection
