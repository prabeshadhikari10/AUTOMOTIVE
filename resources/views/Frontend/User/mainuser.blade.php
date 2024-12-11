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
  <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>

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
            <div style="position: absolute;">
              <img src="/user_image/user.jpg" alt="profile" style="width: 50px; height:50px; border-radius:20px;">
              @if($user->status==0)
              @elseif($user->status==1)
              <span style="position: absolute; bottom: 5px; right: -7px;"><i class="fa-solid fa-circle-check" style="color:#39b779; background-color:white; border-radius:50%;"></i></span>
              @else
              <span style="position: absolute; bottom: 5px; right: -7px;"><i class="fa-solid fa-circle-check" style="color:dark-gray; background-color:white; border-radius:50%;"></i></span>
              @endif
            </div>
            @else
            <div style="position: absolute;">
              <img src="{{$user->profile}}" alt="profile" style="width: 50px; height:50px; border-radius:20px;">
              @if($user->status==0)
              @elseif($user->status==1)
              <span style="position: absolute; bottom: 5px; right: -7px;"><i class="fa-solid fa-circle-check" style="color:#39b779; background-color:white; border-radius:50%;"></i></span>
              @else
              <span style="position: absolute; bottom: 5px; right: -7px;"><i class="fa-solid fa-circle-check" style="color:dark-gray; background-color:white; border-radius:50%;"></i></span>
              @endif
            </div>
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







  @yield('content')





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

  <script>
    var config = {
      // replace the publicKey with yours
      "publicKey": "test_public_key_d53b8fb9b46846c5939310c72c03767f",
      "productIdentity": "1234567890",
      "productName": "Dragon",
      "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
      "paymentPreference": [
        "KHALTI",
        "EBANKING",
        "MOBILE_BANKING",
        "CONNECT_IPS",
        "SCT",
      ],
      "eventHandler": {
        onSuccess(payload) {
          // hit merchant api for initiating verfication
          console.log(payload);
        },
        onError(error) {
          console.log(error);
        },
        onClose() {
          console.log('widget is closing');
        }
      }
    };

    var checkout = new KhaltiCheckout(config);
    var btn = document.getElementById("payment-button");
    btn.onclick = function() {
      // minimum transaction amount must be 10, i.e 1000 in paisa.
      checkout.show({
        amount: 1000
      });
    }
  </script>






</body>

</html>