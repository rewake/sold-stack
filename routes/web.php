<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
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

// Welcome Route
Route::get('/', function () {
    return view('welcome');
});

// Admin Route Group
Route::prefix('admin')->middleware(['auth'])->group(function(){

    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');

    Route::resource('orders', OrdersController::class)->only('index');
    Route::resource('products', ProductsController::class)->except('show');
    Route::resource('inventory', InventoryController::class)->only('index');
    Route::resource('account', AccountController::class);

});

// Load Auth Routes
require __DIR__.'/auth.php';
