@extends('frontend.user.dashboard.layout.user')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Rating
                <a href="/user-rating" class="btn float-end text-white" style="background-color: #39b779;">Back</a>
                </h3>
            </div>


            <div class="container mt-3 mb-3 table-responsive">
                <table class="table table-fluid" id="myTable">
                    <thead style="background-color: #39b779;">
                        <tr class="text-white">
                            <th scope="col">S.N.</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Feedback</th>
                            <th scope="col">Username</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rating as $r)
                        <tr>
                            <td>{{$i}}</td>
                            @if($r->rating==null)
                            <td class="text-danger">no rating</td>
                            @else
                            <td>{{$r->rating}}</td>
                            @endif
                            @if($r->feedback==null)
                            <td class="text-danger">no feedback</td>
                            @else
                            <td>{{$r->feedback}}</td>
                            @endif
                            <td>{{$r->user['name']}}</td>
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