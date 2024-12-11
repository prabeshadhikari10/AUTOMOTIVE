@extends('frontend.user.mainuser')
@section('content')

<main>
  <article>

    <!-- 
        - #HERO
      -->

    <section class="section hero" id="home">
      <div class="container">

        <div class="hero-content">
          <h2 class="h1 hero-title">The easy way to takeover a lease</h2>
          <!-- {{auth()->user()->id}} -->

        
        </div>

        <div class="hero-banner">

      </div>
    </section>





    <!-- 
        - #FEATURED CAR
      -->

    <section class="section featured-car" id="featured-car">
      <div class="container">

        <div class="title-wrapper">
          <h2 class="h2 section-title">Featured cars</h2>

          <a href="/explore-vehicle" class="featured-car-link">
            <span>View more</span>

            <ion-icon name="arrow-forward-outline"></ion-icon>
          </a>
        </div>


        <ul class="featured-car-list">
          @foreach($vehicle as $v)
          @if($v->user_id == Auth::id())

          @elseif($v->status==0 && $v->trending==1)
          <li>
            <div class="featured-car-card">

              <figure class="card-banner">
                <img src="{{$v->image}}" alt="carname" loading="lazy" width="440" height="300" class="w-100">
              </figure>

              <div class="card-content">

                <div class="card-title-wrapper">
                  <h3 class="h3 card-title">
                    <a href="#">{{$v->name}}</a>
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

                  <a href="/vehicle-details/{{$v->id}}">
                    <button class="btn">Rent now</button>
                  </a>

                </div>

              </div>

            </div>
          </li>
          @else
          @endif

          @endforeach

        </ul>

      </div>
    </section>


    <!-- banner -->
    <section id="banner" class="section-m1">
      <h4>Repair Service</h4>
      <h2>Up to <span>40% off</span> - All Vehicles & Accessories</h2>
      <button class="normal">Explore More</button>
    </section>





    <!-- 
        - #GET START
      -->

      <section class="section get-start">
        <div class="container">

          <h2 class="h2 section-title">Get started with 4 simple steps</h2>

          <ul class="get-start-list">

            <li>
              <div class="get-start-card">

                <div class="card-icon icon-1">
                  <ion-icon name="person-add-outline"></ion-icon>
                </div>

                <h3 class="card-title">Create a profile</h3>

                <p class="card-text">
                  If you are going to be the part of Automotive Login with few simple steps.
                </p>

              </div>
            </li>

            <li>
              <div class="get-start-card">

                <div class="card-icon icon-2">
                  <ion-icon name="car-outline"></ion-icon>
                </div>

                <h3 class="card-title">Explore Vehicles</h3>

                <p class="card-text">
                  Explore all the vehicles that are available in Automotive
                </p>

              </div>
            </li>

            <li>
              <div class="get-start-card">

                <div class="card-icon icon-3">
                  <ion-icon name="person-outline"></ion-icon>
                </div>

                <h3 class="card-title">Match with Host</h3>

                <p class="card-text">
                  Connect yourself with the host by renting their vehicles and interact with them.
                </p>

              </div>
            </li>

            <li>
              <div class="get-start-card">

                <div class="card-icon icon-4">
                  <ion-icon name="card-outline"></ion-icon>
                </div>

                <h3 class="card-title">Make a Payment</h3>

                <p class="card-text">
                  Pay for the rent with cash or through online payment.
                </p>

              </div>
            </li>

          </ul>

        </div>
      </section>






    <!-- 
        - #BLOG
      -->

    <!-- <section class="section blog" id="blog">
        <div class="container">

          <h2 class="h2 section-title">Our Blog</h2>

          <ul class="blog-list has-scrollbar">

            <li>
              <div class="blog-card">

                <figure class="card-banner">

                  <a href="#">
                    <img src="./assets/images/blog-1.jpg" alt="Opening of new offices of the company" loading="lazy" class="w-100">
                  </a>

                  <a href="#" class="btn card-badge">Company</a>

                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">
                    <a href="#">Opening of new offices of the company</a>
                  </h3>

                  <div class="card-meta">

                    <div class="publish-date">
                      <ion-icon name="time-outline"></ion-icon>

                      <time datetime="2022-01-14">January 14, 2022</time>
                    </div>

                    <div class="comments">
                      <ion-icon name="chatbubble-ellipses-outline"></ion-icon>

                      <data value="114">114</data>
                    </div>

                  </div>

                </div>

              </div>
            </li>

            <li>
              <div class="blog-card">

                <figure class="card-banner">

                  <a href="#">
                    <img src="./assets/images/blog-2.jpg" alt="What cars are most vulnerable" loading="lazy" class="w-100">
                  </a>

                  <a href="#" class="btn card-badge">Repair</a>

                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">
                    <a href="#">What cars are most vulnerable</a>
                  </h3>

                  <div class="card-meta">

                    <div class="publish-date">
                      <ion-icon name="time-outline"></ion-icon>

                      <time datetime="2022-01-14">January 14, 2022</time>
                    </div>

                    <div class="comments">
                      <ion-icon name="chatbubble-ellipses-outline"></ion-icon>

                      <data value="114">114</data>
                    </div>

                  </div>

                </div>

              </div>
            </li>

            <li>
              <div class="blog-card">

                <figure class="card-banner">

                  <a href="#">
                    <img src="./assets/images/blog-3.jpg" alt="Statistics showed which average age" loading="lazy" class="w-100">
                  </a>

                  <a href="#" class="btn card-badge">Cars</a>

                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">
                    <a href="#">Statistics showed which average age</a>
                  </h3>

                  <div class="card-meta">

                    <div class="publish-date">
                      <ion-icon name="time-outline"></ion-icon>

                      <time datetime="2022-01-14">January 14, 2022</time>
                    </div>

                    <div class="comments">
                      <ion-icon name="chatbubble-ellipses-outline"></ion-icon>

                      <data value="114">114</data>
                    </div>

                  </div>

                </div>

              </div>
            </li>

            <li>
              <div class="blog-card">

                <figure class="card-banner">

                  <a href="#">
                    <img src="./assets/images/blog-4.jpg" alt="What´s required when renting a car?" loading="lazy" class="w-100">
                  </a>

                  <a href="#" class="btn card-badge">Cars</a>

                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">
                    <a href="#">What´s required when renting a car?</a>
                  </h3>

                  <div class="card-meta">

                    <div class="publish-date">
                      <ion-icon name="time-outline"></ion-icon>

                      <time datetime="2022-01-14">January 14, 2022</time>
                    </div>

                    <div class="comments">
                      <ion-icon name="chatbubble-ellipses-outline"></ion-icon>

                      <data value="114">114</data>
                    </div>

                  </div>

                </div>

              </div>
            </li>

            <li>
              <div class="blog-card">

                <figure class="card-banner">

                  <a href="#">
                    <img src="./assets/images/blog-5.jpg" alt="New rules for handling our cars" loading="lazy" class="w-100">
                  </a>

                  <a href="#" class="btn card-badge">Company</a>

                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">
                    <a href="#">New rules for handling our cars</a>
                  </h3>

                  <div class="card-meta">

                    <div class="publish-date">
                      <ion-icon name="time-outline"></ion-icon>

                      <time datetime="2022-01-14">January 14, 2022</time>
                    </div>

                    <div class="comments">
                      <ion-icon name="chatbubble-ellipses-outline"></ion-icon>

                      <data value="114">114</data>
                    </div>

                  </div>

                </div>

              </div>
            </li>

          </ul>

        </div>
      </section> -->

  </article>
</main>




@endsection