@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Social Media</h4>

                        <form method="post" action="{{ route('update.social') }}">
                            @csrf

                            <input type="hidden" name="id" value="{{ $social->id }}">

                            <div class="row mb-3">
                                <label for="linkedin" class="col-sm-2 col-form-label">LinkedIn</label>
                                <div class="col-sm-10">
                                    <input name="linkedin" class="form-control" type="text" id="linkedin" value="{{ $social->linkedin }}">
                                    @error('linkedin')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="instagram" class="col-sm-2 col-form-label">Instagram</label>
                                <div class="col-sm-10">
                                    <input name="instagram" class="form-control" type="text" id="instagram" value="{{ $social->instagram }}">
                                    @error('instagram')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
                                <div class="col-sm-10">
                                    <input name="twitter" class="form-control" type="text" id="twitter" value="{{ $social->twitter }}">
                                    @error('twitter')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="youtube" class="col-sm-2 col-form-label">Youtube</label>
                                <div class="col-sm-10">
                                    <input name="youtube" class="form-control" type="text" id="youtube" value="{{ $social->youtube }}">
                                    @error('youtube')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <input class="btn btn-info waves-effect waves-light" type="submit" value="Update Social Media">
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

@endsection
