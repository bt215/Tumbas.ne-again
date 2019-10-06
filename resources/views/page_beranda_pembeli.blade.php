@extends('page_pembeli_1')
@section('content')
<div class="hero-wrap ftco-degree-bg header" style="background-image: url('{{ url('theme-assets/bg-2.jpg') }}');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text justify-content-center align-items-center">
          <div class="col-lg-8 col-md-6 ftco-animate d-flex align-items-end">
            <div class="text text-center">
              <h1 class="mb-4 text-white" style="margin-top: -150px;">Anda Laper?<br>Tumbas Disini Aja</h1>
              <p class="text-white" style="font-size: 20px;">Bila anda malas untuk mengantri di kantin, sekarang sudah ada solusinya. Anda dapat memesan makanan di kantin tanpa harus mengantri loh. Tinggal cari aja disini. <br> Makan praktis, perut kenyang.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="mouse">
      <a href="#tim" class="mouse-icon">
        <div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
      </a>
    </div>
</div>

    <section class="ftco-section goto-here ftco-no-pb">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url('{{ url('theme-assets/cafe.jpg') }}');">
                    </div>
                    <div class="col-md-6 wrap-about py-md-5 ftco-animate">
              <div class="heading-section p-md-5">
                <h2 class="mb-4">Apa itu Tumbas.ne?</h2>

                <p>Tumbas.ne adalah sebuah web aplikasi dengan framework laravel yang memiliki fungsi sebagai web pemesanan makanan di kantin sekolah tanpa perlu mengantri di kantin.</p>
                <p>Tumbas.ne ini dibuat oleh tim yang berasal dari SMK Telkom Malang yang beranggotakan 4 orang.
                    <ul>
                        <li>Michael Kevin Adinata</li>
                        <li>Janice Marsha Audria Feninda Effendi</li>
                        <li>Derik Dwi Heavyanto</li>
                        <li>Sabina Okta</li>
                    </ul>
                </p>
              </div>
                    </div>
                </div>
            </div>
     </section>

    <br>
    <br>
    <br>

    <section class="ftco-section ftco-agent ftco-no-pt" id="tim">
      <div class="container">
        <div class="row justify-content-center pb-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <span class="subheading">Team Tumbas.ne</span>
            <h2 class="mb-4">Team Kami</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 ftco-animate">
            <div class="agent">
              <div class="img">
                <img src="{{ url('theme-assets/kevin.jpeg') }}" class="img-fluid" alt="">
              </div>
              <div class="desc">
                <h3>Michael Kevin A.</h3>
                <p class="h-info"><span class="location">Hacker</span> <span class="details"></span></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 ftco-animate">
            <div class="agent">
              <div class="img">
                <img src="{{ url('theme-assets/marsha.jpeg') }}" class="img-fluid" alt="Colorlib Template">
              </div>
              <div class="desc">
                <h3>Janice Marsha A.F.E</h3>
                <p class="h-info"><span class="location">Hypster</span> <span class="details"></span></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 ftco-animate">
            <div class="agent">
              <div class="img">
                <img src="{{ url('theme-assets/derik.jpeg') }}" class="img-fluid" alt="Colorlib Template">
              </div>
              <div class="desc">
                <h3>Derik Dwi H.</h3>
                <p class="h-info"><span class="location">Hacker</span> <span class="details"></span></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 ftco-animate">
            <div class="agent">
              <div class="img">
                <img src="{{ url('theme-assets/sabina.jpeg') }}" class="img-fluid" alt="Colorlib Template">
              </div>
              <div class="desc">
                <h3>Sabina Okta</h3>
                <p class="h-info"><span class="location">Hustler</span> <span class="details"></span></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>    

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
@endsection    