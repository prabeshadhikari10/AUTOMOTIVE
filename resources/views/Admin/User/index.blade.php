@extends('admin.dashboard.layout.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Users
                </h3>
            </div>

            @foreach($users as $u)
            <div style="position: fixed; top:10rem;" class="modal" tabindex="-1" id="userblock-{{$u->id}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="font-size: 1.5rem; display: flex; flex-direction:column; justify-content: center; align-items: center;">
                            <i class="fa-solid fa-ban text-danger" style="font-size: 1.5rem;"></i>
                            <p class="mt-2" style="font-size: 1.1rem;">Do you want to block this user?</p>
                        </div>
                        <div class="modal-footer" style=" display: flex; justify-content: center; align-items: center;">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <a href="/block-user/{{$u->id}}" type="button" class="btn btn-danger text-white">Block</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            @foreach($users as $u)
            <div style="position: fixed; top:10rem;" class="modal" tabindex="-1" id="userunblock-{{$u->id}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="font-size: 1.5rem; display: flex; flex-direction:column; justify-content: center; align-items: center;">
                            <i class="fa-solid fa-check" style="font-size: 1.5rem; color:#39b779;"></i>
                            <p class="mt-2" style="font-size: 1.1rem;">Do you want to unblock this user?</p>
                        </div>
                        <div class="modal-footer" style=" display: flex; justify-content: center; align-items: center;">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <a href="/unblock-user/{{$u->id}}" type="button" class="btn btn-primary text-white">Unblock</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach




            <div class="container mt-3 mb-3 table-responsive">
                <table class="table table-fluid" id="myTable">
                    <thead style="background-color: #39b779;">
                        <tr class="text-white">
                            <th scope="col">S.N.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $u)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$u->name}}</td>
                            <td>{{$u->email}}</td>
                            @if ($u->role==1)
                            <td class="text-primary">Admin</td>
                            @else
                            <td class="text-info">User</td>
                            @endif
                            @if ($u->status==0)
                            <td>
                                <span style="padding: 3px 8px; border-radius: 10px;background-color:#DC0000; color: #fff ">unverified</span>
                            </td>
                            @elseif($u->status==1)
                            <td>
                                <span style="padding: 3px 8px; border-radius: 10px;background-color:#39b779; color: #fff ">verified</span>
                            </td>
                            @else
                            <td>
                                <span style="padding: 3px 8px; border-radius: 10px;background-color:#39b779; color: #fff ">semi-verified</span>
                            </td>
                            @endif
                            <td>
                                @if ($u->block==0)
                                <a data-bs-toggle="modal" data-bs-target="#userblock-{{$u->id}}" class="btn btn-sm btn-danger menu-icon addMore" type="button" title="Block" style="color:white;">
                                    <i class="fa-solid fa-ban"></i>
                                </a>
                                @else
                                <a data-bs-toggle="modal" data-bs-target="#userunblock-{{$u->id}}" class="btn btn-sm btn-primary menu-icon addMore" type="button" title="Unblock" style="color:white;">
                                    <i class="fa-solid fa-check"></i>
                                </a>
                                @endif
                            </td>
                            <?php
                            $i++;
                            ?>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection