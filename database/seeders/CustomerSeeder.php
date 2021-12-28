<?php

namespace Database\Seeders;

# [018] Tambahkan beberapa modul dibawah ini, termasuk: use Faker\Factory as DataPalsu.
# Ini adalah library Faker yang menyediakan data palsu
use App\Models\Customers;
use Illuminate\Database\Seeder;
use Faker\Factory as DataPalsu;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        # [019] Buat perintah sebagai berikut. Yang artinya:
        # Lakukan perulangan sebanyak 100 kali
        # Isi data ke variabel data[]
        # Lakukan insert secara bulk
        $datapalsu = DataPalsu::create('id_ID');
        $data = [];
        for ($i=0; $i < 100; $i++) { 
        	$gender = $datapalsu->randomElement(['male', 'female']);
        	$data[] = [
        		'email'			=>	$datapalsu->email(),
        		'first_name'	=>	$datapalsu->firstName($gender),
        		'last_name'		=>	$datapalsu->lastName(),
        		'city'			=>	$datapalsu->city(),
        		'address'		=>	$datapalsu->address(),
        		'password'		=>	Hash::make( '1234567' )
        	];
        }
        (new Customers())->insert($data);
    }
}

/*********************************************************
[020]
    Untuk menjalankan perintah Seeder, jalankan perintah di terminal > php artisan db:seed CustomerSeeder

    Perintah tersebut akan melakukan eksekusi class CustomerSeeder untuk mengisi data di tabel customer dengan data dummy

**********************************************************/

# [021] buat class Model Orders, jalankan > php artisan make:model Orders

############################Next to /app/Models/Orders.php
