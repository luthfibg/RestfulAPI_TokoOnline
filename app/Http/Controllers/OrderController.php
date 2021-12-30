<?php

namespace App\Http\Controllers;

# [053] Karena kita akan menggunakan model Order, Product, dan class Carbon  untuk format data waktu, maka tambahkan:
use App\Models\Orders, App\Models\Products, Carbon\Carbon;

class OrderController extends BaseController
{
    # [082] Buat constructor
    public function __construct()
    {
        # [083] Tambahkan instruksi penggunaan middleware:
        $this->middleware('authorization');
        /*****************************************************
        [084]
            Untuk menguji apakah authorization sudah sesuai atau belum, lakukan langkah Authentication seperti pada langkah test sebelumnya. Atribut "token" yang didapat digunakan untuk authorization setiap ingin mendapatkan sumberdaya yang ada di server. Penggunaannya gunakan pada header.
            Setelah header di set key token, klik Send dan lihat hasilnya. Selanjutnya lakukan pengujian tanpa menyertakan token di header. lihat hasilnya.

        ******************************************************/
    }

    # [052] Buat method store
    public function store()
    {
    	# [054] cari data produk berdasarkan product_id
    	$product = Products::find( \request('product_id') );

        # [055] jika data produk tidak ditemukan, kembalikan nilai dengan format produk tidak ditemukan
    	if($product == null){
    		return $this->out( status:'Gagal', code:404, error: ['Produk tidak ditemukan'] );
    	}

    	# [056] Jika produk ada, maka persiapkan data & Lakukan operasi insert
    	$order = new Orders();
    	$order->order_date	= Carbon::now('Asia/Jakarta');
    	$order->product_id  = $product->id;
    	$order->customer_id	= request('customer_id');
    	$order->qty 		= request('qty');
    	$order->price 		= $product->price;

        # [057] jika operasi insert berhasil, kirimkan status OK sedangkan jika operasi insert gagal maka kirimkan status gagal
    	if( $order->save() == true ) {
    		return $this->out(data: $order, status:'OK', code:201);
    	} else {
    		return $this->out(status:'Gagal', error: ['Order gagal disimpan'], code: 504);
    	}

        /*******************************************************************
        [058]
            Buka Postman, Silahkan Isikan Body dengan isian misal:
            customer_id     = 1
            Product_id      = 22
            Qty             = 21

            Klik send dan lihat nilai baliknya

            Contoh disini kita tidak memberikan data harga (price).
            Karena harga diambil langsung dari tabel products.  

        *******************************************************************/

        /******************************************************************

            Selanjutnya, buat operasi Read /orders, pertama buat dulu routesnya

        *******************************************************************/
        ###########################################Next to /routes/api.php
    }

    # [060] Tambahkan method findAll()
    public function findAll()
    {

    	# [061] Buat query join antara table 'Orders > Customers > Products'
    	$order 	= Orders::query()
    				->leftJoin('tb_customers', 'tb_customers.id', '=', 'tb_orders.customer_id')
    				->leftJoin('tb_products', 'tb_products.id', '=', 'tb_orders.product_id');

    	# [062] Cek apakah variabel q (query) untuk pencarian tersedia?
        //jika ada query "q" untuk pencarian products.title
    	if ( request()->has('q') ) { 
    		$q = request('q');

    		# [063] jika q tersedia maka tambahkan perintah "where" untuk filter data berdasarkan products.title
    		$order->where('tb_products.title', 'like', "%$q%");
    	}

    	# [064] Dapatkan data berupa paginate() sebanyak 10 data/halaman
    	$data = $order->paginate(10,
    				['tb_orders.*', 
    				'tb_customers.first_name', 
    				'tb_customers.last_name', 
    				'tb_customers.address', 'tb_customers.city', 
    				'tb_products.title as product_title']
    	);

    	# [065] Kirimkan data dengan status OK
    	return $this->out(data:$data, status:'OK');

        /*******************************************************************
        [066]
            Buka postman lagi, lakukan testing
            Method:GET
            Url: 127.0.0.1:8000/api/orders/?q=pulsa
            Klik send

            Maka hasilnya akan menampilkan data order yang memiliki produk
            (products.title) = "pulsa"

        ********************************************************************/
        ################################# Next to 'routes/api.php' untuk membuat fungsi read

        #################################Jika READ sudah berhasil, buat operasi UPDATE, buat routenya terlebih dahulu, ke routes/api.php
    }

    # [068] Tambahkan method update(), parameter yang digunakan adalah Model Orders, nantinya apabila id order nya benar, maka akan melanjutkan proses didalamnya. Namun bila id order tidak tersedia akan mengembalikan error 404
    public function update( Orders $order )
    {

        # [069] Data order di update berdasarkan variabel yang dikirimkan dari client. Apabila nama field yang dikirim dari client tidak sesuai maka akan terjadi kesalahan error 500
        $product    = Products::find( request('product_id') );

        if ($product == null) {
            return $this->out(status:'Gagal', code:404, error:['Produk tidak ditemukan']
            );
        }

        $order->product_id      = $product->id;
        $order->customer_id     = request('customer_id');
        $order->qty             = request('qty');
        $order->price           = $product->price;

        $hasil                  = $order->save();


        # [070] Jika proses update tidak terjadi error exception maka kembalikan dengan status OK bila update true dan Gagal bila update false
        return $this->out(
            status: $hasil ? 'OK' : 'Gagal',
            data:   $hasil ? $order : null,
            error:  $hasil ? null : ['Gagal merubah data'],
            code:   $hasil ? 201 : 504
        );

        /************************************************************************
        [071]
            Testing operasi Update /orders
            Gunakan Postman, misal ganti data order dengan id=2, Maka buat request
            dengan Method: PATCH.
            Url: http://127.0.0.1/8000/api/orders/2
            Pada tab body pilih raw
            Isikan
            {
                "customer_id": 52,
                "product_id": 12,
                "qty": 14,
            }

            Request ini akan meminta perubahan data order yang memiliki id=2, diganti isi customer_id=52, product_id=12, dan qty=14.

            ###########################################Next to /routes/api.php untuk pembuatan router Operasi DELETE.

        ***********************************************************************/
    }

    # [073] Tambahkan method delete(). Parameter yang digunakan adalah Model Orders, nantinya apabila id order nya benar maka akan melanjutkan proses hapus didalamnya. Namun bila id order tidak tersedia, akan mengembalikan error 404.
    public function delete( Orders $order )
    {
        # [074] Data order di delete berdasarkan variabel yang dikirimkan dari client. Apabila nama field yang dikirim dari client tidak sesuai maka akan terjadi kesalahan error 500. Jika proses delete tidak terjadi error exception maka kembalikan dengan status OK bila delete true dan Gagal bila delete false
        $hasil = $order->delete();
        return $this->out(
            status: $hasil ? 'OK' : 'Gagal',
            data: $hasil ? $order : null,
            error: $hasil ? null : ['Gagal hapus data'],
            code: $hasil ? 200 : 504,
        );

        /**********************************************************************
        [074]
            Testing operasi Delete /orders

            Gunakan Postman, misal ganti data order dengan id=3, Maka buat request
            dengan Method: DELETE
            Url: http://127.0.0.1/8000/api/orders/3
            Klik send

            Request ini akan meminta hapus data order yang memiliki id=3,

            Pastikan saat melakukan testing id order yang akan dihapus memang tersedia di tabel. Apabila id tidak tersedia, maka luarannya berupa halaman 404 (Page not found)

            ###########################################Next to _authorization.txt
        ***********************************************************************/
    }
}
    