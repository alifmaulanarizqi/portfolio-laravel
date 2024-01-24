@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">
    <div class="content">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h3>Edit Category</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('update.category') }}" method="post">
                    @csrf

                    <input type="hidden" name="id" value="{{ $category->id }}">

                    <div class="form-group">
                        <label for="name">Category name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ $category->name }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-start mt-4">
                        <div class="me-3">
                            <a href="{{ route('index.category') }}" class="btn btn-secondary btn-default">Back</a>
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-primary btn-default">Update Category</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
