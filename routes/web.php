<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//route to show admin dashboard
Route::get('/', function () {
    return view('adminDashboard.includes.dashboard');
})->name('dashboard');

//route to show users list
 Route::get('users', [Controller::class, 'showUsers'])->name('users');

 //route to show products ist
Route::get('products', [Controller::class, 'showProducts'])->name('products');

//route to show orders list
Route::get('orders', [Controller::class, 'showOrders'])->name('orders');

//route to show add product form
Route::get('product', [Controller::class, 'addProduct'])->name('add.product');

//route to store product in db
Route::post('/products', [ProductController::class, 'store'])->name('store.product');

