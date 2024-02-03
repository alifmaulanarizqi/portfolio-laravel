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
                <h3>Add Portfolio</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('store.portfolio') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-2">
                        <label for="title">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" id="title"
                            placeholder="Lifestyle">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="portfolio_category_id">Category <span class="text-danger">*</span></label>
                        <select class="form-control" name="portfolio_category_id" id="portfolio_category_id">
                            <option disabled selected>Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('portfolio_category_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image_thumbnail" class="col-sm-2 col-form-label">Image Thumbnail <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input name="image_thumbnail" class="form-control" type="file" id="image_thumbnail" accept=".png, .jpg, .jpeg">
                            @error('image_thumbnail')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="image_thumbnail_show" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-2 mx-0">
                            <img id="image_thumbnail_show" style="width:180px; height:200px; object-fit: cover;" class="rounded" alt="200x200" src="{{ url('upload/no_image.jpg') }}" data-holder-rendered="true">
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <label for="client">Client</label>
                        <input type="text" class="form-control" name="client" id="client"
                            placeholder="Shoes Store">
                        @error('client')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="project_link">Project Link</label>
                        <input type="text" class="form-control" name="project_link" id="project_link"
                            placeholder="shoesstore.com">
                        @error('project_link')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="elm1">Description <span class="text-danger">*</span></label>
                        <textarea id="elm1" name="long_desc"></textarea>
                        @error('long_desc')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image_project" class="col-sm-2 col-form-label">Multiple Image Project</label>
                        <div class="col-sm-10">
                            <input name="image_project[]" class="form-control" type="file" id="image_project" accept=".png, .jpg, .jpeg" multiple>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="image_project_show" class="col-sm-2 col-form-label"></label>
                        <div class="row">
                            <div class="image_project_show"></div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-start mt-4">
                        <div class="me-3">
                            <a href="{{ route('index.category') }}" class="btn btn-secondary btn-default">Back</a>
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-primary btn-default">Add Portfolio</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#image_thumbnail').change(function(event) {
            const reader = new FileReader();
            reader.onload = function(event) {
                $('#image_thumbnail_show').attr('src', event.target.result);
            }

            reader.readAsDataURL(event.target.files['0']);
        });
    });

    function removeFileFromFileList(index) {
        const dt = new DataTransfer()
        const input = document.getElementById('image_project')
        const { files } = input

        for (let i = 0; i < files.length; i++) {
            const file = files[i]
            if (index !== i)
            dt.items.add(file) // here you exclude the file. thus removing it.
        }

        input.files = dt.files // Assign the updates list
    }

    $(function () {
    // Multiple images preview with JavaScript
    var multiImgPreview = function (input, imgPreviewPlaceholder) {
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function (event) {
                    var imageContainer = $($.parseHTML('<div class="image-container"></div>'));
                    var closeButton = $($.parseHTML('<span class="close-button">×</span>'));

                    closeButton.on('click', function () {
                        // Remove the image container when the close button is clicked
                        var fileIndex = $(this).parent('.image-container').index();
                        removeFileFromFileList(fileIndex);
                        $(this).parent('.image-container').remove();
                    });

                    $($.parseHTML('<img>')).attr('src', event.target.result)
                        .css({ 'width': '180px', 'height': '200px', 'margin-right': '5px', 'object-fit': 'cover' })
                        .appendTo(imageContainer);

                    closeButton.appendTo(imageContainer);
                    imageContainer.appendTo(imgPreviewPlaceholder);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    };

    $('#image_project').on('change', function () {
        // Clear existing image previews
        $('.image_project_show').empty();
        multiImgPreview(this, $('.image_project_show'));
    });
});
</script>

@endsection
