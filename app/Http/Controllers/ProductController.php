<?php

namespace App\Http\Controllers;

use App\Models\Products;

# [044] Gunakan turunan class BaseController
class ProductController extends BaseController
{
    public function findAll(){

        # [045] Gunakan model Product dan paginate(), untuk menampilkan data produk. Setiap halaman 10 data. Tampilkan field yang diperlukan saja seperti; id, title, category, price, rate, dan free_shipping. 
    	$data = Products::paginate(20,
    		['id', 'title', 'category', 'price', 'stock', 'free_shipping', 'rate']);

        # [046] Jika jumlah data kosong maka kembalikan luaran status kosong. code 204 (content empty). Selain itu (jika data tersedia) kembalikan luaran data produk.
    	if( count($data) == 0 ){
    		return $this->out(data:[], status:'Kosong', code:204);
    	} else {
    		return $this->out(data: $data, status: 'OK');
    	}
    }


    # [049] Tambahkan method findOne() di controller ProductController
    /*
    findOne(Product $produk)
    Keterangan: Parameter menggunakan objek Model Eloquent. Nilai dari route akan dijalankan langsung dan hasilnya akan diterima variabel $produk, dicari berdasarkan id (Primary Key). Apabila data tidak ditemukan maka akan memberikan error 404.

    Lakukan testing endpoint menggunakan Postman dengan endpoint /products/{id}
    */
    public function findOne(Products $produk){
    	return $this->out(data: $produk, status: 'OK');
    }
    /*Setelah berhasil, Lanjut pembuatan operasi CRUD:
    Create, Read, Update, Delete, Authorization*/
}

/****************************************************************************
[047]
    Jalankan Postman untuk pengujian.
    Isikan Method : GET
    url: http://127.0.0.1.8000/api/products
    Klik tombol Send

    Lihat pada bagian Body. Buka format Pretty untuk melihat hasil berupa format JSON


*****************************************************************************/

/****************************************************************************

    Siapkan UI/UX Product Detail yang telah dibuat sebelumnya

    Tampilannya menampilkan
    - Title
    - Category
    - Price
    - Rate
    - Stock
    - free_shipping
    - description

*****************************************************************************/

##########################################Next to _apidoc_product_detail.txt

/****************************************************************************
[050]
    Pembuatan operasi Create melalui restful API. Tabel yang akan dibuatkan operasi CRUD adalah tabel Order. Buatlah class Controller OrderController melalui terminal:
    > php artisan make:controller OrderController


*****************************************************************************/

##########################################Next to /routes/api.php
