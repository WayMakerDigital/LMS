<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
  <title>Admin Dashboard - Login</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <!-- VENDOR CSS -->
  <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/vendor/linearicons/style.css">
  <!--text editor-->
  <!-- MAIN CSS -->
  <link rel="stylesheet" href="../assets/css/main.css">
  <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
  <link rel="stylesheet" href="../assets/css/demo.css">
  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
  <!-- ICONS -->
  <link rel="apple-touch-icon" sizes="76x76" href="../waymaker/Waymaker1.png">
  <link rel="icon" type="image/png" sizes="96x96" href="../waymaker/Waymaker1.png">
</head>

<body>
<div id="wrapper">
    <div class="vertical-align-wrap">
      <div class="vertical-align-middle">
        <div class="auth-box ">
          <div class="left">
            <div class="content">
              <div class="header">
                <div class="logo text-center"><img src="{!! asset('waymaker/Waymaker Learning Logo.jpg')!!}" alt="Beckley Logo"></div>
                <p class="lead">Login to your account</p>
              </div>
              <form class="form-auth-small" method="post" action="{{route('login.admin')}}">
                 {{csrf_field()}}
                <div class="form-group">
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach

                   @if (session('warning'))
                    <div class="alert alert-danger">
                        {{ session('warning') }}
                    </div>
                   @endif
                  <label for="signin-email" class="control-label sr-only">Email</label>
                  <input type="email" name="email" class="form-control" id="signin-email" value="" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="signin-password" class="control-label sr-only">Password</label>
                  <input type="password" name="password" class="form-control" id="signin-password" value="" placeholder="Password">
                </div>
                <div class="form-group clearfix">
                  <label class="fancy-checkbox element-left">
                    <input type="checkbox" name="remember">
                    <span>Remember me</span>
                  </label>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
              </form>
            </div>
          </div>
          <div class="right">
            <div class="overlay"></div>
            <div class="content text">
              <h1 class="heading"></h1>
              <p></p>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- END WRAPPER -->
</body>

</html>