@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Contact Me</h4>

                        <form method="post" action="{{ route('update.contact.me') }}">
                            @csrf

                            <input type="hidden" name="id" value="{{ $contactMe->id }}">

                            <div class="row mb-3">
                                <label for="short_desc" class="col-sm-2 col-form-label">Short Description</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" rows="3" name="short_desc" id="short_desc"
                                    placeholder="Deadlift 1000 KG">{{ $contactMe->short_desc }}</textarea>
                                    @error('short_desc')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input name="phone" class="form-control" type="tel" id="phone" value="{{ $contactMe->phone }}">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input name="email" class="form-control" type="email" id="email" value="{{ $contactMe->email }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <input class="btn btn-info waves-effect waves-light" type="submit" value="Update Contact Me">
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

@endsection
