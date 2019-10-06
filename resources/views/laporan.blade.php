@extends("template_laporan")
@section("content")
<div class="container-fluid"> 
<div class=" card">
  <div class="card-header bg-info text-white">
    <h4 class="text-white h3">Laporan Beli</h4>
  </div>
  <br>
<form action="{{ url('laporan/search') }}" method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" style="float: right;">
  {{ csrf_field() }}
    <div class="input-group">
      <input type="text" class="form-control border-1 small" placeholder="Cari Kantin" name="search">
      <div class="input-group-append">
        <button class="btn btn-primary" type="submit">
          <i class="fas fa-search fa-sm"></i>
        </button>
      </div>
    </div>
</form>
  <div class="card-body">
    <?php if (Session::has("message")): ?>
  <div class="alert alert-dismissible alert-info">
    {{ Session::get("message") }}
    <span class="close" data-dismiss="alert">&times;</span>
  </div>
<?php endif ?>
    <table class="table">
      <thead>
        <tr>
          <th>ID Pesan</th>
          <th>Nama Pembeli</th>
          <th>Nama Menu</th>
          <th>Nama Kantin</th>
          <th>Tanggal Beli</th>
          <th>Opsi</th>
        </tr>
      </thead> 
      <tbody>
        @foreach ($detail as $data)
          <tr>
            <td>{{$data->id_pesan}}</td>
            <td>{{$data->pembeli->nama}}</td>
            <td>{{$data->menu->nama_menu}}</td>
            <td>{{$data->kantin->nama_kantin}}</td>
            <td>{{$data->tanggal_beli}}</td>
            <td>
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal2" onclick='Detail({!! json_encode($data) !!})'>
                Detail
              </button>
              <a href='{{ url("/delete_laporan/$data->id_pesan") }}'>
                <button type="button" class="btn btn-danger ft-trash"></button>
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</div> 
</div>

<div class="modal fade" id="modal2">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3>Detail Pesanan</h3>
        <span class="close" data-dismiss="modal">&times;</span>
      </div>
      <div class="modal-body">
        <!-- <div class="left"> -->
          <div class="row">
            <div class="col-sm-6">
              ID Pesan
            </div>
            <div class="col-sm-6">
              <p id="id_pesan"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              ID Menu
            </div>
            <div class="col-sm-6">
              <p id="id_menu"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              Jumlah
            </div>
            <div class="col-sm-6">
              <p id="jumlah"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              Harga Satuan
            </div>
            <div class="col-sm-6">
              <p id="harga_satuan"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              Total Harga
            </div>
            <div class="col-sm-6">
              <p id="total_harga"></p>
            </div>
          </div>
        <!-- </div> -->
      </div>
    </div>
  </div>
</div>  

<script type="text/javascript">
  function Detail(Cart) {
    document.getElementById('id_pesan').innerHTML = Cart.id_pesan;
    document.getElementById('id_menu').innerHTML = Cart.id_menu;
    document.getElementById('jumlah').innerHTML = Cart.jumlah;
    document.getElementById('harga_satuan').innerHTML = Cart.harga;
    document.getElementById('total_harga').innerHTML = Cart.total_harga;
  }
</script>
@endsection