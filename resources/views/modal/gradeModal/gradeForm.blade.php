@foreach ($forms as $form)
    <form action="{{ route('grades.update') }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="alternative_id" value="{{ $form->alternative_id }}">

        <div class="modal-header">
            <h5 class="modal-title" id="gradeFormModalLabel">Edit Grades for {{ $form->alternative->name }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <div class="form-group">
                <label for="criteria-{{ $form->id }}">{{ $form->criteria->name }}</label>
                <input type="number" name="{{ $form->id }}" id="criteria-{{ $form->id }}" class="form-control" value="{{ $form->grade }}" required>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
@endforeach
