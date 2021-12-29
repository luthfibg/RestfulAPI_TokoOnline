<?php

namespace App\Http\Middleware;

# [075] Tambahkan model Customers
use App\Models\Customers;
use Closure;
use Illuminate\Http\Request;

class Authorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    // Untuk memberikan perintah, isikan di dalam method handle
    public function handle(Request $request, Closure $next)
    {
        # [076] dapatkan token dari header
        $token      = $request->header('token');

        # [077] cari customer berdasarkan data token
        $customer   = Customers::where('token', $token)->first();


        # [078] Cek kondisi jika cudtomer tidak ada atau token kosong,
        if ( $customer == null || $token == '' ) {

            # [078] stop proses dan kirimkan response token invalid
            return response()->json([ 'status'      => 'Invalid',
                    'data'      => null,
                    'error'     => ['Token invalid, unauthorized!']
                ], 401 //status 401 = unauthorized
            );
        }

        # [079] Jika customer ada dan sesuai, simpan informasi user dari object customer
        $request->setUserResolver(function () use ($customer){
            return $customer;
        });


        /*Instruksi $next($request) digunakan untuk melanjutkan eksekusi ke controller. Namun bila ingin dihentikan sebelum masuk ke controller, maka jangan menjalankan perintah tersebut.*/

        # [080] lanjutkan proses berikutnya
        return $next($request);
    }
}
#############Setelah selesai, daftarkan middleware authorization ke kernel.php di /app/Http/Kernel.php
/*Daftarkan middleware authorization sebagai routeMiddleware di Kernel.php (Gulir paling bawah)*/
