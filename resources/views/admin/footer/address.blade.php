@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">My Address</h4>

                        <form method="post" action="{{ route('update.my.address') }}">
                            @csrf

                            <input type="hidden" name="id" value="{{ $myAddress->id }}">

                            <div class="row mb-3">
                                <label for="nation" class="col-sm-2 col-form-label">Nation</label>
                                <div class="col-sm-10">
                                    <input name="nation" class="form-control" type="tel" id="nation" value="{{ $myAddress->nation }}">
                                    @error('nation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="address" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" rows="3" name="address" id="address"
                                    placeholder="Bekasi, Jawa Barat">{{ $myAddress->address }}</textarea>
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <input class="btn btn-info waves-effect waves-light" type="submit" value="Update My Address">
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

@endsection
