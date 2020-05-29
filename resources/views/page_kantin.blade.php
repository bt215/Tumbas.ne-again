@extends('page_pembeli_2')
@section('content')
<div class="hero-wrap ftco-degree-bg header" style="background-image: url('{{ url('theme-assets/moklet.jpg') }}');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text justify-content-center align-items-center">
          <div class="col-md-9 ftco-animate pb-5 text-center" style="margin-top: -150px;">
          	<p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/page_beranda_pembeli') }}" class="text-white">Home<i style="margin-left: 10px;" class="ion-ios-arrow-forward text-white"></i></a></span><span class="text-white">Kantin</span></p>
            <h1 class="mb-3 bread text-white">Kantin</h1>
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
          	<span class="subheading">collection</span>
            <h2 class="mb-2"></h2>
          </div>
        </div>
        <div class="row d-flex">
          @foreach($kantins as $kantin)
	<div class="card col-md-3" style="margin: 10px; margin-left: 60px; margin-bottom: 45px;">
		<div class="card-header text-center" style="background-color: white; padding-bottom: 0;">
 			<h1 class="h2">{{ $kantin->nama_kantin }}</h1>
 		</div>
 		<hr>
 		<div class="card-body">
 			<span><img src="{{ url('storage/fotoKantin/'.$kantin->image_kantin) }}" width="200" class="image" style="margin-left: 20px; margin-top: -20px;"></span>
 		</div>
 		<div class="card-footer" style="background-color: white;">
 			<a href='{{ url("/page_menu/$kantin->id_kantin") }}'>
				<button type="button" class="btn btn-success col-sm-12">See more</button>
			</a>
 		</div>
	</div>
	@endforeach
        </div>
      </div>
    </section>

    <br>
    <br>

    <footer class="ftco-footer ftco-section" style="padding: 3em 0 2em 0;">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Tumbas.ne</h2>
                <ul class="ftco-footer-social list-unstyled mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
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
@endsection