<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Http\Request;

class AuthController extends BaseController
{
    public function auth(){
    	$authheader	=	\request()->header('Authorization'); //basic xxxbase64encodexxx
    	$keyauth	=	substr($authheader, 6);	//menghilangkan teks basic

    	$plainauth	=	base64_decode($keyauth);	//decode teks info login
    	$tokenauth	=	explode(':', $plainauth);	//pisahkan email:password

    	$email		=	$tokenauth[0];	//email
    	$pass		=	$tokenauth[1];	//password

    	$data		= (new Customer())->newQuery()
    					->where(['email'=>$mail])
    					->get(['id', 'first_name', 'last_name', 'email', 'password'])->first();

    	if($data == null){	//jika customer tidak ditemukan
    		return $this->ou(status: 'Gagal', code: '404',	//404(not found)
    			error: ['Pengguna tidak ditemukan'],
    		);
    	} else {	//jika customer ditemukan
    		if (Hash::check($pass, $data->password)) {	//cek jika password cocok maka
    			$data->token = hash('sha256', Str::random(10));	//buat token untuk di kirim ke client
    			unset($data->password);	//hilangkan informasi password yang akan dikirim ke client
    			$data->update();	//update token disimpan di tb_customers

    			return $this->out(data: $data, status: 'OK');

    		} else {	//jika password tidak cocok maka
    			return $this->out(status: 'Gagal', code: 401,	//401 unauthorized
    				error: ['Anda tidak memiliki wewenang'],
    			);
    		}
    	}
    }
}
