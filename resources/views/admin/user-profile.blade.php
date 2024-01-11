@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <img class="mx-auto mt-3 rounded-circle object-fit-cover avatar-xl" alt="200x200" src="{{ (!empty($user->profile_image)) ? url('upload/admin_images/'.$user->profile_image) : url('upload/no_image.jpg') }}" data-holder-rendered="true">
                    <div class="card-body">
                        <h4 class="card-title">Name: {{ $user->name }}</h4>
                        <hr>
                        <h4 class="card-title">Username: {{ $user->username }}</h4>
                        <hr>
                        <h4 class="card-title">Email: {{ $user->email }}</h4>
                        <hr>

                        <a class="btn btn-info btn-rounded waves-effect waves-light" href="{{ route('profile.edit2') }}">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
