@extends('frontend.user.dashboard.layout.user')

@section('content')

<section class="vh-90">
    <div class="container h-90">
        <div class="row d-flex justify-content-center align-items-center h-90">
            <div class="col-md-12 col-xl-4">

                <div class="card" style="box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2); border-radius: 15px;">
                    <div class="card-body text-center">
                        @if ($user->profile==null)
                        <div class="mt-3 mb-4">
                            <img src="/user_image/user.jpg" class="rounded-circle img-fluid" style="width: 90px; height: 90px;" />
                        </div>
                        @else
                        <div class="mt-3 mb-4">
                            <img src="{{$user->profile}}" class="rounded-circle img-fluid" style="width: 90px; height: 90px;" />
                        </div>
                        @endif

                        @if ($user->status==1)
                        <h4 class="mb-2" style="display: flex; align-items:center; justify-content:center;">
                            <span>{{$user->name}}</span>
                            <span class="material-symbols-rounded addMore" title="verified user" style="font-size: 25px; color:#39b779">verified</span>
                        </h4>
                        @elseif ($user->status==2)
                        <h4 class="mb-2" style="display: flex; align-items:center; justify-content:center;">
                            <span>{{$user->name}}</span>
                            <span class="material-symbols-rounded addMore" title="semi-verified user" style="font-size: 25px; color:gray">verified</span>
                        </h4>
                        @else
                        <h4 class="mb-2">{{$user->name}}</h4>
                        @endif

                        @if ($user->role==1)
                        <div style="display:flex; justify-content:center;">
                            <p class="mb-4 text-white" style="padding: 3px 8px; border-radius: 10px;background-color:#39b779;">Admin</p>
                            <span class="mx-2">|</span>
                            <span> {{$user->email}}</span>
                            </div>
                            <div class="mb-4 pb-2">
                            @else
                            <div style="display:flex; justify-content:center;">
                                <p class=" mb-4 text-white" style="padding: 3px 8px; border-radius: 10px;background-color:#39b779; ">User</p>
                                <span class="mx-2">|</span>
                                <p>{{$user->email}}</p>
                            </div>
                            <div class="mb-4 pb-2">
                                @endif

                                @if ($user->bio==null)
                                <p class="text-muted mb-4">Bio hasnot been set</p>
                                <div class="mb-4 pb-2">
                                    @else
                                    <p class="text-muted mb-4">{{$user->bio}}</p>
                                    <div class="mb-4 pb-2">
                                        @endif

                                        <button type="button" class="btn btn-outline-primary btn-floating">
                                            <i class="fab fa-facebook-f fa-lg"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-primary btn-floating">
                                            <i class="fab fa-twitter fa-lg"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-primary btn-floating">
                                            <i class="fab fa-instagram fa-lg"></i>
                                        </button>
                                    </div>
                                    <a href="/edit-user-profile/{{$user->id}}" type="button" class="btn btn-primary btn-rounded btn-lg text-white">
                                        Update Profile
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
</section>

@endsection