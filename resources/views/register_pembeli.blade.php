<!DOCTYPE html>
<html lang="en">
<head>
	<title>Tumbas.ne</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ url('theme-assets/logo.png') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ url('vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ url('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ url('vendor/animate/animate.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ url('vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ url('vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ url('css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{ url('theme-assets/logo.png') }}" alt="IMG">
					<!-- <img src="{{ url('images/img-01.png') }}" alt="IMG"> -->
				</div>

				<form class="login100-form validate-form" action="{{ url('save_register') }}" method="post" style="margin-top: -145px;" enctype="multipart/form-data">
					{{ csrf_field() }}
					<!-- <span class="login100-form-title" style="padding-bottom: 10px;">
						Tumbas.ne
					</span> -->
					<span class="login100-form-title" style="padding-bottom: 45px;">
						Customers Register
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Name is required">
						<input class="input100" type="text" name="nama" id="nama" placeholder="Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-users" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Class is required">
						<select name="kelas" id="kelas" class="input100">
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
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-home" style="font-size: 20px;" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Email is required">
						<input class="input100" type="text" name="email" id="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Number Phone is required">
						<input class="input100" type="text" name="no_telp" id="no_telp" placeholder="Number Phone">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="username" id="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" id="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input style="padding-top: 7px;" class="input200" type="file" name="image" id="image">
						<span class="symbol-input100">
							<i class="fa fa-image" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Register
						</button>
					</div>

					<div class="text-center p-t-20">
						<p class="txt2">Have an Account?</p>
						<a class="txt2" href="{{ url('/login_pembeli') }}">
							Click Here
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="{{ url('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ url('vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ url('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ url('vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ url('vendor/tilt/tilt.jquery.min.js') }}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="{{ url('js/main.js') }}"></script>

</body>
</html>