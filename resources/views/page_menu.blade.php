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
            <li class="nav-item"><a href="{{ url('/page_beranda_pembeli') }}" class="nav-link">Beranda</a></li>
            <li class="nav-item active"><a href="{{ url('/page_kantin') }}" class="nav-link">Kantin</a></li>
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
            <li class="nav-item"><a href="{{ url('/page_beranda_pembeli') }}" class="nav-link">Beranda</a></li>
            <li class="nav-item active"><a href="{{ url('/page_kantin') }}" class="nav-link">Kantin</a></li>
            <li class="nav-item"><a href="{{ url('/login_pembeli') }}" class="nav-link">Login</a></li>
            <li class="nav-item"><a href="{{ url('/cart_pembeli') }}" class="nav-link"><i class="la la-shopping-cart" style="font-size: 30px; margin-top: -10px;"></i></a></li>
          </ul>
        </div>
        <?php endif ?>
        
      </div>
    </nav>
    <!-- END nav -->


<div class="hero-wrap ftco-degree-bg header" style="background-image: url('{{ url('theme-assets/bg-2.jpg') }}');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text justify-content-center align-items-center">
          <div class="col-md-9 ftco-animate pb-5 text-center" style="margin-top: -150px;">
          	<p class="breadcrumbs">
                <span class="mr-2">
                    <a href="{{ url('/page_beranda_pembeli') }}" class="text-white">
                        Beranda
                    <i style="margin-left: 10px;" class="ion-ios-arrow-forward text-white"></i>
                    </a>
                </span>
                <span class="mr-2">
                    <a href="{{ url('/page_kantin') }}" class="text-white">
                        Kantin
                    <i style="margin-left: 10px;" class="ion-ios-arrow-forward text-white"></i>
                    </a>
                </span>
                <span class="text-white">Menu</span></p>
            <h1 class="mb-3 bread text-white">Daftar Menu</h1>
            <form action="{{ url('page_kantin/search') }}" method="post"class="search-location mt-md-5">
            	{{ csrf_field() }}
		        		<div class="row justify-content-center">
		        			<div class="col-lg-10 align-items-end">
		        				<div class="form-group">
		          				<div class="form-field">
				                <input type="text" class="form-control" placeholder="Cari disini yaa">
				                <button><span class="ion-ios-search"></span></button>
				              </div>
			              </div>
		        			</div>
		        		</div>
		        	</form>
          </div>
        </div>
      </div>
</div>

<section class="ftco-section ftco-no-pb">
      <div class="container">
      	<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">Daftar Menu</span>
            <h2 class="mb-2">Banyak juga pilihan menu nya..</h2>
          </div>
        </div>
        <div class="row d-flex">
          @foreach($menus as $menu)
  <div class="card col-md-3" style="margin: 10px; margin-left: 60px; margin-bottom: 45px;">
    <div class="card-header text-center" style="background-color: white; padding-bottom: 0;">
      <h1 class="h2">{{ $menu->nama_menu }}</h1>
    </div>
    <hr>
    <div class="card-body">
      <span><img src="{{ url('storage/fotoMenu/'.$menu->image) }}" width="150" class="image" style="margin-left: 40px; margin-right: 40px; margin-top: -15px; margin-bottom: 5px;"></span>
            <hr>
            <p>ID Menu : {{ $menu->id_menu }}</p>
            <p>Deskripsi : <br>{{ $menu->deskripsi }}</p>
            <p>Harga : {{ $menu->harga }}</p>
    </div>
    <div class="card-footer" style="background-color: white;">
      <button type="button" class="btn btn-success col-sm-12" data-toggle="modal" data-target="#modal1" 
      onclick="document.getElementById('id_menu').value = '{{ $menu->id_menu }}';
      document.getElementById('id_kantin').value = '{{ $menu->id_kantin }}';">Pesan Sekarang</button>
    </div>
  </div>
  @endforeach
        </div>
      </div>
    </section>

    <br>
    <br>
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

    <footer class="ftco-footer ftco-section" style="padding: 3em 0 2em 0;">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Tumbas.ne</h2>
              <p>Sebuah web aplikasi yang dibuat untuk memudahkan warga smk telkom malang memesan makanan di kantin agar tidak lama menunggu dan mengantri panjang.</p>
              <ul class="ftco-footer-social list-unstyled mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Ada Pertanyaan?</h2>
              <div class="block-23 mb-3">
                <ul>
                  <li><span class="icon icon-map-marker"></span><span class="text">SMK Telkom Malang, Sawojajar, Kedungkandang, Malang, Indonesia</span></li>
                  <li><a href="#"><span class="icon icon-phone"></span><span class="text">+62 897 1623 160</span></a></li>
                  <li><a href="#"><span class="icon icon-envelope pr-4"></span><span class="text">tumbas.ne@gmail.com</span></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Alamat Kami</h2>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.2139604052695!2d112.65676931451084!3d-7.976824681734376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6285c5c1b44e3%3A0xf6c889ac7452dc3a!2sSMK%20Telkom%20Malang!5e0!3m2!1sid!2sid!4v1570076297858!5m2!1sid!2sid" width="345" height="245" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
          </div>
        </div>
      </div>
    </footer>


  
</html>

    <?php if (Session::has('pembeli')): ?>
      <div class="modal fade" id="modal1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 id="judul">Pesan Sekarang</h3>
        <span class="close" data-dismiss="modal">&times;</span>
      </div>
        <form action="{{ url('addCart') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="action" id="action">
        <input type="hidden" name="id_pembeli" id="id_pembeli">
        <input type="hidden" name="id_menu" id="id_menu">
        <input type="hidden" name="id_kantin" id="id_kantin">

        <div class="modal-body">
          Jumlah Pesanan
          <input type="number" name="jumlah" id="jumlah" class="form-control" required />
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Beli</button>
        </div>
      </form> 
    </div>
  </div>
</div> 
    <?php else: ?>
      <div class="modal fade" id="modal1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
          <span class="close" data-dismiss="modal">&times;</span>
          <h1 class="h4 text-danger">Silahkan Login Terlebih Dahulu</h1>
          <a href="{{ url('login_pembeli') }}">
            <button class="btn btn-info">Klik Disini</button>
          </a>
      </div> 
    </div>
  </div>
</div> 
    <?php endif ?>