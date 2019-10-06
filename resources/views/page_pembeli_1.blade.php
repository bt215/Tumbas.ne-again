<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tumbas.ne</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900&display=swap" rel="stylesheet">

    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">

    <link rel="icon" href="{{ url('theme-assets/logo.png') }}">

    <link rel="stylesheet" href="{{ url('css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/animate.css') }}">
    
    <link rel="stylesheet" href="{{ url('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ url('css/aos.css') }}">

    <link rel="stylesheet" href="{{ url('css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ url('css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ url('css/jquery.timepicker.css') }}">

    
    <link rel="stylesheet" href="{{ url('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ url('css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="stylesheet" href="{{ url('theme-assets/css/bootstrap-extended.css') }}">

  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/page_beranda_pembeli') }}">Tumbas.ne</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>
        <?php if (Session::has('pembeli')): ?>
          <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="{{ url('/page_beranda_pembeli') }}" class="nav-link">Beranda</a></li>
            <li class="nav-item"><a href="{{ url('/page_kantin') }}" class="nav-link">Kantin</a></li>
            <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Session::get('pembeli')->nama }}</a>
              <div class="dropdown-menu">
                <div class="arrow_box_right">
                  <a class="dropdown-item"><i class="la la-money"></i>{{ Session::get('pembeli')->saldo }}</a>
                  <a class="dropdown-item" href="{{ url('/logout_pembeli') }}"><i class="la la-power-off"></i>Logout</a>
                </div>
              </div>
            </li>
            <li class="nav-item"><a href="{{ url('/cart_pembeli') }}" class="nav-link"><i class="la la-shopping-cart" style="font-size: 30px; margin-top: -10px;"></i></a></li>
          </ul>
        </div>
        <?php else: ?>
          <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="{{ url('/page_beranda_pembeli') }}" class="nav-link">Beranda</a></li>
            <li class="nav-item"><a href="{{ url('/page_kantin') }}" class="nav-link">Kantin</a></li>
            <li class="nav-item"><a href="{{ url('/login_pembeli') }}" class="nav-link">Login</a></li>
            <li class="nav-item"><a href="{{ url('/cart_pembeli') }}" class="nav-link"><i class="la la-shopping-cart" style="font-size: 30px; margin-top: -10px;"></i></a></li>
          </ul>
        </div>
        <?php endif ?>
        
      </div>
    </nav>
    <!-- END nav -->
    
    
        @yield("content")
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{ url('js/jquery.min.js') }}"></script>
  <script src="{{ url('js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ url('js/popper.min.js') }}"></script>
  <script src="{{ url('js/bootstrap.min.js') }}"></script>
  <script src="{{ url('js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ url('js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ url('js/jquery.stellar.min.js') }}"></script>
  <script src="{{ url('js/owl.carousel.min.js') }}"></script>
  <script src="{{ url('js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ url('js/aos.js') }}"></script>
  <script src="{{ url('js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ url('js/bootstrap-datepicker.js') }}"></script>
  <script src="{{ url('js/jquery.timepicker.min.js') }}"></script>
  <script src="{{ url('js/scrollax.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ url('js/google-map.js') }}"></script>
  <script src="{{ url('js/main.js') }}"></script>
    
  </body>
</html>