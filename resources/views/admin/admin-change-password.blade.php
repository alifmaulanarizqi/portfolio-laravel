@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Change Password</h4>
                        <br>

                        @if(count($errors))
                            @foreach($errors->all() as $error)
                                <p class="alert alert-danger alert-dimissible fade show">{{ $error }}</p>
                            @endforeach
                        @endif

                        <form method="post" action="{{ route('update.password') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="old_password" class="col-sm-2 col-form-label">Old Password</label>
                                <div class="col-sm-10">
                                    <input name="old_password" class="form-control" type="password" id="old_password" value="">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="new_password" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10">
                                    <input name="new_password" class="form-control" type="password" id="new_password" value="">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="confirmation_password" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input name="confirmation_password" class="form-control" type="password" id="confirmation_password" value="">
                                </div>
                            </div>

                            <input class="btn btn-info waves-effect waves-light" type="submit" value="Change Password">
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

@endsection
