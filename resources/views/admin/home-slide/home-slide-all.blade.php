@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Home Slide</h4>

                        <form method="post" action="{{ route('update.slide') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $homeSlide->id }}">

                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input name="title" class="form-control" type="text" id="title" value="{{ $homeSlide->title }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="short_title" class="col-sm-2 col-form-label">Short Title</label>
                                <div class="col-sm-10">
                                    <input name="short_title" class="form-control" type="text" id="short_title" value="{{ $homeSlide->short_title }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="video_url" class="col-sm-2 col-form-label">Video URL</label>
                                <div class="col-sm-10">
                                    <input name="video_url" class="form-control" type="text" id="video_url" value="{{ $homeSlide->video_url }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="slide_image" class="col-sm-2 col-form-label">Slide Image</label>
                                <div class="col-sm-10">
                                    <input name="slide_image" class="form-control" type="file" id="slide_image" accept=".png, .jpg, .jpeg">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="slide_image" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-2 mx-0">
                                    <img id="slide_image_show" style="width:180px; height:200px; object-fit: cover;" class="rounded" alt="200x200" src="{{ (!empty($homeSlide->image)) ? url($homeSlide->image) : url('upload/no_image.jpg') }}" data-holder-rendered="true">
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
        $('#slide_image').change(function(event) {
            const reader = new FileReader();
            reader.onload = function(event) {
                $('#slide_image_show').attr('src', event.target.result);
            }

            reader.readAsDataURL(event.target.files['0']);
        });
    });
</script>

@endsection
