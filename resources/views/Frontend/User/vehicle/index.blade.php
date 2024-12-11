@extends('frontend.user.mainuser')
@section('content')
<style>
  /* rating  */
  .rate {

    border-bottom-right-radius: 12px;
    border-bottom-left-radius: 12px;
  }

  .rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: center
  }

  .rating>input {
    display: none
  }

  .rating>label {
    position: relative;
    width: 1em;
    font-size: 30px;
    font-weight: 300;
    color: #f0dc08;
    cursor: pointer
  }

  .rating>label::before {
    content: "\2605";
    position: absolute;
    opacity: 0
  }

  .rating>label:hover:before,
  .rating>label:hover~label:before {
    opacity: 1 !important
  }

  .rating>input:checked~label:before {
    opacity: 1
  }

  .rating:hover>input:checked~label:before {
    opacity: 0.4
  }

  .buttons {
    position: relative;
    background-color: #39b779;
  }
</style>

<div style=" position:fixed; width:100%; margin-top:70px; background:white; z-index:1; ">
  <div class="searchcontainer mx-auto py-4" style=" display:flex; justify-content:space-between; align-items:center;max-width:1140px; width:100%">
    <form class="search-form" style="width:100%; display:flex;">
      <input type="text" id="searchInput" onkeyup="searchFunction()" placeholder="Search for a vehicle.." style="border-bottom:2px solid gray; width:100%; background:transparent;">
      <form action="" style="display:flex; justify-content:space-between;">
        <select class="form-select" id="filter" name="filter" required="" value="{{$filter}}" style="margin-left: 1.5rem; border:none; outline:none; background:transparent; border-bottom:2px solid gray; color:gray;">
          <option disabled selected>Type</option>
          <option>2 wheelers</option>
          <option>4 wheelers</option>
        </select>
        <select class="form-select" id="filter" name="filter" required="" value="{{$filter}}" style="margin-left: 1.5rem; border:none; outline:none; background:transparent; border-bottom:2px solid gray; color:gray;">
          <option disabled selected>need driver</option>
          <option>With Driver</option>
          <option>Without Driver</option>
        </select>
        <button style="margin-left: 1rem;"><ion-icon name="search-outline" style="font-size: 25px; color:#39b779;"></ion-icon></button>
        <a href="/explore-vehicle" style="margin-left:8px;">
          <button><ion-icon name="reload-outline" style="font-size: 25px; color:#39b779;"></ion-icon></button>
        </a>
      </form>
    </form>


  </div>
</div>







<section class="section featured-car" id="featured-car">
  <div class="container" style="margin-top: 90px;">

    <div class="title-wrapper">
      <h2 class="h2 section-title">Rent Vehicle of Your Choice</h2>
    </div>

    <ul class="featured-car-list">
      @foreach($vehicle as $v)
      <!-- Modal -->
      <div class="modal fade" id="exampleModal-{{$v->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top:80px;">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Rating and Feedback</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/vehicle-rating/{{$v->id}}" method="post">
              @csrf
              <div class="modal-body" style="background: #fff; border-radius:20px;">
                <div class="rate py-3 text-white mt-3">
                  <div class="rating"> <input type="radio" name="rating" value="5" id="{{$v->id}}5"><label for="{{$v->id}}5">☆</label> <input type="radio" name="rating" value="4" id="{{$v->id}}4"><label for="{{$v->id}}4">☆</label> <input type="radio" name="rating" value="3" id="{{$v->id}}3"><label for="{{$v->id}}3">☆</label> <input type="radio" name="rating" value="2" id="{{$v->id}}2"><label for="{{$v->id}}2">☆</label> <input type="radio" name="rating" value="1" id="{{$v->id}}1"><label for="{{$v->id}}1">☆</label>
                  </div>
                  <input style="border-bottom: 2px solid gray; padding: 5px 3px; outline: none;" type="text" name="feedback" placeholder="Give Feedback">
                  <!-- <div class="buttons px-4 mt-3 border d-flex justify-content-center align-items-center" style="border-radius: 20px;"> -->
                  <button class="modal-rating py-2 mt-3" style="color: white; background:#39b779; width: 100%; border-radius: 20px; border:none; outline:none;">Submit</button>
                  <!-- </div> -->
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      @if($v->status==1 || $v->user_id == Auth::id())

      @else
      <li class="filtercar">
        <div class="featured-car-card shadow">

          <figure class="card-banner">
            <img src="{{$v->image}}" alt="carname" loading="lazy" width="440" height="300" class="w-100">
          </figure>

          <div class="card-content">

            <div class="card-title-wrapper">
              <h3 class="h3 card-title">
                <a href="/vehicle-details/{{$v->id}}" style="text-decoration: none;">{{$v->name}}</a>
              </h3>

              <data class="year" value="2021">{{$v->category['name']}}</data>
            </div>

            <ul class="card-list">

              <li class="card-list-item">
                <ion-icon name="disc-outline"></ion-icon>

                <span class="card-item-text">{{$v->wheels}}</span>
              </li>

              <li class="card-list-item">
                <ion-icon name="flash-outline"></ion-icon>

                <span class="card-item-text">{{$v->fuel}}</span>
              </li>

              <li class="card-list-item">
                <ion-icon name="globe-outline"></ion-icon>

                <span class="card-item-text">{{$v->brand}}</span>
              </li>

              <li class="card-list-item">
                <ion-icon name="location-outline"></ion-icon>

                <span class="card-item-text">{{$v->location}}</span>
              </li>

            </ul>

            <div class="card-price-wrapper">

              <p class="card-price">
                <strong>{{$v->price}}</strong> / day
              </p>

              <button type="button" class="btn fav-btn" data-toggle="modal" data-target="#exampleModal-{{$v->id}}" aria-label="Add to favourite list">
                <ion-icon name="star-outline"></ion-icon>
              </button>

              <a href="/vehicle-details/{{$v->id}}">
                <button class="btn">Rent now</button>
              </a>

            </div>

          </div>

        </div>
      </li>
      @endif

      @endforeach

    </ul>


  </div>
</section>

<script>
  function searchFunction() {
    var input, filter, li, cardTitle, cardBrand, cardLocation, i;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    li = document.getElementsByClassName("filtercar");
    for (i = 0; i < li.length; i++) {
      cardTitle = li[i].getElementsByClassName("card-title")[0];
      cardBrand = li[i].getElementsByClassName("card-item-text")[2];
      cardLocation = li[i].getElementsByClassName("card-item-text")[3];
      if (cardTitle && cardBrand && cardLocation) {
        if (cardTitle.innerText.toUpperCase().indexOf(filter) > -1 ||
          cardBrand.innerText.toUpperCase().indexOf(filter) > -1 ||
          cardLocation.innerText.toUpperCase().indexOf(filter) > -1) {
          li[i].style.display = "";
        } else {
          li[i].style.display = "none";
        }
      }
    }
  }
</script>


@endsection