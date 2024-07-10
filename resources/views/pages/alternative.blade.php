@extends('layouts.app', ['page' => __('alternative'), 'pageSlug' => 'alternative'])

@section('content')
<div class="container">
    <h2>Alternatives</h2>
    <a href="#" data-toggle="modal" data-target="#createAlternativeModal" class="btn btn-primary">Add New Alternative</a>
    
    @if (session('toast_success'))
        <div class="alert alert-success">
            {{ session('toast_success') }}
        </div>
    @endif
    
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alternatives as $alternative)
                <tr>
                    <td>{{ $alternative->id }}</td>
                    <td>{{ $alternative->name }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editAlternativeModal" data-id="{{ $alternative->id }}" data-name="{{ $alternative->name }}">Edit</button>
                        <form action="{{ route('alternative.destroy') }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $alternative->id }}">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Create Alternative Modal -->
<div class="modal fade" id="createAlternativeModal" tabindex="-1" aria-labelledby="createAlternativeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createAlternativeModalLabel">Create Alternative</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('alternative.store') }}" method="POST">
          @csrf
          <div class="modal-body">
              <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" class="form-control" required>
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

<!-- Edit Alternative Modal -->
<div class="modal fade" id="editAlternativeModal" tabindex="-1" aria-labelledby="editAlternativeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editAlternativeModalLabel">Edit Alternative</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('alternative.update') }}" method="POST">
          @csrf
          @method('PUT')
          <div class="modal-body">
              <input type="hidden" name="id" id="edit-alternative-id">
              <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" id="edit-alternative-name" class="form-control" required>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
      </form>
    </div>
  </div>
</div>

<script>
    $('#editAlternativeModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var name = button.data('name');

        var modal = $(this);
        modal.find('.modal-body #edit-alternative-id').val(id);
        modal.find('.modal-body #edit-alternative-name').val(name);
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
