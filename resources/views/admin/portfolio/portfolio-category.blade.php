@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">
    <div class="content">
        <div class="card card-default">
            <div class="d-flex justify-content-between pt-3">
                <h3 class="ms-3">All Category</h3>
                <div class="me-3">
                    <a href="{{ route('add.category') }}" class="btn btn-primary">Add Category</a>
                </div>
            </div>
            <div class="card-body table-font">
                <table id="dtBasicExample" class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" width="20%">Category</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i = 1)
                        @foreach ($categories as $category)
                        <tr>
                            <td scope="row">{{ $i++ }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('edit.category', $category->id) }}" class="btn btn-info btn-sm">Edit</a>
                                <a class="btn btn-danger btn-sm text-white deleteBtn" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <form action="{{ route('delete.category') }}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" name="deleteId" id="deleteId" value="{{ $category->id }}">
                                                    Are you sure to delete?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="deleteData" class="btn btn-danger">Delete</button>
                                                    </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
