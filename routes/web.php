<?php

use App\Http\Controllers\CartItemController;
use App\Http\Controllers\TransaksiPembelianController;
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
    return view('dashboard.index');
});

Route::get('addCart', [CartItemController::class, 'addCart']);
Route::get('index', [TransaksiPembelianController::class, 'index']);
Route::get('charge', [TransaksiPembelianController::class, 'charge']);
Route::get('history', [TransaksiPembelianController::class, 'history']);
Route::get('detail', [TransaksiPembelianController::class, 'detail']);
Route::get('showDetail', [TransaksiPembelianController::class, 'showDetail']);