@extends('admin.dashboard.layout.admin')

@section('content')

<div class="row">
  <div class="col-md-12 grid-margin" style="display:flex; justify-content:center; align-items:center;">
    <div class="col-md-8 order-md-1" style="box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2); border-radius:15px; width:95%; height:78vh;  padding:30px; background-color:#f8f9fa;">
      <h2 class="ml-3">Admin Dashboard</h2>
      <div class="d-flex justify-content-between align-items-center mt-5 text-white">
        <div class="d-flex justify-content-between align-items-center  ml-3 p-5 center shadow-lg bg-danger" style="width: 250px; height: 150px; border-radius:20px;">
          <span style="font-size: 60px; display:flex; flex-direction:column; justify-content:center; align-items:center;">
          <span style="font-size: 40px;"><i class="fa-solid fa-user"></i></span>
        <span style="font-size: 17px;">Users</span>
        </span>
          <span style="font-size: 60px;">{{$users}}</span>
        </div>
        <div class="d-flex justify-content-between align-items-center ml-5 p-5 center shadow-lg bg-primary" style="width: 250px; height: 150px; border-radius:20px;">
          <span style="font-size: 60px; display:flex; flex-direction:column; justify-content:center; align-items:center;"><span style="font-size: 40px;"><i class="fa-solid fa-user-check"></i></span><span style="font-size: 17px;">Verified User</span></span>
          <span style="font-size: 60px;">{{$user1}}</span>
        </div>
        <div class="d-flex justify-content-between align-items-center ml-3 p-5 center shadow-lg bg-warning" style="width: 250px; height: 150px; border-radius:20px;">
          <span style="font-size: 60px; display:flex; flex-direction:column; justify-content:center; align-items:center;"><span><i class="fa-solid fa-bicycle"></i></span><span style="font-size: 17px;">Rent</span></span>
          <span style="font-size: 60px;">{{$booking}}</span>
        </div>
        <div class="d-flex justify-content-between align-items-center ml-3 p-5 mr-3 center shadow-lg bg-success" style="width: 250px; height: 150px; border-radius:20px;">
          <span style="font-size: 60px; display:flex; flex-direction:column; justify-content:center; align-items:center;"><span><i class="fa-solid fa-car"></i></span><span style="font-size: 17px;">Vehicle</span></span>
          <span style="font-size: 60px;">{{$vehicle}}</span>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection