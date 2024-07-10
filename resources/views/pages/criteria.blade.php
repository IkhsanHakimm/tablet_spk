@extends('layouts.app', ['page' => __('Criteria'), 'pageSlug' => 'criteria'])

@section('content')
<div class="container">
    <h2>Criteria</h2>

    @if (session('toast_success'))
        <div class="alert alert-success">
            {{ session('toast_success') }}
        </div>
    @endif

    <button class="btn btn-primary" data-toggle="modal" data-target="#createCriteriaModal">Add New Criteria</button>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Weight</th>
                <th>Benefited</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($criteria as $criterion)
                <tr>
                    <td>{{ $criterion->id }}</td>
                    <td>{{ $criterion->name }}</td>
                    <td>{{ $criterion->weight }}</td>
                    <td>{{ $criterion->benefited ? 'Benefit' : 'Cost' }}</td>
                    <td>
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editCriteriaModal" data-id="{{ $criterion->id }}" data-name="{{ $criterion->name }}" data-weight="{{ $criterion->weight }}" data-benefited="{{ $criterion->benefited }}">Edit</button>
                        <form action="{{ route('criteria.destroy') }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $criterion->id }}">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Create Criteria Modal -->
<div class="modal fade" id="createCriteriaModal" tabindex="-1" aria-labelledby="createCriteriaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createCriteriaModalLabel">Add New Criteria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('criteria.store') }}" method="POST">
          @csrf
          <div class="modal-body">
              <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" class="form-control" required>
              </div>
              <div class="form-group">
                  <label for="weight">Weight</label>
                  <input type="number" name="weight" class="form-control" required>
              </div>
              <div class="form-group">
                  <label for="benefited">Benefited</label>
                  <select name="benefited" class="form-control" required>
                      <option value="1">Benefit</option>
                      <option value="0">Cost</option>
                  </select>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
          </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Criteria Modal -->
<div class="modal fade" id="editCriteriaModal" tabindex="-1" aria-labelledby="editCriteriaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editCriteriaModalLabel">Edit Criteria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('criteria.update') }}" method="POST">
          @csrf
          @method('PUT')
          <div class="modal-body">
              <input type="hidden" name="id" id="edit-criteria-id">
              <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" id="edit-criteria-name" class="form-control" required>
              </div>
              <div class="form-group">
                  <label for="weight">Weight</label>
                  <input type="number" name="weight" id="edit-criteria-weight" class="form-control" required>
              </div>
              <div class="form-group">
                  <label for="benefited">Benefited</label>
                  <select name="benefited" id="edit-criteria-benefited" class="form-control" required>
                      <option value="1">Benefit</option>
                      <option value="0">Cost</option>
                  </select>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
          </div>
      </form>
    </div>
  </div>
</div>

<script>
    $('#editCriteriaModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var name = button.data('name');
        var weight = button.data('weight');
        var benefited = button.data('benefited');

        var modal = $(this);
        modal.find('#edit-criteria-id').val(id);
        modal.find('#edit-criteria-name').val(name);
        modal.find('#edit-criteria-weight').val(weight);
        modal.find('#edit-criteria-benefited').val(benefited);
    });
</script>

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
