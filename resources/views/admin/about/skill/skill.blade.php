@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">
    <div class="content">
        <div class="card card-default">
            <div class="d-flex justify-content-between pt-3">
                <h3 class="ms-3">All Skill</h3>
                <div class="me-3">
                    <a href="{{ route('add.skill') }}" class="btn btn-primary">Add Skill</a>
                </div>
            </div>
            <div class="card-body table-font">
                <table id="dtBasicExample" class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" width="20%">Skill</th>
                            <th scope="col" width="12%">Proficiency</th>
                            <th scope="col" width="30%">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i = 1)
                        @foreach ($skills as $skill)
                        <tr>
                            <td scope="row">{{ $i++ }}</td>
                            <td>{{ $skill->name }}</td>
                            <td>{{ $skill->proficiency }}%</td>
                            <td><img src="{{ asset($skill->icon) }}" alt="skill icon"></td>
                            <td>
                                <a href="{{ route('edit.skill', $skill->id) }}" class="btn btn-info btn-sm">Edit</a>
                                <a class="btn btn-danger btn-sm text-white deleteBtn" data-bs-id="{{ $skill->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>

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

                                            <form action="{{ route('delete.skill') }}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" name="deleteId" id="deleteId" value="{{ $skill->id }}">
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
