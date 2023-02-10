@extends('admin.dashboard.layout.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Brand
                    <a class="btn float-end" style="background-color: #39b779;" data-bs-toggle="modal" data-bs-target="#addModal">Add Brand</a>
                </h3>
            </div>
            <!-- Modal -->
            <div style="position: fixed; top:7rem;" class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Brand</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/create-brand" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                </div>
                                <div class="mb-3 form-check position-relative">
                                    <input style="top:5px" class="position-absolute" type="checkbox" name="status" class="form-check-input" id="status">
                                    <label class="form-check-label">Status</label>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @foreach($brand as $b)
            <!-- edit category -->
            <div style="position: fixed; top:7rem;" class="modal fade" id="editModal-{{$b->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Brand</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/update-brand/{{$b->id}}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" value="{{$b->name}}" class="form-control" id="name">
                                </div>
                                <div class="mb-3 form-check position-relative">
                                    <input style="top:5px" class="position-absolute" type="checkbox" name="status" {{$b->status == '1' ? 'checked' : ''}} class="form-check-input" id="status">
                                    <label class="form-check-label">Status</label>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- delete modal -->
            @foreach($brand as $b)
            <div style="position: fixed; top:10rem;" class="modal" tabindex="-1" id="deleteModal-{{$b->id}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="font-size: 1.5rem; display: flex; flex-direction:column; justify-content: center; align-items: center;">
                            <i class="fa-solid fa-trash text-danger" style="font-size: 1.5rem;"></i>
                            <p class="mt-2" style="font-size: 1.1rem;">Do you want to delete this Brand?</p>
                        </div>
                        <div class="modal-footer" style=" display: flex; justify-content: center; align-items: center;">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <a href="/delete-brand/{{$b->id}}" type="button" class="btn btn-danger text-white">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            @foreach($brand as $b)
            <div style="position: fixed; top:10rem;" class="modal" tabindex="-1" id="deleteModal-{{$b->id}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="font-size: 1.5rem; display: flex; flex-direction:column; justify-content: center; align-items: center;">
                            <i class="fa-solid fa-trash text-danger" style="font-size: 1.5rem;"></i>
                            <p class="mt-2" style="font-size: 1.1rem;">Do you want to delete this brand?</p>
                        </div>
                        <div class="modal-footer" style=" display: flex; justify-content: center; align-items: center;">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <a data-bs-toggle="modal" data-bs-target="#deleteModal-{{$b->id}}" type="button" class="btn btn-danger text-white">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


            <div class="container mt-3 mb-3 table-responsive">
                <table class="table" id="myTable">
                    <thead style="background-color: #39b779;">
                        <tr class="text-white">
                            <th scope="col">S.N.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($brand as $b)

                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$b->name}}</td>
                            <td>{{$b->status== '0' ? 'Visible':'Invisible'}}</td>
                            <td>
                                <a class="btn btn-sm btn-primary menu-icon" data-bs-toggle="modal" data-bs-target="#editModal-{{$b->id}}" style="color:white;">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a data-bs-toggle="modal" data-bs-target="#deleteModal-{{$b->id}}" class="btn btn-sm btn-danger menu-icon" style="color: white;">
                                    <i class="fa-sharp fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                        $i++;
                        ?>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection