@extends("template_kantin")
@section("content")
<div class="container-fluid">
		<!-- Page Heading -->
          <div class="d-sm-flex mb-0">
            <a href="{{ url('/kantin') }}" class="h1 mt-1 mb-0 text-danger">Kantin</a><span style="padding-left: 10px; padding-right: 10px;" class="ft-chevron-right h1 mt-1 mb-0 text-danger"></span><a href="#" class="h1 mt-1 mb-0 text-danger">Menu</a>
          </div>
<form action="{{ url('menu/search') }}" method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" style="float: right;">
	{{ csrf_field() }}
    <div class="input-group">
      <input type="text" class="form-control border-1 small" placeholder="Cari Menu" name="search">
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
	@foreach($menus as $menu)
	<div class="card col-md-3" style="margin: 10px; margin-left: 60px; margin-bottom: 45px;">
		<div class="card-header text-center" style="padding-bottom: 0;">
 			<h1 class="h2">{{ $menu->nama_menu }}</h1>
 		</div>
 		<hr>
 		<div class="card-body">
 			<span><img src="{{ url('storage/fotoMenu/'.$menu->image) }}" width="150" class="image" style="margin-left: 15px; margin-top: -15px; margin-bottom: 15px;"></span>
 			<hr>
 			<p>ID Menu : {{ $menu->id_menu }}</p>
 			<p>Deskripsi : <br>{{ $menu->deskripsi }}</p>
 			<p>Harga : {{ $menu->harga }}</p>
 		</div>
 		<div class="card-footer">
 			<div style="float: left;">
 				<button type="button" class="btn btn-primary ft-edit" data-toggle="modal" data-target="#modal1" onclick='Edit({!! json_encode($menu) !!})'>
 			</div>
 			<div style="float: right;">
 				<a href='{{ url("/delete_menu/$menu->id_menu") }}'>
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
			<form action="{{ url('/save_menu') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<input type="hidden" name="action" id="action">
				<input type="hidden" value="{{ $id_kantin }}" name="id_kantin">
				<input type="hidden" name="id_menu" id="id_menu">
				<div class="modal-body">
					Nama Menu
					<input type="text" name="nama_menu" id="nama_menu" class="form-control" required />
					Deskripsi
					<textarea type="text" name="deskripsi" id="deskripsi" class="form-control" required></textarea>
					Harga
					<input type="number" name="harga" id="harga" class="form-control" required />
					Foto Menu
					<input type="file" name="image" id="image" class="form-control" accept="image/jpg" />
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success ft-save" style="font-size: 20px;"></button>
				</div>
			</form>	
		</div>
	</div>
</div>

<script type="text/javascript">
	function Add() {
		document.getElementById('judul').innerHTML = "Form Tambah Menu";
		$('#id_menu').val(""); //sama seperti document.getElementById
		$('#nama_menu').val("");
		$('#deskripsi').val("");
		$('#harga').val("");
		$('#image').val("");
		$('#image').prop("required",true);
		$('#action').val("insert");
	}

	function Edit(Menu) {
		document.getElementById('judul').innerHTML = "Form Edit Menu";
		$('#id_menu').val(Menu.id_menu); //sama seperti document.getElementById
		$('#nama_menu').val(Menu.nama_menu);
		$('#deskripsi').val(Menu.deskripsi);
		$('#harga').val(Menu.harga);
		$('#image').val("");
		$('#image').prop("required",false);
		$('#action').val("update");
	}
</script>
</div>
@endsection