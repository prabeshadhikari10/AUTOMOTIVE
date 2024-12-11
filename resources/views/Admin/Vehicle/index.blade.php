@extends('admin.dashboard.layout.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Vehicle
                    <a class="btn float-end" style="background-color: #39b779;" href="/add-vehicle">Add Vehicle</a>
                </h3>
            </div>


            <!-- delete vehicle modal -->
            @foreach($vehicle as $v)
            <div style="position: fixed; top:10rem;" class="modal" tabindex="-1" id="deleteModal-{{$v->id}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="font-size: 1.5rem; display: flex; flex-direction:column; justify-content: center; align-items: center;">
                            <i class="fa-solid fa-trash text-danger" style="font-size: 1.5rem;"></i>
                            <p class="mt-2" style="font-size: 1.1rem;">Do you want to delete this vehicle?</p>
                        </div>
                        <div class="modal-footer" style=" display: flex; justify-content: center; align-items: center;">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <a href="/delete-vehicle/{{$v->id}}" type="button" class="btn btn-danger text-white">Delete</a>
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
                            <th scope="col">Category</th>
                            <th scope="col">Image</th>
                            <th scope="col">Price</th>
                            <th scope="col">Type</th>
                            <th scope="col">Fuel</th>
                            <th scope="col">Engine</th>
                            <th scope="col">Description</th>
                            <th scope="col">Vehicle no.</th>
                            <th scope="col">Location</th>
                            <th scope="col">Driver Status</th>
                            <th scope="col">Status</th>
                            <th scope="col">Trending</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Added By</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vehicle as $v)

                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$v->name}}</td>
                            <td>{{$v->category['name']}}</td>
                            <td>
                                <img src="{{$v->image}}" alt="" width="85px">
                            </td>
                            <td>{{$v->price}}</td>
                            <td>{{$v->wheels}}</td>
                            <td>{{$v->fuel}}</td>
                            <td>{{$v->engine}}</td>
                            <td>{{$v->description}}</td>
                            <td>{{$v->vehicle_no}}</td>
                            <td>{{$v->location}}</td>
                            <td>{{$v->driver_stat}}</td>
                            <td>{{$v->status== '0' ? 'Visible':'Invisible'}}</td>
                            <td>{{$v->trending== '0' ? 'Not Trending':'Trending'}}</td>
                            <td>{{$v->brand}}</td>
                            <td>{{$v->user['name']}}</td>
                            <td>
                                <a class="btn btn-sm btn-primary menu-icon" href="edit-vehicle/{{$v->id}}" style="color:white;">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a data-bs-toggle="modal" data-bs-target="#deleteModal-{{$v->id}}" class="btn btn-sm btn-danger menu-icon" style="color: white;">
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