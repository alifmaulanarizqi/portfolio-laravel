@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4">About Me</h4>

                        <div class="row mb-3">
                            <p class="col-sm-2">Name :</p>
                            <div class="col-sm-10 fw-bold">
                                <p>{{ $message->name }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <p class="col-sm-2">Email :</p>
                            <div class="col-sm-10 fw-bold">
                                <p>{{ $message->email }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <p class="col-sm-2">Subject :</p>
                            <div class="col-sm-10 fw-bold">
                                <p>{{ $message->subject }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <p class="col-sm-2">Message :</p>
                            <div class="col-sm-10 fw-bold">
                                <p>{{ $message->message }}</p>
                            </div>
                        </div>

                        <div class="me-3">
                            <a href="{{ route('index.message') }}" class="btn btn-secondary btn-default">Back</a>
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

@endsection
