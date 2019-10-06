@extends("template_admin")
@section("content")
<div class="container-fluid">
		<!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-0">
            <a href="{{ url('/admin') }}" class="h1 mt-1 mb-0 text-danger">Admin</a>
          </div>
<form action="{{ url('admin/search') }}" method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" style="float: right;">
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
	@foreach($admins as $admin)
	<div class="card col-md-3" style="margin: 10px; margin-left: 60px; margin-bottom: 45px;">
		<div class="card-header text-center" style="padding-bottom: 0;">
 			<h1 class="h2">{{ $admin->nama }}</h1>
 		</div>
 		<hr>
 		<div class="card-body">
 			<span><img src="{{ url('storage/fotoAdmin/'.$admin->image) }}" width="150" class="image" style="margin-left: 15px; margin-top: -15px;"></span>
 			<br>
 			<br>
 			<button type="button" class="btn btn-info col-md-12" data-toggle="modal" data-target="#modal2" onclick='Detail({!! json_encode($admin) !!})'>
					Detail Admin
			</button>
 		</div>
 		<div class="card-footer">
 			<div style="float: left;">
 				<button type="button" class="btn btn-primary ft-edit" data-toggle="modal" data-target="#modal1" onclick='Edit({!! json_encode($admin) !!})'>
 			</div>
 			<div style="float: right;">
 				<a href='{{ url("/delete_admin/$admin->id_admin") }}'>
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
			<form action="{{ url('save_admin') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<input type="hidden" name="action" id="action">
				<input type="hidden" name="id_admin" id="id_admin">
				<div class="modal-body">
					Nama Admin
					<input type="text" name="nama" id="nama" class="form-control" required />
					Email
					<input type="email" name="email" id="email" class="form-control" required />
					Nomor Telepon
					<input type="text" name="no_telp" id="no_telp" class="form-control" required />
					Username
					<input type="text" name="username" id="username" class="form-control" required />
					Password
					<input type="text" name="password" id="password" class="form-control" required />
					Foto Admin
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
				<h3>Detail Admin</h3>
				<span class="close" data-dismiss="modal">&times;</span>
			</div>
			<div class="modal-body">
				<div class="row col-sm-12">
					<div class="col-sm-4">
						ID Admin : 
					</div>
					<div class="col-sm-8">
						<p id="id_admin2"></p>
					</div>
					<div class="col-sm-4">
						Nama Admin : 
					</div>
					<div class="col-sm-8">
						<p id="nama2"></p>
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
		document.getElementById('judul').innerHTML = "Form Tambah Admin";
		$('#id_admin').val(""); //sama seperti document.getElementById
		$('#nama').val("");
		$('#email').val("");
		$('#no_telp').val("");
		$('#username').val("");
		$('#password').val("");
		$('#image').val("");
		$('#image').prop("required",true);
		$('#action').val("insert");
	}

	function Edit(Admin) {
		document.getElementById('judul').innerHTML = "Form Edit Admin";
		$('#id_admin').val(Admin.id_admin); //sama seperti document.getElementById
		$('#nama').val(Admin.nama);
		$('#email').val(Admin.email);
		$('#no_telp').val(Admin.no_telp);
		$('#username').val(Admin.username);
		$('#password').val(Admin.password);
		$('#image').val("");
		$('#image').prop("required",false);
		$('#action').val("update");
	}

	function Detail(Admin) {
		document.getElementById('id_admin2').innerHTML = Admin.id_admin;
		document.getElementById('nama2').innerHTML = Admin.nama;
		document.getElementById('email2').innerHTML = Admin.email;
		document.getElementById('no_telp2').innerHTML = Admin.no_telp;
		document.getElementById('username2').innerHTML = Admin.username;
		document.getElementById('password2').innerHTML = Admin.password;
	}
</script>
</div>
@endsection