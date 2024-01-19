@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">
    <div class="content">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h3>Edit Award</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('update.award', $award->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Award Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" id="title"
                            value="{{ $award->title }}">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="desc">Description</label>
                        <textarea type="text" class="form-control" rows="3" name="desc" id="desc">{{ $award->desc }}</textarea>
                    </div>
                    <div class="d-flex justify-content-start mt-4">
                        <div class="me-3">
                            <a href="{{ route('index.award') }}" class="btn btn-secondary btn-default">Back</a>
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-primary btn-default">Update Award</button>
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
