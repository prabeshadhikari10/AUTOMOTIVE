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
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">


  <!-- 
    - custom css link
  -->


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>





  <link rel="stylesheet" href="./assets/css/landing.css">




  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Open+Sans&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/b8ff1a64eb.js" crossorigin="anonymous"></script>

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

    #searchInput:focus {
      outline: none;
    }

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

  <!-- 
    - #HEADER
  -->

  



  <header class="header" data-header>
    <div class="container">

      <div class="overlay" data-overlay></div>

      <a href="javascript:location.reload(true)" class="logo">
        <img src="./assets/images/logo.png" style="width: 55px;" alt="automotive logo">
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
            <img src="/user_image/user.jpg" alt="profile" style="width: 50px; height:50px; position:absolute; border-radius:20px;">
            @else
            <img src="{{$user->profile}}" alt="profile" style="width: 40px; height:40px; position:absolute; border-radius:20px;">
            @endif
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="z-index:auto;">
            <a class="dropdown-item" href="/user-dashboard" style="display: flex; align-items:center;">
              <span style="font-size: 20px;"><ion-icon name="person-outline"></ion-icon></span>
              <span class="ml-2">My Profile</span>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/My-Vehicle" style="display: flex; align-items:center;">
              <span style="font-size: 20px;"><ion-icon name="car-outline"></ion-icon></span>
              <span class="ml-2">Become a Host</span>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/show-checkout" style="display: flex; align-items:center;">
              <span style="font-size: 20px;"><ion-icon name="bookmark-outline"></ion-icon></span>
              <span class="ml-2">My bookings</span>
            </a>
            <div class="dropdown-divider"></div>
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


  <!-- unverify modal -->
  @foreach($booking as $b)
  <div style="position: fixed; top:10rem;" class="modal" tabindex="-1" id="decline-{{$b->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="font-size: 1.5rem; display: flex; flex-direction:column; justify-content: center; align-items: center;">
          <i class="fa-solid fa-circle-xmark text-danger" style="font-size: 1.5rem;"></i>
          <p class="mt-2" style="font-size: 1.1rem;">Do you want to cancel this booking?</p>
        </div>
        <div class="modal-footer" style=" display: flex; justify-content: center; align-items: center;">
          <button type="button" class="rounded" data-dismiss="modal" style="background-color: gray; padding:3px 10px; border:2px solid gray">Close</button>
          <button class="ml-3 rounded" style="background-color:#f94449; padding:3px 10px;">
            <a href="/cancel-booking/{{$b->id}}" type="button" class="text-white">Yes</a>
          </button>

        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="exampleModal-{{$b->vehicle->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top:80px;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Rating and Feedback</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/vehicle-rating/{{$b->vehicle->id}}" method="post">
          @csrf
          <div class="modal-body" style="background: #fff; border-radius:20px;">
            <div class="rate py-3 text-white mt-3">
              <div class="rating"> <input type="radio" name="rating" value="5" id="{{$b->vehicle->id}}5"><label for="{{$b->vehicle->id}}5">☆</label> <input type="radio" name="rating" value="4" id="{{$b->vehicle->id}}4"><label for="{{$b->vehicle->id}}4">☆</label> <input type="radio" name="rating" value="3" id="{{$b->vehicle->id}}3"><label for="{{$b->vehicle->id}}3">☆</label> <input type="radio" name="rating" value="2" id="{{$b->vehicle->id}}2"><label for="{{$b->vehicle->id}}2">☆</label> <input type="radio" name="rating" value="1" id="{{$b->vehicle->id}}1"><label for="{{$b->vehicle->id}}1">☆</label>
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
  @endforeach

  





  <section class="section featured-car" id="featured-car">
    <div class="container" style="margin-top: 50px;">

      <div class="title-wrapper">
        <h2 class="h2 section-title">My Bookings</h2>
        <!-- <button id="payment-button">Pay with Khalti</button> -->
      </div>

      <ul class="featured-car-list">
        @foreach($booking as $b)
        @if($b->status == 'active' || $b->status == 'pending')
        <li class="filtercar">
          <div class="featured-car-card shadow">

            <figure class="card-banner">
              <img src="{{$b->vehicle['image']}}" alt="carname" loading="lazy" width="440" height="300" class="w-100">
            </figure>

            <div class="card-content">

              <div class="card-title-wrapper">
                <h3 class="h3 card-title">
                  <a href="#" style="text-decoration: none;">{{$b->vehicle['name']}}</a>
                </h3>

                <data class="year" value="2021">
                  @if($b->status=='pending')

                  <span style="padding: 3px 8px; border-radius: 10px;background-color:#e6cc00; color: #fff ">{{$b->status}}</span>

                  @elseif($b->status=='active')

                  <span style="padding: 3px 8px; border-radius: 10px;background-color:#39b779; color: #fff ">{{$b->status}}</span>

                  @endif
                </data>
              </div>

              <ul class="card-list">

                <li class="card-list-item">
                  <ion-icon name="person-outline"></ion-icon>

                  <span class="card-item-text">{{$b->vehicle->user['name']}}</span>
                </li>

                <li class="card-list-item">
                  <ion-icon name="card-outline"></ion-icon>

                  <span class="card-item-text">
                    @if($b->status=='pending')
                    <td>
                      <span style="padding: 3px 8px; border-radius: 10px;background-color:#e6cc00; color: #fff ">unaccepted</span>
                    </td>
                    @elseif($b->payment=='unpaid')
                    <td>
                      <span style="padding: 3px 8px; border-radius: 10px;background-color:#f94449; color: #fff ">{{$b->payment}}</span>
                    </td>
                    @else
                    <td>
                      <span style="padding: 3px 8px; border-radius: 10px;background-color:#39b779; color: #fff ">{{$b->payment}}</span>
                    </td>
                    @endif
                  </span>
                </li>

                <li class="card-list-item">
                  <ion-icon name="calendar-outline"></ion-icon>

                  <span class="card-item-text">{{$b->from_date}}</span>
                </li>

                <li class="card-list-item">
                  <ion-icon name="calendar-outline"></ion-icon>

                  <span class="card-item-text">{{$b->from_date}}</span>
                </li>

              </ul>

              <div class="card-price-wrapper">

                <p class="card-price">
                  <strong>Rs. {{$b->total_price}}</strong>
                </p>

                <!-- <button class="btn fav-btn" aria-label="Add to favourite list">
                                <ion-icon name="heart-outline"></ion-icon>
                            </button> -->
                <button type="button" class="btn fav-btn" data-toggle="modal" data-target="#exampleModal-{{$b->vehicle->id}}" aria-label="Add to favourite list">
                  <ion-icon name="star-outline"></ion-icon>
                </button>
                @if($b->payment=='paid' || $b->payment=='cash in hand')
                @else
                <button class="no-focus" data-toggle="modal" data-target="#decline-{{$b->id}}">
                  <ion-icon name="trash-outline" style="font-size: 25px; color:#f94449;"></ion-icon>
                </button>
                @endif
                @if($b->status=='active' && $b->payment=='unpaid')
                <a href="/booking-payment/{{$b->id}}" type="button">
                  <button class="btn">
                    Pay Now
                  </button>
                </a>
                @else
                @endif

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





  <footer class="footer">
    <div class="container">

      <div class="footer-top">

        <div class="footer-brand">
          <a href="#" class="logo">
            <img src="./assets/images/logo.png" style="width: 60px;" alt="Ridex logo">
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


  <script src="./assets/js/landing.js"></script>


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
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
  </script>







</body>

</html>