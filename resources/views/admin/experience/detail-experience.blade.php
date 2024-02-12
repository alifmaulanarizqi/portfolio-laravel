@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper mb-5">
    <div class="content">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h3>Portfolio Detail</h3>
            </div>
            <div class="card-body">

                <div class="form-group mb-2">
                    <label for="company">Company</label>
                    <input type="text" class="form-control" name="company" id="company"
                        value="{{ $experience->company }}" readonly>
                </div>

                <div class="form-group mb-2">
                    <label for="entry_date">Entry date</label>
                    <input type="text" class="form-control" name="entry_date" id="entry_date"
                        value="{{ $experience->entry_date }}" readonly>
                </div>

                <div class="form-group mb-2">
                    <label for="exit_date">Exit date</label>
                    <input type="text" class="form-control" name="exit_date" id="exit_date"
                        value="{{ $experience->exit_date }}" readonly>
                </div>

                <div class="form-group mb-2">
                    <label for="role">Role</label>
                    <input type="text" class="form-control" name="role" id="role"
                        value="{{ $experience->role }}" readonly>
                </div>

                <div class="form-group mb-2">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" name="location" id="location"
                        value="{{ $experience->location }}" readonly>
                </div>

                <div class="form-group mb-2">
                    <label for="company_profile">Company profile</label>
                    <input type="text" class="form-control" name="company_profile" id="company_profile"
                        value="{{ $experience->company_profile }}" readonly>
                </div>

                <div class="form-group mb-2">
                    <label for="elm1">Description </label>
                    <textarea id="elm1" class="form-control" name="desc" rows="5" readonly>{{ $experience->desc }}</textarea>
                </div>

                <div class="d-flex justify-content-start mt-4">
                    <div class="me-3">
                        <a href="{{ route('index.experience') }}" class="btn btn-secondary btn-default">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
