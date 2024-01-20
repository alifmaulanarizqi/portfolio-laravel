@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="content-wrapper mb-5">
    <div class="content">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h3>Add Skill</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('store.skill') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Skill <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="Flexible body">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="proficiency">Proficiency <span class="text-danger">*</span></label>
                        <input type="number" oninput="this.value = Math.round(this.value);" min="0" step="1" max="100" class="form-control" name="proficiency" id="proficiency" placeholder="60">
                        @error('proficiency')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="icon2" class="col-sm-2 col-form-label">Skill Icon <span class="text-danger">*</span></label>
                        <div>
                            <input name="icon2" class="form-control" type="file" id="icon2" accept=".png, .jpg, .jpeg">
                            @error('icon2')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="icon_show" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-2 mx-0">
                            <img id="icon_show" style="width:180px; height:200px; object-fit: cover;" class="rounded" alt="200x200" src="{{ url('upload/no_image.jpg') }}" data-holder-rendered="true">
                        </div>
                    </div>
                    <div class="d-flex justify-content-start mt-4">
                        <div class="me-3">
                            <a href="{{ route('index.skill') }}" class="btn btn-secondary btn-default">Back</a>
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-primary btn-default">Add Skill</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#icon2').change(function(event) {
            const reader = new FileReader();
            reader.onload = function(event) {
                $('#icon_show').attr('src', event.target.result);
            }

            reader.readAsDataURL(event.target.files['0']);
        });
    });
</script>

@endsection
