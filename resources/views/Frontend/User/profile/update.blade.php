@extends('frontend.user.dashboard.layout.user')

@section('content')

<div class="row">

    <div class="col-md-12 grid-margin" style="display:flex; justify-content:center; align-items:center;">

        <div class="col-md-8 order-md-1" style="box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2); border-radius:15px; width:45%;  padding:30px; background-color:#f8f9fa;">
            <h3 class="mb-3 text-center">Update Profile</h3>
            <hr>
            <form action="/update-user-profile/{{$user->id}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <label for="firstname">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter your name" value="{{$user->name}}" required="">
                        <div class="invalid-feedback">
                            Valid Name is required.
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <label for="middlename">Bio</label>
                        <textarea class="form-control" name="bio" id="bio" rows="3"></textarea>

                        <!-- <input type="text" class="form-control" id="mname" name="mname" placeholder="Middle Name" value="" required=""> -->
                        <div class="invalid-feedback">
                            Valid bio is required.
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        @if ($user->profile)
                        <img src="{{ asset($user->profile) }}" alt="Profile Image" height="100px" width="100px" style="border-radius: 50%;">
                        @endif
                        <label for="formFile" class="form-label">Update your Profile</label>
                        <input type="hidden" name="old_profile" value="{{ $user->profile }}">

                        <input class="form-control border-0 outline-none" type="file" id="profile" name="profile">
                    </div>

                    <div class="invalid-feedback">
                        Please select a valid image.
                    </div>
                </div>

        <hr class="mb-4">
        <button class="btn btn-primary text-white btn-lg btn-block" type="submit">Submit</button>
        </form>
    </div>

</div>
</div>

@endsection