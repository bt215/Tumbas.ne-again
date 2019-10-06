@extends("template_pembeli")
@section("content")
<div class="container-fluid">
		<!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-0">
            <a href="{{ url('/pembeli') }}" class="h1 mt-1 mb-0 text-danger">Pembeli</a>
          </div>
<form action="{{ url('pelanggan/search') }}" method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" style="float: right;">
	{{ csrf_field() }}
    <div class="input-group">
      <input type="text" class="form-control border-1 small" placeholder="Cari Admin" name="search">
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
	@foreach($pembelis as $pembeli)
	<div class="card col-md-3" style="margin: 10px; margin-left: 60px; margin-bottom: 45px;">
		<div class="card-header text-center" style="padding-bottom: 0;">
 			<h1 class="h2">{{ $pembeli->nama }}</h1>
 		</div>
 		<hr>
 		<div class="card-body">
 			<span><img src="{{ url('storage/fotoPembeli/'.$pembeli->image) }}" width="150" class="image" style="margin-left: 15px; margin-top: -15px;"></span>
 			<br>
 			<br>
 			<button type="button" class="btn btn-info col-md-12" data-toggle="modal" data-target="#modal2" onclick='Detail({!! json_encode($pembeli) !!})'>
					Detail
			</button>
 		</div>
 		<div class="card-footer">
 			<div style="float: left;">
 				<button type="button" class="btn btn-primary ft-edit" data-toggle="modal" data-target="#modal1" onclick='Edit({!! json_encode($pembeli) !!})'></button>
 			</div>
 			<div style="float: right;">
 				<a href='{{ url("/delete_pembeli/$pembeli->id_pembeli") }}'>
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
			<form action="{{ url('save_pembeli') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<input type="hidden" name="action" id="action">
				<input type="hidden" name="id_pembeli" id="id_pembeli">
				<div class="modal-body">
					Nama Pembeli
					<input type="text" name="nama" id="nama" class="form-control" required />
					Kelas
					<select name="kelas" id="kelas" class="form-control">
						<option value="11 RPL 1">11 RPL 1</option>
						<option value="11 RPL 2">11 RPL 2</option>
						<option value="11 RPL 3">11 RPL 3</option>
						<option value="11 RPL 4">11 RPL 4</option>
						<option value="11 RPL 5">11 RPL 5</option>
						<option value="11 RPL 6">11 RPL 6</option>
						<option value="11 RPL 7">11 RPL 7</option>
						<option value="11 TKJ 1">11 TKJ 1</option>
						<option value="11 TKJ 2">11 TKJ 2</option>
						<option value="11 TKJ 3">11 TKJ 3</option>
						<option value="11 TKJ 4">11 TKJ 4</option>
						<option value="11 TKJ 5">11 TKJ 5</option>
						<option value="11 TKJ 6">11 TKJ 6</option>
					</select>
					Email
					<input type="email" name="email" id="email" class="form-control" required />
					Nomor Telepon
					<input type="text" name="no_telp" id="no_telp" class="form-control" required />
					Saldo
					<input type="number" name="saldo" id="saldo" class="form-control" required />
					Username
					<input type="text" name="username" id="username" class="form-control" required />
					Password
					<input type="text" name="password" id="password" class="form-control" required />
					Foto Pembeli
					<input type="file" name="image" id="image" class="form-control" accept="image/jpg" />
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
				<h3>Detail Pembeli</h3>
				<span class="close" data-dismiss="modal">&times;</span>
			</div>
			<div class="modal-body">
				<div class="row col-sm-12">
					<div class="col-sm-4">
						ID Pembeli : 
					</div>
					<div class="col-sm-8">
						<p id="id_pembeli2"></p>
					</div>
					<div class="col-sm-4">
						Nama Pembeli : 
					</div>
					<div class="col-sm-8">
						<p id="nama2"></p>
					</div>
					<div class="col-sm-4">
						Kelas : 
					</div>
					<div class="col-sm-8">
						<p id="kelas2"></p>
					</div>
					<div class="col-sm-4">
						Email : 
					</div>
					<div class="col-sm-8">
						<p id="email2"></p>
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
		document.getElementById('judul').innerHTML = "Form Tambah Pembeli";
		$('#id_pembeli').val(""); //sama seperti document.getElementById
		$('#nama').val("");
		$('#email').val("");
		$('#no_telp').val("");
		$('#saldo').val("");
		$('#username').val("");
		$('#password').val("");
		$('#image').val("");
		$('#image').prop("required",true);
		$('#action').val("insert");
	}

	function Edit(Pembeli) {
		document.getElementById('judul').innerHTML = "Form Edit Pembeli";
		$('#id_pembeli').val(Pembeli.id_pembeli); //sama seperti document.getElementById
		$('#nama').val(Pembeli.nama);
		$('#kelas').val(Pembeli.kelas);
		$('#email').val(Pembeli.email);
		$('#no_telp').val(Pembeli.no_telp);
		$('#saldo').val(Pembeli.saldo);
		$('#username').val(Pembeli.username);
		$('#password').val(Pembeli.password);
		$('#image').val("");
		$('#image').prop("required",false);
		$('#action').val("update");
	}

	function Detail(Pembeli) {
		document.getElementById('id_pembeli2').innerHTML = Pembeli.id_pembeli;
		document.getElementById('nama2').innerHTML = Pembeli.nama;
		document.getElementById('kelas2').innerHTML = Pembeli.kelas;
		document.getElementById('email2').innerHTML = Pembeli.email;
		document.getElementById('no_telp2').innerHTML = Pembeli.no_telp;
		document.getElementById('saldo2').innerHTML = Pembeli.saldo;
		document.getElementById('username2').innerHTML = Pembeli.username;
		document.getElementById('password2').innerHTML = Pembeli.password;
	}
</script>
</div>
@endsection