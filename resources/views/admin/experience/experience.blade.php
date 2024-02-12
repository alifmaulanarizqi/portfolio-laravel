@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">
    <div class="content">
        <div class="card card-default">
            <div class="d-flex justify-content-between pt-3">
                <h3 class="ms-3">All Experience</h3>
                <div class="me-3">
                    <a href="{{ route('add.experience') }}" class="btn btn-primary">Add Experience</a>
                </div>
            </div>
            <div class="card-body table-font">
                <table id="dtBasicExample" class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" width="15%">Company</th>
                            <th scope="col" width="15%">Role</th>
                            <th scope="col" width="10%">Entry Date</th>
                            <th scope="col" width="30%">Desc</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i = 1)
                        @foreach ($experiences as $experience)
                        <tr>
                            <td scope="row">{{ $i++ }}</td>
                            <td>{{ $experience->company }}</td>
                            <td>{{ $experience->role }}</td>
                            <td>{{ $experience->entry_date }}</td>
                            <td>{!! Str::limit($experience->desc, 100) !!}</td>
                            <td>
                                <a href="{{ route('detail.experience', $experience->id) }}" class="btn btn-primary btn-sm">Detail</a>
                                <a href="{{ route('edit.experience', $experience->id) }}" class="btn btn-info btn-sm">Edit</a>
                                <a class="btn btn-danger btn-sm text-white deleteBtn" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="{{ $experience->id }}">Delete</a>

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

                                            <form action="{{ route('delete.experience') }}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" name="deleteId" id="deleteId" value="{{ $experience->id }}">
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
