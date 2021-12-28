<?php

# [016] modifikasi isi class menjadi seperti berikut
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    protected $table = 'tb_customers';
    const CREATED_AT = null;
    const UPDATED_AT = null;
    protected $guarded = [];
    
}

/*********************************************************
[017]
Seeder data Customer

Seeder data Customer digunakan untuk mengisi data dummy pada table customer. Buat file CustomerSeeder. jalankan di terminal > php artisan make: seeder CustomerSeeder

**********************************************************/

#################Next to /database/seeder/CustomerSeeder.php