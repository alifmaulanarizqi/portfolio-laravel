@extends('admin.admin_master')

@section('admin')
<style>
    .image-container {
        position: relative;
        display: inline-block;
        margin-right: 5px;
        border: 1px solid #c9c9c9;
    }

    .close-button {
        position: absolute;
        top: 0;
        right: 0;
        background-color: #ffffff;
        color: #000000;
        border-left: 1px solid #c9c9c9;
        border-bottom: 1px solid #c9c9c9;
        padding: 8px;
        cursor: pointer;
        font-size: 16px;
    }

    .close-button:hover {
        background-color: #ff0000;
        color: #ffffff;
    }

    .image_project_show img {
        width: 180px;
        height: 200px;
        object-fit: cover;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<div class="content-wrapper mb-5">
    <div class="content">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h3>Portfolio Detail</h3>
            </div>
            <div class="card-body">

                <div class="form-group mb-2">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title"
                        value="{{ $portfolio->title }}" readonly>
                </div>

                <div class="form-group mb-2">
                    <label for="portfolio_category_id">Category</label>
                    <input type="text" class="form-control" name="portfolio_category_id" id="portfolio_category_id"
                        value="{{ $portfolio->portfolioCategory->name ?? 'Uncategorized' }}" readonly>
                </div>

                <div class="form-group mb-3">
                    <label for="image_thumbnail" class="col-sm-2 col-form-label">Image Thumbnail</label>
                    <div class="col-sm-2 mx-0">
                        <img id="image_thumbnail_show" style="width:180px; height:200px; object-fit: cover;" class="rounded" alt="200x200" src="{{ asset($portfolio->image_thumbnail) }}" data-holder-rendered="true">
                    </div>
                </div>

                <div class="form-group mb-2">
                    <label for="client">Client</label>
                    <input type="text" class="form-control" name="client" id="client"
                        value="{{ $portfolio->client }}" readonly>
                </div>

                <div class="form-group mb-2">
                    <label for="project_link">Project Link</label>
                    <input type="text" class="form-control" name="project_link" id="project_link"
                        value="{{ $portfolio->project_link }}" readonly>
                </div>

                <div class="form-group mb-2">
                    <label for="elm1">Description <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="long_desc" rows="5" readonly>{{ strip_tags($portfolio->desc) }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="image_project" class="col-sm-2 col-form-label">Multiple Image Project</label>
                    <div class="row">
                        <div class="image_project_show">
                            @foreach ($projectImages as $projectImage)
                                <div class="image-container">
                                    <img style="width:180px; height:200px; object-fit: cover;" alt="project image" src="{{ asset($projectImage->image) }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-start mt-4">
                    <div class="me-3">
                        <a href="{{ route('index.portfolio') }}" class="btn btn-secondary btn-default">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
