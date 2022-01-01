<!--

	JQuery adalah library javascript yang kecil, banyak fitur untuk menyederhanakan/memanipulasi HTML, DOM, menangani event, animasi CSS, dan Ajax. Lisensi MIT gratis dan sumber terbuka.

	Implementasi JQuery digunakan pada sisi client (HTML, Javascript, CSS). Pada project Laravel, buatlah sebuah view di direktori: /resources/views/

 -->

 <!DOCTYPE html>
 <html>
 <head>

 	<!-- [089] Tambahkan library bootstrap dengan menambahkan tag link di <head></head> dan script di <body></body>. Tujuannya agar memudahkan kita untuk menyajikan UI menggunakan framework bootstrap -->
 	<link rel="stylesheet" type="text/css" href="{{ url('/assets/css/bootstrap.min.css', []) }}">

 	<title></title>

 </head>
 <body>
 
 	<!-- [087] Sebagai tanda di blade Laravel yang akan menampilkan isi kontennya. Pada file template.blade.php akan berlaku sebagai template/dasar tampilan untuk tampilannya lainnya. -->
 	@yield('konten')

 	<!-- [086] Untuk menggunakan library JQuery, ambil source Jquery dari Jquery CDN di: https://code.jquery.com Pilih versi jquery, pilih yang slim minified (ukuran ramping). Click copy untuk menyalin di clipboard. Paste di bagian body.-->
 	<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="
 	sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous">
 	</script>

 	<!--
	[088]
		Tambahkan library bootstrap

		Bootstrap adalah library sumber terbuka untukk sisi front-end (Tampilan antarmuka sisi pengguna). Bootstrap dapat diunduh di http://getbootstrap.com Klik tombol download untuk mengunduh. Atau buka link berikut: https://codeload.github.com/twbs/bootstrap/zip/v5.1.3

		Setelah file diunduh, extract file nya masuk ke direktori hasil ekstraksi file zip. Kemudian masuk ke direktori /dist

		Salin folder /css dan /js yang ada di direktori /dist ke project Laravel ke dalam direktori /public/assets/

 	-->

 	<script src="{{ url('/assets/js/bootstrap.bundle.min.js', []) }}"></script>

 	<!--

		AJAX

		Asynchronous Javascript And XMLHTTP. Teknik pada pemrograman web agar pertukaran data antar web browser dan server dapat terjadi tanpa harus memuat ulang seluruh halaman web. Sehingga dapat mempercepat interaksi.

		Modul AJAX pada JQuery digunakan dengan cara:

		$.ajax({
			url: <alamat url server yang dituju>,
			method: <Metode request: GET|POST|PATCH|DELETE>,
			headers: <bagian header request http>,
			dataType: <jenis konten: xml|json|script|html>,
			data: <Data yang dikirim bila menggunakan POST|PATCH|DELETE>,
			success: callback bila transaksi sukses,
			error: callback bila transaksi gagal
		});

 	-->

 	<!-- Implementasi authentication dengan membuat halaman login. Agar halaman login dapat diakses maka buatkan route. Next to /routes/web.php -->

 </body>
 </html>