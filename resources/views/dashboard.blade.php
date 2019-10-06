@extends('template_dashboard')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-0">
            <a href="{{ url('/dashboard') }}" class="h1 mt-1 mb-0 text-danger">Dashboard</a>
          </div>

          <br>
          <br>

          <!-- Content Row -->
          <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-m font-weight-bold text-primary text-uppercase mb-1">Admin</div>
                      <div class="h1 mb-2 font-weight-bold text-gray-800">{{ $admin }}</div>
                      <!-- <br> -->
                      <a href="{{ url('/admin') }}" class="text-black">Lebih Detail <i class="fas fa-angle-double-right"></i></a>
                    </div>
                    <div class="col-auto">
                      <i class="ft-user fa-3x text-black-500"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-m font-weight-bold text-primary text-uppercase mb-1">Kantin</div>
                      <div class="h1 mb-2 font-weight-bold text-gray-800">{{ $kantin }}</div>
                      <!-- <br> -->
                      <a href="{{ url('/kantin') }}" class="text-black">Lebih Detail <i class="fas fa-angle-double-right"></i></a>
                    </div>
                    <div class="col-auto">
                      <i class="ft-shopping-cart fa-3x text-black-500"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-m font-weight-bold text-primary text-uppercase mb-1">Pembeli</div>
                      <div class="h1 mb-2 font-weight-bold text-gray-800">{{ $pembeli }}</div>
                      <!-- <br> -->
                      <a href="{{ url('/pembeli') }}" class="text-black">Lebih Detail <i class="fas fa-angle-double-right"></i></a>
                    </div>
                    <div class="col-auto">
                      <i class="ft-users fa-3x text-black-500"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-m font-weight-bold text-primary text-uppercase mb-1">Laporan</div>
                      <div class="h1 mb-2 font-weight-bold text-gray-800">{{ $detail_cart }}</div>
                      <!-- <br> -->
                      <a href="{{ url('/laporan') }}" class="text-black">Lebih Detail <i class="fas fa-angle-double-right"></i></a>
                    </div>
                    <div class="col-auto">
                      <i class="ft-clipboard fa-3x text-black-500"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="d-sm-flex align-items-center justify-content-between mb-0">
            <a href="#" class="h1 mt-1 mb-0 text-danger">Isi Ulang Saldo</a>
          </div>
          <hr>
          <br>
          <form action="{{ url('isi_ulang_pembeli') }}" method="post">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-sm-12">
            <h5><i class="ft-chevron-right"></i>Isi Saldo Pembeli</h5>
          </div>
          <div class="col-sm-12">
            <?php if (Session::has("message")): ?>
  <div class="alert alert-dismissible alert-info">
    {{ Session::get("message") }}
    <span class="close" data-dismiss="alert">&times;</span>
  </div>
<?php endif ?>
          </div>
          <br>
          <div class="col-sm-3">
            Pilih Pembeli
          </div>
          <div class="col-sm-9">
            <select class="form-control" name="id_pembeli" id="id_pembeli" required>
              @foreach($pembelis as $p)
              <option value="{{ $p->id_pembeli }}">
                {{ $p->nama }}
              </option>
              @endforeach
            </select>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-3">
            Nominal Saldo
          </div>
          <div class="col-sm-9">
            <input type="number" id="saldo_pembeli" name="saldo_pembeli" class="form-control">
          </div>
        </div>
        <br>
        <button type="submit" class="btn btn-success">
          Isi Ulang
        </button>
      </form>
      <br>
      <br>

      <form action="{{ url('isi_ulang_penjual') }}" method="post">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-sm-12">
            <h5><i class="ft-chevron-right"></i>Isi Saldo Penjual</h5>
          </div>
          <br>
          <br>
          <div class="col-sm-3">
            Pilih Penjual
          </div>
          <div class="col-sm-9">
            <select class="form-control" name="id_kantin" id="id_kantin" required>
              @foreach($kantins as $k)
              <option value="{{ $k->id_kantin }}">
                {{ $k->nama_penjual }}
              </option>
              @endforeach
            </select>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-3">
            Nominal Saldo
          </div>
          <div class="col-sm-9">
            <input type="number" id="saldo_penjual" name="saldo_penjual" class="form-control">
          </div>
        </div>
        <br>
        <button type="submit" class="btn btn-success">
          Isi Ulang
        </button>
      </form>

        </div>
        <!-- /.container-fluid -->
@endsection    