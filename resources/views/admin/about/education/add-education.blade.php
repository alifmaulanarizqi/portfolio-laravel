@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">
    <div class="content">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h3>Add Education</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('store.education') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="school">School <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="school" id="school"
                            placeholder="SMP Michigan 2">
                        @error('school')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="entry_year">Entry Date <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="entry_year" id="entry_year"
                        @error('entry_year')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="graduate_year">Graduate Date <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="graduate_year" id="graduate_year"
                        @error('graduate_year')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="desc">Description <span class="text-danger">*</span></label>
                        <textarea type="text" class="form-control" rows="3" name="desc" id="desc"
                            placeholder="I do basketball at school"></textarea>
                        @error('desc')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-start mt-4">
                        <div class="me-3">
                            <a href="{{ route('index.education') }}" class="btn btn-secondary btn-default">Back</a>
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-primary btn-default">Add Education</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- <script>
    $('#award').change(function (e) {
        $.get('{{ route('
            checkslug.kategori ') }}', {
                'award': $(this).val()
            },
            function (data) {
                $('#slug').val(data.slug);
            }
        );
    });
</script> --}}

@endsection
