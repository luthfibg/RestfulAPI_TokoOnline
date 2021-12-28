<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        # [004] membuat struktur tabel
        Schema::create('tb_products', function(Blueprint $b){
            $b->id();
            $b->string('title', 80);
            $b->string('category', 50);
            $b->double('price');
            $b->text('descriptions');
            $b->integer('stock');
            $b->boolean('free_shipping');
            $b->double('rate');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        # [005] Tambahkan perintah hapus tabel di method down(). Perintah ini digunakan untuk menghapus table products apabila menjalankan "php artisan migrate:reset".
        Schema::drop('tb_products');
    }

}


# [006] Selanjutnya ke terminal jalankan > php artisan make:migration Customers

# [007] Refresh table melalui terminal jalankan > php artisan migrate:fresh

##############Next to database/migrations/xxxx_customers.php