<!DOCTYPE html>
<html>

<head>
  <title>Login Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="./assets/css/auth.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/b8ff1a64eb.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>

<body>
@if(session()->has('message'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session('message') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  @if(session()->has('message1'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('message1') }}</strong>
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
        <!-- <div class="login-img d-none d-md-flex"></div> -->

        <div class="card-body">
          <h2 class="title text-center mt-3">
            OTP
          </h2>
          <form class="form-box px-3" method="post" action="{{route('forget.otp')}}">
            @csrf
            <div class="form-input">
              <span><i class="fa-solid fa-envelope"></i></i></span>
              <input type="email" name="email" placeholder="Email Address" tabindex="10" required>
            </div>
            <div class="form-input">
              <span><i class="fa-solid fa-lock"></i></span>
              <input type="password" name="password" placeholder="Enter OTP" required>
            </div>


            <div class="mb-3">
              <button type="submit" class="btn btn-block">
                Submit
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>