<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/',[ProductController::class,'index']);
Route::get('/product/create',[ProductController::class,'create']);
Route::post('/product/store',[ProductController::class,'store']);
Route::get('/products/{id}/edit',[ProductController::class,'edit']);
Route::get('/products/{id}/show',[ProductController::class,'show']);
Route::put('/products/{id}/update',[ProductController::class,'update']);
Route::delete('/products/{id}/delete',[ProductController::class,'destroy']);
