@extends('frontend.user.dashboard.layout.user')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">My Earnings</h3>
            </div>



            <div class="container mt-3 mb-3 table-responsive">
                <table class="table table-fluid" id="myTable">
                    <thead style="background-color: #39b779;">
                        <tr class="text-white">
                            <th scope="col">S.N.</th>
                            <th scope="col">Booker Name</th>
                            <th scope="col">Vehicle Name</th>
                            <th scope="col">Payer Name</th>
                            <th scope="col">Total Amount</th>
                            <th scope="col">Comission Amount</th>
                            <th scope="col">Release Amount</th>
                            <th scope="col">Paid At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payment as $p)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$p->booking->user['name']}}</td>
                            <td>{{$p->booking->vehicle['name']}}</td>
                            <td>{{$p->payer_name}}</td>
                            <td>Rs. {{$p->amount}}</td>
                            <td>Rs. {{$p->comission_amount}}</td>
                            <td>Rs. {{$p->release_amount}}</td>
                            <td>{{$p->paid_at}}</td>
                            

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



<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">My Payment</h3>
            </div>



            <div class="container mt-3 mb-3 table-responsive">
                <table class="table table-fluid" id="myTable1">
                    <thead style="background-color: #39b779;">
                        <tr class="text-white">
                            <th scope="col">S.N.</th>
                            <th scope="col">Owner Name</th>
                            <th scope="col">Vehicle Name</th>
                            <th scope="col">Owner Phone</th>
                            <th scope="col">Payer Name</th>
                            <th scope="col">Total Amount</th>
                            <th scope="col">Comission Amount</th>
                            <th scope="col">Release Amount</th>
                            <th scope="col">Paid At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payment1 as $a)
                        <tr>
                            <td>{{$c}}</td>
                            <td>{{$a->booking->vehicle->user['name']}}</td>
                            <td>{{$a->booking->vehicle['name']}}</td>
                            @if($a->phone==null)
                            <td>admin</td>
                            @else
                            <td>{{$a->phone}}</td>
                            @endif
                            <td>{{$a->payer_name}}</td>
                            <td>Rs. {{$a->amount}}</td>
                            <td>Rs. {{$a->comission_amount}}</td>
                            <td>Rs. {{$a->release_amount}}</td>
                            <td>{{$a->paid_at}}</td>
                            

                            <?php
                            $c++;
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