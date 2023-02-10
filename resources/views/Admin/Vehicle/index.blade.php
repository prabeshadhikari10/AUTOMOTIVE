@extends('admin.dashboard.layout.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Vehicle
                    <a class="btn float-end" style="background-color: #39b779;" data-bs-toggle="modal" data-bs-target="#addModal">Add Vehicle</a>
                </h3>
            </div>
            <!-- Modal -->
            <div style="position: fixed;" class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Vehicle</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/create-vehicle" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="" required="">
                                        <div class="invalid-feedback">
                                            Valid name is required.
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="text" class="form-control" id="price" name="price" value="" required="">
                                        <div class="invalid-feedback">
                                            Valid price is required.
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="brand" class="form-label">Brand</label>
                                        <select name="brand_id" id="brand_id">
                                            @foreach($brand as $b)
                                            <option value="{{$b->id}}">{{$b->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Valid brand is required.
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="category" class="form-label">Category</label>
                                        <select name="category_id" id="category_id">
                                            @foreach($category as $c)
                                            <option value="{{$c->id}}">{{$c->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Valid category is required.
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="seat-capacity" class="form-label">Seat</label>
                                        <select class="form-select" id="seat_capacity" name="seat_capacity" required="">

                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid seat capacity.
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <label for="fuel" class="form-label">Fuel</label>
                                        <select class="form-select" id="fuel" name="fuel" required="">

                                            <option>Petrol</option>
                                            <option>Diesel</option>
                                            <option>Electric</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid fuel type.
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <label for="engine" class="form-label">Engine</label>
                                        <select class="form-select" id="engine" name="engine" required="">

                                            <option>Manual</option>
                                            <option>Automatic</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid engine type.
                                        </div>
                                    </div>

                                    <div class="col-md-6 form-check position-relative">
                                        <input style="top:5px" class="position-absolute" type="checkbox" name="status" class="form-check-input" id="status">
                                        <label class="form-check-label">Status</label>
                                    </div>

                                    <div class="col-md-6 form-check position-relative">
                                        <input style="top:5px" class="position-absolute" type="checkbox" name="trending" class="form-check-input" id="trending">
                                        <label class="form-check-label">Trending</label>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="formFile" class="form-label">Image</label>
                                        <input class="form-control border-0 outline-none" type="file" id="image" name="image">
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>


                                <!-- <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Category</label>
                                    <select name="category_id" id="category_id">
                                        @foreach($category as $c)
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <input type="file" name="image" class="form-control border-0 outline-none" id="image">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Price</label>
                                    <input type="text" name="price" class="form-control" id="price">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Seat Capacity</label>
                                    <input type="text" name="seat_capacity" class="form-control" id="seat_capacity">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Fuel</label>
                                    <input type="text" name="fuel" class="form-control" id="fuel">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Engine</label>
                                    <input type="text" name="engine" class="form-control" id="engine">
                                </div>
                                <div class="mb-3 form-check position-relative">
                                    <input style="top:5px" class="position-absolute" type="checkbox" name="status" class="form-check-input" id="status">
                                    <label class="form-check-label">Status</label>
                                </div>
                                <div class="mb-3 form-check position-relative">
                                    <input style="top:5px" class="position-absolute" type="checkbox" name="trending" class="form-check-input" id="trending">
                                    <label class="form-check-label">Trending</label>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Brand</label>
                                    <select name="brand_id" id="brand_id">
                                        @foreach($brand as $b)
                                        <option value="{{$b->id}}">{{$b->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @foreach($vehicle as $v)
            <!-- edit vehicle -->
            <div style="position: fixed; top:4rem;" class="modal fade" id="editModal-{{$v->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Vehicle</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/update-vehicle/{{$v->id}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" value="{{$v->name}}" name="name" required="">
                                        <div class="invalid-feedback">
                                            Valid name is required.
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="text" class="form-control" id="price" name="price" value="{{$v->price}}" required="">
                                        <div class="invalid-feedback">
                                            Valid price is required.
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="brand" class="form-label">Brand</label>
                                        <select class="form-select" name="brand_id" id="brand_id" value="{{$v->brand_id}}">
                                            @foreach($brand as $b)
                                            <option value="{{$b->id}}">{{$b->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="category" class="form-label">Category</label>
                                        <select class="form-select" name="category_id" id="category_id" value="{{$v->category_id}}">
                                            @foreach($category as $c)
                                            <option value="{{$c->id}}">{{$c->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="seat-capacity" class="form-label">Seat</label>
                                        <select class="form-select" id="seat_capacity" name="seat_capacity" value="{{$v->seat_capacity}}" required="">
                                            <option>{{$v->seat_capacity}}</option>

                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid seat capacity.
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <label for="fuel" class="form-label">Fuel</label>
                                        <select class="form-select" id="fuel" name="fuel" value="{{$v->fuel}}" required="">
                                            <option>{{$v->fuel}}</option>

                                            <option>Petrol</option>
                                            <option>Diesel</option>
                                            <option>Electric</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid fuel type.
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <label for="engine" class="form-label">Engine</label>
                                        <select class="form-select" id="engine" name="engine" value="{{$v->engine}}" required="">
                                            <option>{{$v->engine}}</option>

                                            <option>Manual</option>
                                            <option>Automatic</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid engine type.
                                        </div>
                                    </div>

                                    <div class="col-md-6 form-check position-relative">
                                        <input style="top:5px" class="position-absolute" type="checkbox" name="status" class="form-check-input" id="status" {{$v->status == '1' ? 'checked' : ''}}>
                                        <label class="form-check-label">Status</label>
                                    </div>

                                    <div class="col-md-6 form-check position-relative">
                                        <input style="top:5px" class="position-absolute" type="checkbox" name="trending" class="form-check-input" id="trending" {{$v->trending == '1' ? 'checked' : ''}}>
                                        <label class="form-check-label">Trending</label>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="formFile" class="form-label">Image</label>
                                        <input class="form-control" type="file" id="image" value="{{$v->image}}" name="image">
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


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
                            <th scope="col">Seat</th>
                            <th scope="col">Fuel</th>
                            <th scope="col">Engine</th>
                            <th scope="col">Status</th>
                            <th scope="col">Trending</th>
                            <th scope="col">Brand</th>
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
                            <td>{{$v->seat_capacity}}</td>
                            <td>{{$v->fuel}}</td>
                            <td>{{$v->engine}}</td>
                            <td>{{$v->status== '0' ? 'Visible':'Invisible'}}</td>
                            <td>{{$v->trending== '0' ? 'Not Trending':'Trending'}}</td>
                            <td>{{$v->brand['name']}}</td>
                            <td>
                                <a class="btn btn-sm btn-primary menu-icon" data-bs-toggle="modal" data-bs-target="#editModal-{{$v->id}}" style="color:white;">
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