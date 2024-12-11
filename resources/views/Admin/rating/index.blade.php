@extends('admin.dashboard.layout.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Rating
                </h3>
            </div>


            <div class="container mt-3 mb-3 table-responsive">
                <table class="table table-fluid" id="myTable">
                    <thead style="background-color: #39b779;">
                        <tr class="text-white">
                            <th scope="col">S.N.</th>
                            <th scope="col">Vehicle</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rating as $i => $r)
                        <tr>
                            <td>{{$i+1}}</td>
                            <td>{{$r->vehicle->name}}</td>
                            <td>{{$r->average_rating}}</td>
                            <td>
                                <a href="rating-detail/{{$r->vehicle_id}}">
                                    <button class="btn btn-primary text-white py-2">See more</button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection