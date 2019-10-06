@extends('page_pembeli_4')
@section('content')
<section class="ftco-section ftco-no-pb">
      <div class="container">
      	<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">Cart Pembeli</span>
            <h2 class="mb-2">Nih pesanan mu</h2>
          </div>
        </div>

        <?php if (Session::has('cart')): ?>
      <table class="table ftco-animate">
        <thead>
          <tr>
            <th>Nama Kantin</th>
            <th>Nama Menu</th>
            <th>Jumlah</th>
            <th>Harga Total</th>
            <th>Foto</th>
          </tr>
          </thead>
        <tbody>
          @foreach($carts as $cart)
          <tr>
            <td>{{ $cart["menu"]->id_kantin }}</td>
            <td>{{ $cart["menu"]->nama_menu }}</td>
            <td>{{ $cart["jumlah"]  }}</td>
            <td>{{ $cart["menu"]->harga*$cart["jumlah"]  }}</td>
            <td><img src="{{ url('storage/fotoMenu/'.$cart['menu']->image) }}" width="100" class="image">
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal1">Pesan</button>  
      <?php else: ?>
        <div class="col-md-12 heading-section text-center ftco-animate">
    <p class="">Silahkan login dahulu</p>
      <a href="{{ url('login_pembeli') }}">
        <button class="btn btn-info">Klik Disini</button>
      </a>
  </div>
        <?php endif ?>
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
          <div class="modal fade" id="modal1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 id="judul">Nota Pembelian</h3>
        <span class="close" data-dismiss="modal">&times;</span>
      </div>
      <?php if (Session::has('cart')): ?>
        <form action="{{ url('save_cart') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        
        <table class="table">
          <thead>
            <th>ID</th>
            <th>Qty</th>
            <th>Nama menu</th>
            <th>Harga</th>
            <th>Total</th>
          </thead>
          <tbody>
            @foreach($carts as $cart)
            <tr>
              <td>{{ $cart["menu"]->id_kantin }}</td>
              <td>{{ $cart["jumlah"]  }}</td>
              <td>{{ $cart["menu"]->nama_menu }}</td>
              <td>{{ $cart["menu"]->harga }}</td>
              <td>{{ $cart["menu"]->harga*$cart["jumlah"]  }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
    
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Beli</button>
        </div>
      </form> 
      <?php endif ?>
        
    </div>
  </div>
</div> 
@endsection