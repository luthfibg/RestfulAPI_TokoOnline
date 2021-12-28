<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    # [030] Buat dan tambahkan method: out();
    public function out($data = null, $status = '', $error = null, $code = 200)
    {
        # [031] Penyeragaman data response, dengan format:
        # Status
        # data
        # error
    	return \response()->json(
    		[
    			'status'		=>	$status,
    			'data'			=>	$data,
    			'error'			=>	$error
    		], $code
    	);
    }
}
# Parameter:
# Data = berupa array/string
# Status = string berisi informasi
# Error = berupa array, pesan error
# Code = code http, default 200 (OK)

###########################(Opsional)Next to /_RESTfulapi_note.txt

/**********************************************************
[032]
    Buat AuthController
    Controller ini akan mengelola operasi yang diperlukan pada endpoint Auth.
    Untuk membuat controller Jalankan diterminal:
    > php artisan make:controller AuthController

**********************************************************/

##################################Next to /routes/api.php



