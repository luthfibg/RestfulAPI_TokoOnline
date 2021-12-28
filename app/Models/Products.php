<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
	# [024] Modifikasi class berikut
    use HasFactory;
    protected $table = 'tb_products';
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $guarded = [];
}

/*******************************************************
[025]
Seeder digunakan untuk mengisikan data pertama kali, kita akan membuat data dummy. Buat file ProductSeeder. jalankan di terminal > php artisan make:seeder ProductSeeder

*******************************************************/

######################Next to /database/seeders/ProductSeeder.php