<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProfitReportController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::resource('product',ProductController::class);
Route::resource('productcategory',ProductCategoryController::class);
Route::get('getProduct',[SaleController::class,'getProduct'])->name('getProduct');
Route::get('getProductt',[SaleController::class,'getProduct'])->name('getProductt');
Route::get('getProductRate',[SaleController::class,'getProductRate'])->name('getProductRate');
Route::get('getProductRate',[PurchaseController::class,'getProductRate'])->name('getProductRate');


Route::resource('sales',SaleController::class);
Route::resource('purchases',PurchaseController::class);
Route::resource('profitreports',ProfitReportController::class);
