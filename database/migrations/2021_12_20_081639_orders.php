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
        Schema::drop('tb_orders');
    }
}
