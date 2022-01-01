// tunggu hingga dokumen selesai dimuat
document.addEventListener('DOMContentLoaded', (c)=>{

	// [095] Buat event click pada tombol login
	$('button#btn-login').on('click', ()=>{

		// [096] Dapatkan isi dari text email
		var email	= $('input[name=email]').val();

		// [097] Dapatkan isi dari text password
		var sandi	= $('input[name=password]').val();

		$.ajax({
			url: '/api/auth',
			dataType: 'json',
			method: 'GET',

			// [098] Kirim header authorization = base base64encode ( email:sandi )
			headers: {
				'Authorization': 'basic ' + window.btoa(email + ':' + sandi)
			},

			success:(msg)=>{
				alert(`Selamat datang ${msg.data.first_name} ${msg.data.last_name}`);

				// [099] Simpan token dari server
				window.localStorage.setItem('token', msg.data.token);

				// [100] Pindah ke list order
				window.location = '/list-order';
			},
			error:(req, status, err)=>{
				// [101] Tampilkan log agar dapat dibaca di console web developer tools
				console.log(req);

				// [102] Tampilkan pesan error dari server
				alert(req.responseJSON.error[0]);
			}
		});
	});
});