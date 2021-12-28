<?php

namespace App\Http\Controllers;

# [036] Koneksikan dengan class Customers
use App\Models\Customers;


use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends BaseController
{
    # [034] Buat method auth() untuk melakukan pencarian data customer berdasarkan email dan password
    public function auth(){

    /*********************************************************************/
        # [035] Dapatkan nilai email dan password yang dikirim oleh client melalui mekanisme Authorization basic

    	$authheader	=	\request()->header('Authorization'); //basic xxxbase64encodexxx
    	$keyauth	=	substr($authheader, 6);	//menghilangkan teks basic

    	$plainauth	=	base64_decode($keyauth);	//decode teks info login
    	$tokenauth	=	explode(':', $plainauth);	//pisahkan email:password

    	$email		=	$tokenauth[0];	//email
    	$pass		=	$tokenauth[1];	//password

    /*********************************************************************/

        # [037] Filter data customer berdasarkan email dan password. Ambil field yang dibutuhkan saja, seperti: id, first_name, last_name, dan email
    	$data		= (new Customer())->newQuery()
    					->where(['email'=>$mail])
    					->get(['id', 'first_name', 'last_name', 'email', 'password'])->first();

        # [038] Buat kondisi untuk menentukan output jika data customer terdaftar dan jika data customer tidak terdaftar
    	if($data == null){

            # [039] Jika customer tidak ditemukan, jalankan method out() berupa: Status=Gagal, Code=404(not found), Error=Pengguna tidak ditemukan
    		return $this->ou(status: 'Gagal', code: '404', error: ['Pengguna tidak ditemukan'],
    		);
    	}

        # [040] Jika customer ditemukan, maka
        else {

            # [040] Cek apakah Hash password dari tabel cocok dengan password yang dikirim oleh client?
    		if (Hash::check($pass, $data->password)) {
    			$data->token = hash('sha256', Str::random(10));	//buat token untuk di kirim ke client
    			unset($data->password);	//hilangkan informasi password yang akan dikirim ke client
    			$data->update();	//update token disimpan di tb_customers

    			return $this->out(data: $data, status: 'OK');

    		}

            # [041] Jika password tidak cocok maka keluarkan method out() dengan isi sebagai berikut
            else {
    			return $this->out(status: 'Gagal', code: 401,	//401 unauthorized
    				error: ['Anda tidak memiliki wewenang'],
    			);
    		}
    	}
    }
}

/*************************************************************************
[042]
    Kesimpulan kinerja method auth():
    
    Apabila email customer ditemukan, cek kembali apakah hash password yang ada di tabel customer cocok dengan password yang diberikan saat authorization?

    Jika cocok maka:
        - buat token
        - hilangkan informasi password
        - simpan token ke tabel
        - kirim informasi customer ke client

    Jika tidak cocok maka:
        - Kirim balik ke client bahwa mereka tidak memiliki wewenang

    Untuk memastikan apakah API telah sesuai dengan response, lakukan testing. Misalkan menggunakan aplikasi Postman.

    Sebelumnya lihat data yang ada di database. Sesuai dengan perintah di CustomerSeeder, password default adalah "1234567"

    Jalankan aplikasi laravel, Ketikan di terminal:
    > php artisan serve

    Buka aplikasi Postman,
    - Pilih method GET
    - Alamat(sesuai yang muncul di terminal): http://127.0.0.1/api/auth
    - Setting type ke: basic auth
    - Username: gunakan email dari customer
    - Password: 1234567 (Sesuai dengan yang di migration)
    - Klik send
    - Lihat hasil outputnya: Pilih Body dan Jenis Pretty

*************************************************************************/

/************************************************************************

    Masuk ke Desain UI/UX Products

    Pada contoh halaman produk, akan menampilkan:
    - Price
    - Category
    - Title
    - Rate
    - Stock
    - free_shipping

*************************************************************************/

#################################################Next to _apidoc_products.txt
