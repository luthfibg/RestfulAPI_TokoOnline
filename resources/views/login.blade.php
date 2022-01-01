<!--

	Implementasi Authentication

	Authentication adalah proses melakukan Login. Mengirim email dan password untuk dicocokan dengan tabel Customer di server. Jika cocok maka token yang dikirim harus di simpan.

-->

<!-- [093] Buat tampilannya -->


<!DOCTYPE html>
<html>
<head>
	<title>Login sistem</title>
</head>
<body class="d-flex align-items-center w-100 h-100">

	<!-- [092] login.blade.php menggunakan template.blade.php sebagai dasar tampilan -->

	@extends('template')

	@section('konten')

	<div class="container-fluid col-md-3" style="margin: 100px auto;">
		<div class="card">
			<div class="card-body">
				<p class="card-text">Masuk ke sistem</p>

				<div class="mb-3">
					<label for="email" class="form-label">Email</label>
					<input type="email" name="email" id="email" class="form-control" placeholder="Email" autocomplete="off" aria-describedby="helpId">
					<small id="helpId" class="text-muted">Email</small>
				</div>

				<div class="mb-3">
					<label for="password" class="form-label">Password</label>
					<input type="password" name="password" id="password" class="form-control" placeholder="Sandi" aria_describedby="helppass">
					<small id="helppass" class="text-muted">Password</small>
				</div>

				<button id="btn-login" class="btn btn-sm btn-primary float-end">Login</button>
			</div>
		</div>
	</div>

	<script src="{{ url('/assets/pages/login.js?v=3') }}"></script>

	@endsection
</body>
</html>


<!-- [094] Buat file javascript sebagai pengendali halaman view login. Buat file di direktori: /public/assets/pages dengan nama file login.js -->