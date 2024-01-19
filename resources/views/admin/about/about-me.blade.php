@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">About Me</h4>

                        <form method="post" action="{{ route('update.about.me') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $aboutMe->id }}">

                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input name="title" class="form-control" type="text" id="title" value="{{ $aboutMe->title }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="short_title" class="col-sm-2 col-form-label">Short Title</label>
                                <div class="col-sm-10">
                                    <input name="short_title" class="form-control" type="text" id="short_title" value="{{ $aboutMe->short_title }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="short_desc" class="col-sm-2 col-form-label">Short Description</label>
                                <div class="col-sm-10">
                                    <textarea name="short_desc" class="form-control" type="text" id="short_desc">{{ $aboutMe->short_desc }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="elm1" class="col-sm-2 col-form-label">Long Description</label>
                                <div class="col-sm-10">
                                    <textarea id="elm1" name="long_desc">{{ $aboutMe->long_desc }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="cv" class="col-sm-2 col-form-label">CV</label>
                                <div class="col-sm-10">
                                    <input name="cv" class="form-control" type="file" id="cv" accept=".pdf">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="about_image" class="col-sm-2 col-form-label">About Image</label>
                                <div class="col-sm-10">
                                    <input name="about_image" class="form-control" type="file" id="about_image" accept=".png, .jpg, .jpeg">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="about_image_show" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-2 mx-0">
                                    <img id="about_image_show" style="width:180px; height:200px; object-fit: cover;" class="rounded" alt="200x200" src="{{ (!empty($aboutMe->image)) ? url($aboutMe->image) : url('upload/no_image.jpg') }}" data-holder-rendered="true">
                                </div>
                            </div>

                            <input class="btn btn-info waves-effect waves-light" type="submit" value="Update Home Slide">
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#about_image').change(function(event) {
            const reader = new FileReader();
            reader.onload = function(event) {
                $('#about_image_show').attr('src', event.target.result);
            }

            reader.readAsDataURL(event.target.files['0']);
        });
    });
</script>

@endsection
