@extends('admin.dashboard.layout.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Rent History</h3>
            </div>

            @foreach($booking as $b)
            <div class="modal" tabindex="-1" id="mapopen" style="margin-top:50px;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Pickup and Dropoff Location</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="map-container">
                                <div id="map" style="height:400px; width: auto;"></div>
                            </div>
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
                            <th scope="col">Booker Name</th>
                            <th scope="col">Vehicle Name</th>
                            <th scope="col">Owner Name</th>
                            <th scope="col">Pickup and Dropoff</th>
                            <th scope="col">From</th>
                            <th scope="col">Until</th>
                            <th scope="col">No. of day</th>
                            <th scope="col">Status</th>
                            <th scope="col">Payment</th>
                            <th scope="col">Price</th>
                            <th scope="col">Total Price</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($booking as $b)
                        @if($b->status=='completed' || $b->status=='rejected' || $b->status=='canceled')
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$b->user['name']}}</td>
                            <td>{{$b->vehicle['name']}}</td>
                            <td>{{$b->vehicle->user['name']}}</td>
                            <td>
                                <button onclick="initMap({{$b->pick_drop}})" data-bs-toggle="modal" data-bs-target="#mapopen" class="btn btn-primary menu-icon addMore" title="show in map" style="color:white;">
                                    <i class="fa-solid fa-location-dot"></i>
                                </button>

                            </td>
                            <td>{{$b->from_date}}</td>
                            <td>{{$b->to_date}}</td>
                            <td>{{$b->booking_day}}</td>
                            @if($b->status =='completed')
                            <td>
                                <span style="padding: 3px 8px; border-radius: 10px;background-color:#39b779; color: #fff ">{{$b->status}}</span>
                            </td>
                            @elseif($b->status =='rejected')
                            <td>
                                <span style="padding: 3px 8px; border-radius: 10px;background-color:#f94449; color: #fff ">{{$b->status}}</span>
                            </td>
                            @else
                            <td>
                                <span style="padding: 3px 8px; border-radius: 10px;background-color:#e6cc00; color: #fff ">{{$b->status}}</span>
                            </td>
                            @endif

                            @if($b->status=='rejected')
                            <td>
                                <span style="padding: 3px 8px; border-radius: 10px;background-color:#f94449; color: #fff ">rejected</span>
                            </td>
                            @elseif($b->status=='canceled')
                            <td>
                                <span style="padding: 3px 8px; border-radius: 10px;background-color:#e6cc00; color: #fff ">{{$b->status}}</span>
                            </td>
                            @elseif($b->payment=='paid')
                            <td>
                                <span style="padding: 3px 8px; border-radius: 10px;background-color:#39b779; color: #fff ">{{$b->payment}}</span>
                            </td>
                            @else
                            <td>
                                <span style="padding: 3px 8px; border-radius: 10px;background-color:#f94449; color: #fff ">{{$b->payment}}</span>
                            </td>
                            @endif


                            <td>Rs. {{$b->price}}</td>
                            <td>Rs. {{$b->total_price}}</td>

                            <?php
                            $i++;
                            ?>
                        </tr>
                        @else
                        @endif
                        <script>
                            function initMap(picklat, picklng) {
                                var coord = {
                                    lat: picklat,
                                    lng: picklng
                                };

                                var map = new google.maps.Map(
                                    document.getElementById("map"), {
                                        zoom: 15,
                                        center: coord,
                                        scrollwheel: true,
                                    }
                                );

                                new google.maps.Marker({
                                    position: coord,
                                    map: map
                                })
                            }

                            const pickDrop = "{{$b->pick_drop}}".replace('[', '').replace(']', '').split(',');
                            const picklat = parseFloat(pickDrop[0].trim());
                            const picklng = parseFloat(pickDrop[1].trim());
                        </script>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAi8hZEBidJfVDVAq__019GWzVjNH2hyHY&callback=initMap" type="text/javascript"></script>

@endsection