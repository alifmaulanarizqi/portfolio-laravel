@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">
    <div class="content">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h3>Add Category</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('store.category') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="name">Category name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="Lifestyle">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-start mt-4">
                        <div class="me-3">
                            <a href="{{ route('index.category') }}" class="btn btn-secondary btn-default">Back</a>
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-primary btn-default">Add Category</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
