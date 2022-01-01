<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

# [090] Edit isi return view() menjadi 'login'
Route::get('/', function () {
    return view('login');
});

# [091] Buat file login.blade.php di /resources/views/
###############################Next to /resources/views/login.blade.php
