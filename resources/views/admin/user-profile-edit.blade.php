@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Profile</h4>

                        <form method="post" action="{{ route('store.profile') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input name="name" class="form-control" type="text" id="name" value="{{ $userEdit->name }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input name="email" class="form-control" type="email" id="email" value="{{ $userEdit->email }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input name="username" class="form-control" type="text" id="username" value="{{ $userEdit->username }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="profile_image" class="col-sm-2 col-form-label">Profile Image</label>
                                <div class="col-sm-10">
                                    <input name="profile_image" class="form-control" type="file" id="profile_image" accept=".png, .jpg, .jpeg">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="profile_image" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-2 mx-0">
                                    <img id="show_profile_image" style="width:180px; height:200px; object-fit: cover;" class="rounded" alt="200x200" src="{{ (!empty($userEdit->profile_image)) ? url('upload/admin_images/'.$userEdit->profile_image) : url('upload/no_image.jpg') }}" data-holder-rendered="true">
                                </div>
                            </div>

                            <input class="btn btn-info waves-effect waves-light" type="submit" value="Update Profile">
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#profile_image').change(function(event) {
            const reader = new FileReader();
            reader.onload = function(event) {
                $('#show_profile_image').attr('src', event.target.result);
            }

            reader.readAsDataURL(event.target.files['0']);
        });
    });
</script>

@endsection
