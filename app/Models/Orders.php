<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
	# [022] modiifikasi isi class menjadi seperti berikut
    use HasFactory;
    protected $table = 'tb_orders';
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $guarded = [];
}

# [023] Buat class model Products, jalankan > php artisan make:model Products

############################Next to /app/Models/Products.php
