<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataUserController;
use App\Http\Controllers\Admin\PembelianController;
use App\Http\Controllers\Admin\PengembalianController;
use App\Http\Controllers\Admin\PesananController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Frontend\BelanjaController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\DatadiriController;
use App\Http\Controllers\Frontend\FrontendController as FrontendFrontendController;
use App\Http\Controllers\Frontend\KeranjangController;
use App\Http\Controllers\Frontend\OngkirController;
use App\Http\Controllers\Frontend\Wishlistcontroller;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Users\MyProfilController;
use App\Models\Keranjang;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use PHPUnit\TextUI\XmlConfiguration\Group;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//frontend
route::get('/',[FrontendFrontendController::class,'index'])->middleware(['guest']);
route::get('/',[FrontendFrontendController::class,'index'])->name('home');
route::get('detail-prod/{id}',[FrontendFrontendController::class,'detail']);
route::get('/view-category/{nama_kategori}',[FrontendFrontendController::class,'viewcategori']);

route::get('/produk-list',[FrontendFrontendController::class,'produklistAjax']);
route::post('searchproduk',[FrontendFrontendController::class,'Searchproduk']);


Auth::routes(['verify' => true]);

Route::get('auth/google',[App\Http\Controllers\GoogleController::class,'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback',[App\Http\Controllers\GoogleController::class,'callback'])->name('google.callback');

route::get('load-cart-data',[KeranjangController::class,'cartcount']);
route::get('load-wishlist-data',[Wishlistcontroller::class,'wishlistcount']);

route::get('/home',[FrontendFrontendController::class,'index'])->middleware(['auth','verified']);
// route::get('myprofil',[FrontendController::class,'myprofil']);
route::post('/add-to-keranjang',[KeranjangController::class,'add']);
route::post('add-to-wishlist',[Wishlistcontroller::class,'add']);
route::post('update-cart',[KeranjangController::class,'updatecart']);
route::get('/invoice/{id}', [CheckoutController::class,'invoice']);
route::get('detail-riwayatpembelian/{id}',[BelanjaController::class,'view']);



route::middleware(['auth','verified'])->group(function(){
    route::get('keranjang',[KeranjangController::class,'index']);
    route::get('/checkout',[CheckoutController::class,'index']);
    
    route::post('/detail-pesanan',[CheckoutController::class,'pesan']);
    route::get('/detail-pesanan/{id}',[CheckoutController::class,'view']);
    
    route::get('/data-diri',[DatadiriController::class,'index']);
    route::put('update-datadiri',[DatadiriController::class,'update']);

    route::get('hapus/{id}',[KeranjangController::class,'delete']);
    route::get('hapus-wish/{id}',[Wishlistcontroller::class,'hapus']);

    route::get('/wishlist',[Wishlistcontroller::class,'index']);
    route::post('add-to-wishlist',[Wishlistcontroller::class,'add']);
    
    Route::post('/save',[CheckoutController::class,'simpan']);
    Route::get('/ongkir',[CheckoutController::class,'cekongkir']);
    Route::get('/cities/{province_id}', [CheckoutController::class,'getCities']);
    Route::get('getCity/ajax/{id}',[CheckoutController::class,'ajax']);

    route::get('belanja',[BelanjaController::class,'index']);
    route::get('permintaan-return',[CheckoutController::class,'return']);
    route::post('/pengajuan-return',[CheckoutController::class,'kirim']);
    route::post('/update-ket',[BelanjaController::class,'ket']);
});


Route::middleware(['auth','isAdmin'])->group(function(){
    route::get('/dashboard',[DashboardController::class,'index']);

    //category
    route::get('categories',[CategoryController::class,'index']);
    route::get('add-category',[CategoryController::class,'add']);
    route::post('insert-category',[CategoryController::class,'tambah']);
    route::get('edit-prod/{id}',[CategoryController::class,'edit']);
    route::put('update-category/{id}',[CategoryController::class,'update']);
    route::get('delete-category/{id}',[CategoryController::class,'delete']);

    //product
    route::get('products',[ProductController::class,'index']);
    route::get('add-product',[ProductController::class,'add']);
    route::post('insert-product',[ProductController::class,'insert']);
    route::get('edit-produk/{id}',[ProductController::class,'edit']);
    route::put('update-product/{id}',[ProductController::class,'update']);
    route::get('delete-product/{id}',[ProductController::class,'delete']);
    route::get('ekspor-product',[ProductController::class,'ekspor']);
    
    //user
    route::get('datauser',[UsersController::class,'index']);
    route::get('view-users/{id}',[UsersController::class,'viewuser']);

    //pesanan
    route::get('pesanan',[PesananController::class,'index']);
    route::get('adminview-pesan/{id}',[PesananController::class,'view']);

    //pembelian
    route::get('/pembelian',[PembelianController::class,'index']);
    route::post('filter-data',[PembelianController::class,'filter']);
    route::post('ekspor-penjualan',[PembelianController::class,'ekspor']);

    //pengembalian
    route::get('permintaan-pengembalian',[PengembalianController::class,'index']);
});

Route::middleware(['auth','tambah'])->group(function(){

});