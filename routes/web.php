<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [ProductController::class, 'index']);
Route::get('/get-products', [ProductController::class, 'getProducts']);
Route::get('/edit/{id}', [ProductController::class, 'edit']);
Route::post('/store', [ProductController::class, 'store']);
Route::post('/update', [ProductController::class, 'update']);
