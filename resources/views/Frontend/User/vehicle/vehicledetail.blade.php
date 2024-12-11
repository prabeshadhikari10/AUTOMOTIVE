<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AutoMotive</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="/favicon.svg" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->

  <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">


  <link rel="stylesheet" href="/assets/css/landing.css">


  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Open+Sans&display=swap" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

    * {
      font-family: 'Poppins', sans-serif;
    }

    #myAlert {
      z-index: 1000000;
      position: fixed;
      top: 60px;
      right: 20px;
    }
  </style>
</head>

<body>

  @if(session()->has('message'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert" id="myAlert">
    <strong>{{ session('message') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  @if(session()->has('message1'))
  <div class="alert alert-success alert-dismissible fade show" role="alert" id="myAlert">
    <strong>{{ session('message1') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif



  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top:50px;">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Select Pickup and Dropoff Location</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="map" style="height:400px; width:auto;"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="comment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top:50px; height:500px;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">See Reviews</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @foreach($rating as $r)
        @if($r->feedback)
        <div class="modal-body">
          @if ($r->user->profile==null)
          <div style="width:100%;">
            <div style="display:flex; justify-content:start; align-items:center;">
              <img src="/user_image/user.jpg" alt="profile" style="width: 40px; height:40px; border-radius:20px;">
              <span class="ml-3">{{$r->user->name}}</span>
            </div>
            <span style="margin-left: 58px;">{{$r->feedback}}</span>
            <hr>
          </div>
          @else
          <div style="width:100%; margin-top:0px;">
            <div style="display:flex; justify-content:start; align-items:center;">
              <img src="{{$r->user->profile}}" alt="profile" style="width: 40px; height:40px; border-radius:20px;">
              <span class="ml-3">{{$r->user->name}}</span>
            </div>
            <span style="margin-left: 58px;">{{$r->feedback}}</span>
            <hr>
          </div>
          @endif
        </div>
        @endif
        @endforeach
      </div>
    </div>
  </div>



  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <div class="overlay" data-overlay></div>

      <a href="javascript:location.reload(true)" class="logo">
        <img src="/assets/images/logo.png" style="width: 55px;" alt="automotive logo">
      </a>

      <nav class="navbar" data-navbar>
        <ul class="navbar-list">

          <li>
            <a href="/userpage" class="navbar-link" data-nav-link>Home</a>
          </li>

          <li>
            <a href="/explore-vehicle" class="navbar-link" data-nav-link>Explore</a>
          </li>

          <li>
            <a href="/trending-vehicle" class="navbar-link" data-nav-link>Featured Vehicles</a>
          </li>

          <li>
            <a href="/user-dashboard" class="navbar-link" data-nav-link>My Profile</a>
          </li>
          <li>
            <a href="/show-checkout" class="navbar-link" data-nav-link>My Bookings</a>
          </li>

        </ul>
      </nav>

      <div class="header-actions">

        <div class="header-contact">
          <a href="tel:9819370064" class="contact-link">9812345678</a>

          <span class="contact-time">Sun - Fri: 10:00 am - 6:00 pm</span>
        </div>

        <!-- <button class="btn" type="button" data-toggle="modal" data-target="#exampleModal" aria-labelledby="aria-label-txt"> Become a Host
        </button> -->

        <!-- Button trigger modal -->
        <!-- Button trigger modal -->
        <!-- <a data-bs-toggle="modal" data-bs-target="#userblock" class="btn btn-sm btn-danger menu-icon addMore" type="button" title="Block" style="color:white;">
          <i class="fa-solid fa-ban"></i>
        </a> -->









        <div class="dropdown show">
          <!-- <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown link
          </a> -->
          <a href="#" class="btn user-btn dropdown-toggle" aria-label="Profile" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:35px; height:35px; position:relative; border-radius:20px;">

            @if ($user->profile==null)
            <img src="/user_image/user.jpg" alt="profile" style="width: 100px; height:40px; position:absolute; border-radius:20px;">
            @else
            <img src="{{$user->profile}}" alt="profile" style="width: 40px; height:40px; position:absolute; border-radius:20px;">
            @endif
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="/user-dashboard" style="display: flex; align-items:center;">
              <span style="font-size: 20px;"><ion-icon name="person-outline"></ion-icon></span>
              <span class="ml-2">My Profile</span>
            </a>
            <hr>
            <a class="dropdown-item" href="/My-Vehicle" style="display: flex; align-items:center;">
              <span style="font-size: 20px;"><ion-icon name="car-outline"></ion-icon></span>
              <span class="ml-2">Become a Host</span>
            </a>
            <hr>
            <a class="dropdown-item" href="/show-checkout" style="display: flex; align-items:center;">
              <span style="font-size: 20px;"><ion-icon name="Bookmark-outline"></ion-icon></span>
              <span class="ml-2">My Bookings</span>
            </a>
            <hr>
            <a class="dropdown-item" href="/logout" style="display: flex; align-items:center;">
              <span style="font-size: 20px;"><ion-icon name="log-out-outline"></ion-icon></span>
              <span class="ml-2">Logout</span>
            </a>
          </div>
        </div>




        <button class="nav-toggle-btn" data-nav-toggle-btn aria-label="Toggle Menu">
          <span class="one"></span>
          <span class="two"></span>
          <span class="three"></span>
        </button>

      </div>

    </div>
  </header>




  <form action="/create-booking/{{$vehicle->id}}" method="post">
    @csrf
    <section class="text-gray-600 body-font overflow-hidden">
      <div class="container mb-5 py-10 bg-white shadow" style="border-radius: 10px; width:70%; margin-top:70px;">
        <div class="lg:w-4/5  flex flex-wrap mx-auto" style=" width:90%;">
          <img alt="vehicle" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="{{$vehicle->image}}">
          <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
            <h2 class="text-sm title-font text-gray-500 tracking-widest">{{$vehicle->brand}}</h2>
            <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{$vehicle->name}}</h1> 

              <div  style="display:flex; justify-content:start; align-items:center;">
                <p class="leading-relaxed mr-2" style="font-size: 18px; font-weight:500;">Owner: {{$vehicle->user['name']}}</p>
                <span class="mr-2">|</span>
                <span style="padding: 3px 8px; border-radius: 10px;background-color:gray; color: #fff; display:flex; justify-content:center; align-items:center; ">{{$vehicle->driver_stat}}</span>
              </div>



          <div class="mb-4" style="display:flex; justify-content:start; align-items:center;">
            <span class="flex items-center">

              <span class="text-gray-600 mr-1">
                {{$aggregate}}
              </span>
              <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24" style="color:#39b779;">
                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
              </svg>
            </span>
            <button type="button" class="btn ml-5 rounded" data-toggle="modal" data-target="#comment" style="width: 150px; font-size:16px;">
              See Reviews
            </button>

          </div>


          <p class="leading-relaxed">{{$vehicle->description}}</p>
          <p class="leading-relaxed">Engine Type: {{$vehicle->engine}} / Fuel: {{$vehicle->fuel}} / {{$vehicle->seat_capacity}} seats</p>

          <div date-rangepicker class="flex items-center">
            <div class="relative">
              <input name="from_date" id="start-date" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+2 week')); ?>" onchange="updateEndDateMin()">
            </div>
            <span class="mx-4 text-gray-500">to</span>
            <div class="relative">
              <input name="to_date" id="end-date" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end" max="<?php echo date('Y-m-d', strtotime('+1 month')); ?>">
            </div>
          </div>

          <div class="col-5">
            <input type="text" class="form-control" placeholder="pickup" name="pick_drop" id="pick_drop" style="display:none;">
          </div>

          <button type="button" class="btn mt-4 rounded" data-toggle="modal" data-target="#exampleModal" style="width: 300px; font-size:16px;">
            Select Pickup & Dropoff Location
          </button>


          <hr class="mt-4 mb-4">
          <div class="flex">
            <span class="title-font font-medium text-2xl mr-4 text-gray-900">Rs. {{$vehicle->price}}/day</span>
            <button class="flex ml-28 text-white border-0 py-2 px-6 focus:outline-none rounded" type="submit" style="background-color:#39b779;">Rent Now</button>


            </button>
          </div>
        </div>
      </div>
      </div>
    </section>

  </form>



  <footer class="footer">
    <div class="container">

      <div class="footer-top">

        <div class="footer-brand">
          <a href="#" class="logo">
            <img src="/assets/images/logo.png" style="width: 60px;" alt="Automotive logo">
          </a>

          <p class="footer-text">
            Search for cheap rental cars in Dharan. With a diverse fleet of 1,000 vehicles, AutoMotive offers its
            consumers an
            attractive and fun selection.
          </p>
        </div>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Company</p>
          </li>

          <li>
            <a href="/userpage" class="footer-link"></a>home
          </li>

          <li>
            <a href="/explore-vehicle" class="footer-link">Explore</a>
          </li>

          <li>
            <a href="/trending-vehicle" class="footer-link">Featured Vehicles</a>
          </li>

          <li>
            <a href="/checkout" class="footer-link">checkout</a>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Support</p>
          </li>

          <li>
            <a href="#" class="footer-link">Help center</a>
          </li>

          <li>
            <a href="#" class="footer-link">Ask a question</a>
          </li>

          <li>
            <a href="#" class="footer-link">Privacy policy</a>
          </li>

          <li>
            <a href="#" class="footer-link">Terms & conditions</a>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Neighborhoods in Dharan</p>
          </li>

          <li>
            <a href="#" class="footer-link">Itahari</a>
          </li>

          <li>
            <a href="#" class="footer-link">Biratnagar</a>
          </li>

          <li>
            <a href="#" class="footer-link">Vedetar</a>
          </li>

          <li>
            <a href="#" class="footer-link">Dhankuta</a>
          </li>

          <li>
            <a href="#" class="footer-link">Birtamode</a>
          </li>

          <li>
            <a href="#" class="footer-link">Inaruwa</a>
          </li>

          <li>
            <a href="#" class="footer-link">Damak</a>
          </li>

          <li>
            <a href="#" class="footer-link">Tarahara</a>
          </li>

        </ul>

      </div>

      <div class="footer-bottom">

        <ul class="social-list">

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-linkedin"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-skype"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="mail-outline"></ion-icon>
            </a>
          </li>

        </ul>

        <p class="copyright">
          &copy; 2024 <a href="#">AutoMotive</a>. All Rights Reserved
        </p>

      </div>

    </div>
  </footer>







  <!-- 
    - custom js link
  -->
  <script src="/assets/js/landing.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <script>
    $('#myAlert').alert(); // Show the alert

    setTimeout(function() {
      $('#myAlert').alert('close'); // Hide the alert
    }, 3000);
  </script>
  <script>
    function updateEndDateMin() {
      var startDateInput = document.getElementById('start-date');
      var endDateInput = document.getElementById('end-date');
      endDateInput.min = startDateInput.value;
      if (endDateInput.value < startDateInput.value) {
        endDateInput.value = startDateInput.value;
      }
    }
  </script>

  <script>
    // Get the start date and end date input fields
    const startDateInput = document.getElementById('start-date');
    const endDateInput = document.getElementById('end-date');

    // Add an event listener to the start date input field
    startDateInput.addEventListener('change', (event) => {
      // Get the selected start date
      const startDate = new Date(event.target.value);

      // Calculate the maximum selectable end date (1 week from the start date)
      const maxEndDate = new Date(startDate.getTime() + (30 * 24 * 60 * 60 * 1000));

      // Format the maximum selectable end date to match the date format of the input field
      const maxEndDateFormatted = maxEndDate.toISOString().slice(0, 10);

      // Set the maximum selectable date on the end date input field
      endDateInput.setAttribute('max', maxEndDateFormatted);
    });
  </script>

  <script>
    function initMap() {
      let map = new google.maps.Map(document.getElementById("map"), {
        center: {
          lat: 26.663047204654532,
          lng: 87.27456604766846
        },
        zoom: 15,
        scrollwheel: true,
      });

      const uluru = {
        lat: 26.663047204654532,
        lng: 87.27456604766846
      };

      let marker = new google.maps.Marker({
        position: uluru,
        map: map,
        draggable: true
      });

      google.maps.event.addListener(marker, 'position_changed',
        function() {
          let lat = marker.position.lat()
          let lng = marker.position.lng()
          $('#pick_drop').val([lat, lng])
        })

      google.maps.event.addListener(map, 'click',
        function(event) {
          pos = event.latLng
          marker.setPosition(pos)
        })

    }
  </script>

  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAi8hZEBidJfVDVAq__019GWzVjNH2hyHY&callback=initMap" type="text/javascript"></script>
  
  </div>


</body>

</html>