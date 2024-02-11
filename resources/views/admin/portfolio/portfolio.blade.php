@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">
    <div class="content">
        <div class="card card-default">
            <div class="d-flex justify-content-between pt-3">
                <h3 class="ms-3">All Portfolio</h3>
                <div class="me-3">
                    <a href="{{ route('add.portfolio') }}" class="btn btn-primary">Add Portfolio</a>
                </div>
            </div>
            <div class="card-body table-font">
                <table id="dtBasicExample" class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" width="20%">Title</th>
                            <th scope="col" width="15%">Category</th>
                            <th scope="col" width="15%">Thumbail</th>
                            <th scope="col" width="30%">Desc</th>
                            <th scope="col" width="25%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i = 1)
                        @foreach ($porfolios as $portfolio)
                        <tr>
                            <td scope="row">{{ $i++ }}</td>
                            <td>{{ $portfolio->title }}</td>
                            <td>{{ $portfolio->portfolioCategory->name ?? 'Uncategorized' }}</td>
                            <td><img src="{{ asset($portfolio->image_thumbnail) }}" style="width: 150px" alt="Portfolio thumbnail"></td>
                            <td>{!! Str::limit($portfolio->desc, 100) !!}</td>
                            <td>
                                <a href="{{ route('detail.portfolio', $portfolio->id) }}" class="btn btn-primary btn-sm">Detail</a>
                                <a href="{{ route('edit.portfolio', $portfolio->id) }}" class="btn btn-info btn-sm">Edit</a>
                                <a class="btn btn-danger btn-sm text-white deleteBtn" data-bs-id="{{ $portfolio->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>

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

                                            <form action="{{ route('delete.portfolio') }}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" name="deleteId" id="deleteId">
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

<script>
    var deleteModal = document.getElementById('deleteModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var id = button.getAttribute('data-bs-id');
        var deleteIdInput = document.getElementById('deleteId');
        deleteIdInput.value = id;
    });
</script>

@endsection
