@extends('frontend.user.dashboard.layout.user')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin" style="display:flex; justify-content:center; align-items:center;">
        <div class="col-md-8 order-md-1" style="box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2); border-radius:15px; width:95%;  padding:30px; background-color:#f8f9fa;">
            <h3 class="mb-3 text-center">Edit Vehicle</h3>
            <form action="/host-update-vehicle/{{$vehicle->id}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Vehicle name" value="{{$vehicle->name}}" required="">
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="fuel" class="form-label">Fuel</label>
                        <select class="form-select" id="fuel" name="fuel" required="">
                            <option>{{$vehicle->fuel}}</option>
                            <option>Petrol</option>
                            <option>Diesel</option>
                            <option>Electric</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid fuel type.
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="engine" class="form-label">Engine Type</label>
                        <select class="form-select" id="engine" name="engine" required="">
                            <option>{{$vehicle->engine}}</option>
                            <option>Manual</option>
                            <option>Automatic</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid engine type.
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="vehicleno">Vehicle Number</label>
                        <input type="text" class="form-control" id="vehicle_no" name="vehicle_no" placeholder="Enter your vehicle number" value="{{$vehicle->vehicle_no}}" required="">
                        <div class="invalid-feedback">
                            Valid vehicle number is required.
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Price per day" value="{{$vehicle->price}}" required="">
                        <div class="invalid-feedback">
                            Valid price is required.
                        </div>
                    </div>
                    <div class="col-md-2 mb-4">
                        <label for="seat_capacity" class="form-label">Type</label>
                        <select class="form-select" id="wheels" name="wheels" required="">
                            <option>{{$vehicle->wheels}}</option>
                            <option>2 wheelers</option>
                            <option>4 wheelers</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid wheel type.
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" name="category_id" id="category_id" value="{{$vehicle->category_id}}">
                            @foreach($category as $c)
                            <option value="{{$c->id}}" {{ $c->id == $vehicle->category_id ? 'selected' : '' }}>{{$c->name}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Valid category is required.
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <label for="name">Brand</label>
                        <input type="text" class="form-control" id="brand" name="brand" placeholder="Brand Name" value="{{$vehicle->brand}}" required="">
                        <div class="invalid-feedback">
                            Valid brand is required.
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <label for="name">Location</label>
                        <input type="text" class="form-control" id="loaction" name="location" value="{{$vehicle->location}}" required="">
                        <div class="invalid-feedback">
                            Valid location is required.
                        </div>
                    </div>
                    <div class="col-md-2 mb-4 form-check" style="margin-top: 2.5rem; margin-left:3rem;">
                        <input class="form-check-input" type="checkbox" id="flexCheckChecked" name="status" {{$vehicle->status == '1' ? 'checked' : ''}}>
                        <label class="form-check-label" for="flexCheckChecked">
                            Unavailable
                        </label>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Vehicle Description" value="{{$vehicle->description}}" required="">
                        <div class="invalid-feedback">
                            Valid description is required.
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <label for="formFile" class="form-label">Vehicle Image</label>
                        @if($vehicle->image)
                        <img src="{{ asset($vehicle->image) }}" alt="Vehicle Image" width="20" height="20" style="border-radius: 50%;"><br>
                        @endif
                        <input class="form-control border-0 outline-none" type="file" id="image" name="image" value="{{ old('image', asset($vehicle->image)) }}">
                        <input type="hidden" name="old_image" value="{{ $vehicle->image }}">
                    </div>
                    <div class="col-md-3 mb-4">
                        <label for="driver_stat" class="form-label">Driver Status</label>
                        <select class="form-select" id="driver_stat" name="driver_stat" required="">
                            <option>{{$vehicle->driver_stat}}</option>
                            <option>With Driver</option>
                            <option>Without Driver</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid driver status.
                        </div>
                    </div>

                </div>

                <hr class="mb-4">
                <button class="btn btn-primary text-white btn-lg btn-block" type="submit">Submit</button>
                <a href="/My-Vehicle" class="btn btn-danger text-white btn-lg btn-block" type="submit">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection