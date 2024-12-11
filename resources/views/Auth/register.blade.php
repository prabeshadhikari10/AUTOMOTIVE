<!DOCTYPE html>
<html>

<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="./assets/css/auth.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/b8ff1a64eb.js" crossorigin="anonymous"></script>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <style>
    #myAlert {
      position: fixed;
      top: 20px;
      right: 20px;
    }
  </style>
</head>

<body>
  <!-- @if(session()->has('message'))
  <div class="alert {{session('alert') ?? 'alert-danger alert-block'}}">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ session('message') }}</strong>
  </div>
  @endif --> 
  @if(session()->has('message'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert" id="myAlert">
    <strong>{{ session('message') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  <div class="container">
    <div class="loginlogo text-center mb-4">
      <img src="./assets/images/logo.png" alt="images" width="90">
    </div>
    <div class="row px-3">
      <div class="col-lg-7 col-xl-5 card flex-row mx-auto px-0">
        <!-- <div class="img-left d-none d-md-flex"></div> -->

        <div class="card-body">
          <h2 class="title text-center mt-4">
            Register
          </h2>
          <form class="form-box px-3" method="post" action="{{route('post.register')}}">
            @csrf
            <div class="form-input">
              <span><i class="fa-solid fa-user"></i></span>
              <input type="name" name="name" placeholder="Name" required>
            </div>
            <div class="form-input">
              <span><i class="fa-solid fa-envelope"></i></span>
              <input type="email" name="email" placeholder="Email Address" tabindex="10" required>
            </div>
            <div class="form-input">
              <span><i class="fa-solid fa-lock"></i></span>
              <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-input">
              <span><i class="fa-solid fa-lock"></i></span>
              <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            </div>

            <div class="mb-3">
              <button type="submit" class="btn btn-block">
                Register
              </button>
            </div>

            <hr class="my-4">

            <div class="text-center mb-2">
              Already have an account?
              <a href="{{route('login')}}" class="register-link">
                login
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script>
    $('#myAlert').alert(); // Show the alert

    setTimeout(function() {
      $('#myAlert').alert('close'); // Hide the alert
    }, 3000); 
  </script>

</html>