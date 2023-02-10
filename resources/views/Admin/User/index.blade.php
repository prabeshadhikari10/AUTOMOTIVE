@extends('admin.dashboard.layout.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Users
                </h3>
            </div>




            <div class="container mt-3 mb-3 table-responsive">
                <table class="table table-fluid" id="myTable">
                    <thead style="background-color: #39b779;">
                        <tr class="text-white">
                            <th scope="col">S.N.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $u)
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
                            <td class="text-danger">unverified</td>
                            @else
                            <td class="text-success">verified</td>
                            @endif
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