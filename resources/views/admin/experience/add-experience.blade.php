@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper mb-5">
    <div class="content">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h3>Add Experience</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('store.experience') }}" method="post">
                    @csrf

                    <div class="form-group mb-2">
                        <label for="company">Company <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="company" id="company"
                            placeholder="PT. ABC">
                        @error('company')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="entry_date">Entry date <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="entry_date" id="entry_date">
                        @error('entry_date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="exit_date">Exit date <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="exit_date" id="exit_date">
                        @error('exit_date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="role">Role <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="role" id="role"
                            placeholder="CEO">
                        @error('role')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="location">Location <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="location" id="location"
                            placeholder="Australia">
                        @error('location')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="company_profile">Company profile </label>
                        <input type="text" class="form-control" name="company_profile" id="company_profile"
                            placeholder="LinkedIn or company website">
                        @error('company_profile')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="elm1">Description <span class="text-danger">*</span></label>
                        <textarea id="elm1" name="desc"></textarea>
                        @error('desc')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-start mt-4">
                        <div class="me-3">
                            <a href="{{ route('index.experience') }}" class="btn btn-secondary btn-default">Back</a>
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-primary btn-default">Add Experience</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
