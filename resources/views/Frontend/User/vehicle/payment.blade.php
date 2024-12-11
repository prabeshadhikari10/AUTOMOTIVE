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
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>

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

    <div style="position: fixed; top:10rem;" class="modal" tabindex="-1" id="pay-{{$booking->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="font-size: 1.5rem; display: flex; flex-direction:column; justify-content: center; align-items: center;">
          <ion-icon name="cash-outline" style="font-size: 2rem;"></ion-icon>
          <p class="mt-2" style="font-size: 1.1rem;">Do you want to pay with cash?</p>
        </div>
        <div class="modal-footer" style=" display: flex; justify-content: center; align-items: center;">
          <button type="button" class="rounded" data-dismiss="modal" style="background-color: gray; padding:3px 10px; border:2px solid gray">Close</button>
          <button class="ml-3 rounded" style="background-color:#f94449; padding:3px 10px;">
            <a href="{{route('verify-cash', ['id' => $booking->id])}}" type="button" class="text-white">Yes</a>
          </button>

        </div>
      </div>
    </div>
  </div>



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









                <div class="dropdown show">
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
                            <span style="font-size: 20px;"><ion-icon name="bookmark-outline"></ion-icon></span>
                            <span class="ml-2">My bookings</span>
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

    <div style="margin-top: 4.5rem;">


    </div>

    <!-- Modal toggle -->


    <!-- Main modal -->


    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container mb-5 mt-4 py-10 bg-white shadow" style="border-radius: 10px; width:70%;">
            <div class="lg:w-4/5  flex flex-wrap mx-auto" style=" width:90%;">
                <img alt="vehicle" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="{{$booking->vehicle['image']}}">
                <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                    <h2 class="text-sm title-font text-gray-500 tracking-widest">{{$booking->vehicle->user['name']}}</h2>
                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{$booking->vehicle['name']}}</h1> <span>
                        <h2 class="text-sm title-font text-gray-500 tracking-widest">{{$booking->vehicle['brand']}}</h2>
                    </span>
                    <div class="flex mb-4">
                        <span class="flex items-center">
                            <span class="text-gray-600 mr-1">4</span>
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24" style="color:#39b779;">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                            </svg>
                        </span>

                    </div>
                    <p class="leading-relaxed">
                        @if($booking->status=='pending')
                    <div class="flex justify-start">
                        <span style="padding: 3px 8px; border-radius: 10px;background-color:#e6cc00; color: #fff ">status: {{$booking->status}}</span>
                    </div>

                    @elseif($booking->status=='active')
                    <div class="flex justify-start">
                        <span style="padding: 3px 8px; border-radius: 10px;background-color:#39b779; color: #fff ">status: {{$booking->status}}</span>
                    </div>

                    @endif
                    </p>
                    <p class="leading-relaxed">
                    <div class="relative">
                        @if($booking->status=='pending')
                        <div class="flex justify-start">
                            <span style="padding: 3px 8px; border-radius: 10px;background-color:#e6cc00; color: #fff ">payment: unaccepted</span>
                        </div>
                        @elseif($booking->status=='active')
                        <div class="flex justify-start">
                            <span style="padding: 3px 8px; border-radius: 10px;background-color:#f94449; color: #fff ">payment: {{$booking->payment}}</span>
                        </div>
                        @elseif($booking->status=='rejected')
                        <div class="flex justify-start">
                            <span style="padding: 3px 8px; border-radius: 10px;background-color:#f94449; color: #fff ">payment: rejected</span>
                        </div>

                        @elseif($booking->payment=='unpaid')
                        <div class="flex justify-start">
                            <span style="padding: 3px 8px; border-radius: 10px;background-color:#f94449; color: #fff ">payment: {{$booking->payment}}</span>
                        </div>

                        @else
                        <div class="flex justify-start">
                            <span style="padding: 3px 8px; border-radius: 10px;background-color:#39b779; color: #fff ">payment: {{$booking->payment}}</span>
                        </div>

                        @endif
                    </div>
                    </p>

                    <div class="flex items-center">
                        <div class="relative">
                            <span style="padding: 3px 8px; border-radius: 10px;background-color:gray; color: #fff; display:flex; justify-content:center; align-items:center; "><ion-icon name="calendar-outline" class="mr-3"></ion-icon>{{$booking->from_date}}</span>
                        </div>
                        <span class="mx-4 text-gray-500">to</span>
                        <div class="relative">
                            <span style="padding: 3px 8px; border-radius: 10px;background-color:gray; color: #fff; display:flex; justify-content:center; align-items:center; "><ion-icon name="calendar-outline" class="mr-3"></ion-icon>{{$booking->to_date}}</span>
                        </div>
                    </div>

                    <div class=" relative flex justify-start mt-3">
                        <span style="padding: 3px 8px; border-radius: 10px;background-color:#fff; color:gray; font-size:18px; ">Rs. {{$booking->price}}/day</span>
                    </div>


                    <hr class="mt-4 mb-4">
                    <div style="display: flex; justify-content:start; align-items:center;">
                        <span class="title-font font-medium text-2xl mr-5 text-gray-900">Rs. {{$booking->total_price}}</span>
                        <button class="btn px-3 py-2" data-toggle="modal" data-target="#pay-{{$booking->id}}" style="font-size: 17px;">Cash in hand</button>
                        <button class="ml-2" id="payment-button"><img src="https://dao578ztqooau.cloudfront.net/static/img/logo1.png" alt="khalti" style="width:130px;"></button>


                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>



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

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAi8hZEBidJfVDVAq__019GWzVjNH2hyHY&callback=initMap" type="text/javascript"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                    $.ajax({
                        type : 'POST',
                        url : '/verifypayment/{{$booking->id}}',
                        data:{
                            token : payload.token,
                            amount : payload.amount,
                            "_token" : "{{ csrf_token() }}"
                        },
                        success : function(res){
                            
                            console.log(res);
                        }
                    });


                    console.log(payload);
                    // window.location.replace(url);
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
                amount: `{{$booking->total_price}}` * 100
            });
        }
    </script>



</body>

</html>