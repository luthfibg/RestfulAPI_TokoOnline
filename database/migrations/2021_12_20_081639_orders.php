<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        # [012] Buat struktur tabel orders dimana tabel orders melakukan relasi ke tabel products dan customers
        Schema::create('tb_orders', function(Blueprint $b){
            $b->id();
            $b->dateTime('order_date');
            $b->unsignedBigInteger('product_id');
            $b->unsignedBigInteger('customer_id');
            $b->integer('qty');
            $b->double('price');
            $b->foreign('product_id')->references('id')->on('tb_products');
            $b->foreign('customer_id')->references('id')->on('tb_customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        # [013] Buat perintah hapus tabel
        Schema::drop('tb_orders');
    }
}

/*******************************************************

    Cek design table di database 

********************************************************/

# [014] refresh database, jalankan > php artisan migrate:fresh

# [015] Class model adalah representasi tabel di sisi pemrograman. Untuk membuat model di Laravel, jalankan perintah berikut di terminal > php artisan make:model Customers

##########################Next to app/Models/Customers.php
