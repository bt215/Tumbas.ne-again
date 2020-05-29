@extends("template_kantin")
@section("content")
<div class="container-fluid">
		<!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-0">
            <a href="{{ url('/kantin') }}" class="h1 mt-1 mb-0 text-danger">Store</a>
          </div>
<form action="{{ url('kantin/search') }}" method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" style="float: right;">
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
<br>
<br>
<br>
<?php if (Session::has("message")): ?>
	<div class="alert alert-dismissible alert-info">
		{{ Session::get("message") }}
		<span class="close" data-dismiss="alert">&times;</span>
	</div>
<?php endif ?>
<div class="row">
	@foreach($kantins as $kantin)
	<div class="card col-md-3" style="margin: 10px; margin-left: 60px; margin-bottom: 45px;">
		<div class="card-header text-center" style="padding-bottom: 0;">
 			<h1 class="h2">{{ $kantin->nama_kantin }}</h1>
 		</div>
 		<hr>
 		<div class="card-body">
 			<span><img src="{{ url('storage/fotoKantin/'.$kantin->image_kantin) }}" width="150" class="image" style="margin-left: 15px; margin-top: -15px;"></span>
 			<br>
 			<br>
 			<a href='{{ url("/menu/$kantin->id_kantin") }}'>
				<button type="button" class="btn btn-success col-sm-12">Menu</button>
			</a>
			<br>
			<br>
			<button type="button" class="btn btn-info col-md-12" data-toggle="modal" data-target="#modal2" onclick='Detail({!! json_encode($kantin) !!})'>
					Detail
			</button>
 		</div>
 		<div class="card-footer">
 			<div style="float: left;">
 				<button type="button" class="btn btn-primary ft-edit" data-toggle="modal" data-target="#modal1" onclick='Edit({!! json_encode($kantin) !!})'>
 			</div>
 			<div style="float: right;">
 				<a href='{{ url("/delete_kantin/$kantin->id_kantin") }}'>
				<button type="button" class="btn btn-danger ft-trash"></button>
			</a>
 			</div>
 		</div>
	</div>
	@endforeach
</div>
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal1" onclick="Add()">Tambah Data</button>

<div class="modal fade" id="modal1">
	<div class="modal-dialog" style="margin-left: 550px; margin-top:60px;">
		<div class="modal-content">
			<div class="modal-header">
				<h3 id="judul"></h3>
				<span class="close" data-dismiss="modal">&times;</span>
			</div>
			<form action="{{ url('save_kantin') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<input type="hidden" name="action" id="action">
				<input type="hidden" name="id_kantin" id="id_kantin">
				<input type="hidden" name="id_penjual" id="id_penjual">
				<div class="modal-body">
					Nama Kantin
					<input type="text" name="nama_kantin" id="nama_kantin" class="form-control" required />
					Nama Penjual
					<input type="text" name="nama_penjual" id="nama_penjual" class="form-control" required />
					Nomor Telepon
					<input type="text" name="no_telp" id="no_telp" class="form-control" required />
					Saldo
					<input type="number" name="saldo" id="saldo" class="form-control" required />
					Username
					<input type="text" name="username" id="username" class="form-control" required />
					Password
					<input type="text" name="password" id="password" class="form-control" required />
					Foto Penjual
					<input type="file" name="image_penjual" id="image_penjual" class="form-control" accept="image/jpg" />
					Foto Kantin
					<input type="file" name="image_kantin" id="image_kantin" class="form-control" accept="image/jpg" />
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success ft-save" style="font-size: 20px;"></button>
				</div>
			</form>	
		</div>
	</div>
</div>

<div class="modal fade" id="modal2">
	<div class="modal-dialog modal-md" style="margin-left: 550px; margin-top:80px;">
		<div class="modal-content">
			<div class="modal-header">
				<h3>Detail Penjual</h3>
				<span class="close" data-dismiss="modal">&times;</span>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12 mb-1 text-center">
						Foto Penjual
					</div>
					<div class="col-sm-12">
						<img id="image_penjual2" class="mb-1" width="200" style="margin-left: 9.5rem;">
					</div>
					<div class="col-sm-4">
						ID Kantin : 
					</div>
					<div class="col-sm-8">
						<p id="id_kantin2"></p>
					</div>
					<div class="col-sm-4">
						ID Penjual : 
					</div>
					<div class="col-sm-8">
						<p id="id_penjual2"></p>
					</div>
					<div class="col-sm-4">
						Nama Kantin : 
					</div>
					<div class="col-sm-8">
						<p id="nama_kantin2"></p>
					</div>
					<div class="col-sm-4">
						Nama Penjual : 
					</div>
					<div class="col-sm-8">
						<p id="nama_penjual2"></p>
					</div>
					<div class="col-sm-4">
						Nomor Telepon : 
					</div>
					<div class="col-sm-8">
						<p id="no_telp2"></p>
					</div>
					<div class="col-sm-4">
						Saldo : 
					</div>
					<div class="col-sm-8">
						<p id="saldo2"></p>
					</div>
					<div class="col-sm-4">
						Username : 
					</div>
					<div class="col-sm-8">
						<p id="username2"></p>
					</div>
					<div class="col-sm-4">
						Password : 
					</div>
					<div class="col-sm-8">
						<p id="password2"></p>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>	

<script type="text/javascript">
	function Add() {
		document.getElementById('judul').innerHTML = "Form Tambah Kantin";
		$('#id_kantin').val(""); //sama seperti document.getElementById
		$('#id_penjual').val("");
		$('#nama_kantin').val("");
		$('#nama_penjual').val("");
		$('#no_telp').val("");
		$('#saldo').val("");
		$('#username').val("");
		$('#password').val("");
		$('#image_penjual').val("");
		$('#image_penjual').prop("required",true);
		$('#image_kantin').val("");
		$('#image_kantin').prop("required",true);
		$('#action').val("insert");
	}

	function Edit(Kantin) {
		document.getElementById('judul').innerHTML = "Form Edit Kantin";
		$('#id_kantin').val(Kantin.id_kantin); //sama seperti document.getElementById
		$('#id_penjual').val(Kantin.id_penjual);
		$('#nama_kantin').val(Kantin.nama_kantin);
		$('#nama_penjual').val(Kantin.nama_penjual);
		$('#no_telp').val(Kantin.no_telp);
		$('#saldo').val(Kantin.saldo);
		$('#username').val(Kantin.username);
		$('#password').val(Kantin.password);
		$('#image_penjual').val("");
		$('#image_penjual').prop("required",false);
		$('#image_kantin').val("");
		$('#image_kantin').prop("required",false);
		$('#action').val("update");
	}

	function Detail(Kantin) {
		document.getElementById('id_kantin2').innerHTML = Kantin.id_kantin;
		document.getElementById('id_penjual2').innerHTML = Kantin.id_penjual;
		document.getElementById('nama_kantin2').innerHTML = Kantin.nama_kantin;
		document.getElementById('nama_penjual2').innerHTML = Kantin.nama_penjual;
		document.getElementById('no_telp2').innerHTML = Kantin.no_telp;
		document.getElementById('saldo2').innerHTML = Kantin.saldo;
		document.getElementById('username2').innerHTML = Kantin.username;
		document.getElementById('password2').innerHTML = Kantin.password;
		document.getElementById('image_penjual2').src =  "{{ url('storage/fotoPenjual/') }}"+"/"+Kantin.image_penjual;
	}
</script>
</div>
@endsection