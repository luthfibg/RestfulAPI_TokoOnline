<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


# [033] Buat route dari AuthController, route /auth akan menjalankan controller AuthController method login
Route::get('/auth', [App\Http\Controllers\AuthController::class, 'auth']);
####################################Next to app/Http/Controller/AuthController.php

# [043] Buat route dari ProductController, route GET/products akan menjalankan controller ProductController method findAll
Route::get('/products', [\App\Http\Controllers\ProductController::class, 'findAll']);
####################################Next to app/Http/Controller/ProductController.php

# [048] Keterangan: route GET/products/{produk:id}
# {produk} = nama parameter di findOne $produk. Pada implementasinya pemanggilan route ini yaitu: http://alamatserver/api/products/{idproduk}. Contoh: http://127.0.0.1:8000/api/products/20
Route::get('/products{produk}', [\App\Http\Controllers\ProductController::class, 'findOne']);
####################################Next to app/Http/Controller/ProductController.php

# [051] Karena operasi CREATE adalah pengiriman data untuk disimpan, maka tambahkan route POST sebagai berikut
Route::post('/orders', [\App\Http\Controllers\OrderController::class, 'store']);
####################################Next to /app/Http/Controller/OrderController.php


# [059] Buat routes operasi READ, dengan memberikan kata kunci pencarian. Tambahkan route GET /orders
Route::get('/orders', [\App\Http\Controllers\OrderController::class, 'findAll']);
#####################################Next to /app/Http/Controllers/OrderController.php


# [067] untuk operasi Update, gunakan method PATCH pada pembuatan router /orders di routes/api.php
Route::patch('/orders/{order}', [\App\Http\Controllers\OrderController::class, 'update']);
// Data order id yang akan diubah dimasukkan ke parameter {order}, sehingga pada saat penggunaanya seperti: http://127.0.0.1.8000/api/2
#####################################Next to /app/Http/Controllers/OrderController.php

# [072] Untuk operasi Delete, gunakan method DELETE pada pembuatan router /orders di routes/api.php
Route::delete('/orders/{order}', [\App\Http\Controllers\OrderController::class, 'delete']);
// Data order id yang akan dihapus dimasukkan ke parameter {order}, sehingga pada saat penggunaannya seperti: 127.0.0.1:8000/api/orders/3
#####################################Next to /app/Http/Controllers/OrderController.php