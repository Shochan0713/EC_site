<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ここから追加
Route::get('/login/admin', [App\Http\Controllers\Auth\LoginController::class, 'showAdminLoginForm']);
Route::get('/register/admin', [App\Http\Controllers\Auth\RegisterController::class, 'showAdminRegisterForm']);




Route::post('/login/admin', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin-login');;
Route::post('/register/admin', [App\Http\Controllers\Auth\RegisterController::class, 'registerAdmin'])->name('admin-register');

Route::view('admin', 'admin')->middleware('auth:admin')->name('admin-home');
Route::get('password/admin/reset', [App\Http\Controllers\Auth\AdminForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
Route::post('password/admin/email', [App\Http\Controllers\Auth\AdminForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
Route::get('password/admin/reset/{token}', [App\Http\Controllers\Auth\AdminResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');
Route::post('password/admin/reset', [App\Http\Controllers\Auth\AdminResetPasswordController::class, 'reset'])->name('admin.password.update');


//商品一覧
Route::get('/home/shop', [App\Http\Controllers\ShopController::class, 'shop'])->name('shop');


//カート
Route::get('/home/mycart', [App\Http\Controllers\ShopController::class, 'myCart'])->name('myCart');

Route::get('/home/mycart', [App\Http\Controllers\ShopController::class, 'myCart'])->middleware('auth');
Route::post('/home/mycart', [App\Http\Controllers\ShopController::class, 'addMycart']);
//削除
Route::post('/home/cartdelete', [App\Http\Controllers\ShopController::class, 'deleteCart']);

Route::post('/checkout', [App\Http\Controllers\ShopController::class,'checkout']);

//Mypage
Route::get('/mypage', [App\Http\Controllers\HomeController::class, 'myPageShow'])->name('myPage');

//ADMIN
// Route::get('/admin_store', [App\Http\Controllers\HomeController::class, 'adminStore'])->name('adminStore');

Route::get('/storelist', [App\Http\Controllers\AdminController::class, 'adminStore'])->name('adminStore');
Route::get('/stock_registration', [App\Http\Controllers\AdminController::class, 'storeRegistration'])->name('storeRegistration');
Route::post('/stock_registration', [App\Http\Controllers\AdminController::class, 'storeRegistration'])->name('storeRegistration');
Route::post('/stock_confirm', [App\Http\Controllers\AdminController::class, 'storeCofirm'])->name('storeCofirm');
Route::get('/stock_confirm', [App\Http\Controllers\AdminController::class, 'storeCofirm'])->name('storeCofirm');
Route::post('/stock_compleate', [App\Http\Controllers\AdminController::class, 'storeCompleate'])->name('storeCompleate');
//adminページ
Route::get('/mystore', [App\Http\Controllers\AdminController::class, 'myStore'])->name('myStore');

Route::get('/admin/item_list', [App\Http\Controllers\AdminController::class, 'itemList'])->name('itemList');