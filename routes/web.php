<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
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



Route::get('/', [CheckoutController::class,'index'])->name('productpage');

Route::get('/charge', [CheckoutController::class,'redirectpage']);

Route::post('/charge', [CheckoutController::class,'charge']);