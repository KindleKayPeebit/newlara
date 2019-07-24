<!DOCTYPE html>
<html lang="en">
<head>
  <title> Twilio Follow ups | {{ Request::segment(1)}} </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('assets/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/custom-style.css')}}">
  <!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->
  <style>
    .signup {
      display: none;
  }
  .forgot {
      display: none;
  }
  .signup.open-signin {
      display: block;
  }
  .forgot.open-forgot{
    display: block;
  }
  .form-group.has-error {
    color: red;
  }
  .error {
    color: #ef1325;
    padding: 10px;
  }
  </style>
</head>
<body>
  <section class="login-block">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 fixed-width">
          <div class="top-logo">
          <!--   <a href="">
              <img src="{{asset('assets/img/logo.png')}}">
            </a> -->
          </div>
          <div class="sign-in-block signin" id="signin">
            <h3 class="hdg">Admin Login</h3>
            <div class="form-inner">
            <form id="login-form" class="form" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                  <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror  
                </div>
                <div class="form-group">
                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required autocomplete="current-password">
                 @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                 @enderror
                </div>
                <div class="form-group form-check">
                  <ul class="remember">
                    <li><input class="form-check-input" type="checkbox" id="remember" {{ old('remember') ? 'checked' : '' }} name="remember"> Remember me</li>
                    <li>
                      @if (Route::has('password.request'))
                         <a class="forgot_a" href="{{ route('password.request') }}">Forgot Password ?</a>
                      @endif
                    </li>
                    <div class="clearfix"></div>
                  </ul>
                </div>
                <div class="btns-zone">
                  <button type="submit" class="btn btn-primary btn-focus cus-sin">Sign In</button>
                </div>
              </form>
              
            </div>
          </div>

        
        </div>
      </div>
    </div>
  </section>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="{{asset('assets/bootstrap.min.js')}}"></script>

<script>
  
    $(".sign-up-link").click(function(){
      $("#signup").show();
    });

    $(".sign-up-link").click(function(){
      $("#signin").hide();
    });

    $(".cancel-cus").click(function(){
      $("#signin").show();
    });

    $(".cancel-cus").click(function(){
      $("#signup").hide();
    });

    $(".forgot_a").click(function(){
      $("#forgot").show();
    });

    $(".forgot_a").click(function(){
      $("#signin").hide();
    });

    $(".cancel-cus").click(function(){
      $("#forgot").hide();
    });

</script>
</body>
</html>
