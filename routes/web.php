<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/' , [HomeController::class ,'index']);


Route::middleware(['auth:sanctum','verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('redirect' , [HomeController::class ,'redirect'])->middleware('auth','verified');

Route::get('view_category' , [AdminController::class ,'view_category']);
Route::post('add_category' , [AdminController::class ,'add_category']);
Route::get('all_category' , [AdminController::class ,'all_category']);
Route::get('delete_category/{id}' , [AdminController::class ,'delete_category']);


// product

Route::get('view_product' , [AdminController::class , 'view_product']);
Route::post('add_product' , [AdminController::class , 'add_product']);
Route::get('all_product' , [AdminController::class ,'all_product'])->name('all_product');
Route::get('delete_product/{id}' , [AdminController::class ,'delete_product']);
Route::get('update_product/{id}' , [AdminController::class ,'update_product']);
Route::post('edit_product/{id}' , [AdminController::class ,'edit_product']);

Route::get('product_details/{id}',[HomeController::class,'product_details']);

// search
Route::get('product_search',[HomeController::class,'product_search']);



// cart
Route::post('add_cart/{id}',[HomeController::class,'add_cart']);
Route::get('show_cart',[HomeController::class,'show_cart']);
Route::get('delete_cart/{id}' , [HomeController::class ,'delete_cart']);
Route::get('cash_order',[HomeController::class,'cash_order']);
// payment by stripe
Route::get('stripe/{totalprice}',[HomeController::class,'stripe']);

Route::post('stripe/{totalprice}',[HomeController::class, 'stripePost'])->name('stripe.post');

// add comment
Route::post('add_comment',[HomeController::class,'add_comment']);



// delete users
Route::get('delete_user/{id}',[AdminController::class,'delete_user']);


// show all orders
Route::get('order',[AdminController::class,'order']);

Route::get('delivered/{id}',[AdminController::class,'delivered']);


// print pdf

Route::get('print_pdf/{id}',[AdminController::class,'print_pdf']);


// send email
Route::get('send_email/{id}',[AdminController::class,'send_email']);
Route::post('send_user_email/{id}',[AdminController::class,'send_user_email']);


// search order in admin
Route::get('search',[AdminController::class,'searchdata']);



// show all products
Route::get('show_all_products',[HomeController::class,'show_all_products']);
// search in product view
Route::get('search_product',[HomeController::class,'search_product']);


