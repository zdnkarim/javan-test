<?php

use App\Http\Controllers\MainController;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
$url = 
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[MainController::class,'index']);
Route::get('/edit/{id}',[MainController::class,'indexById']);
Route::get('/challange/{no}',[MainController::class,'challange']);
Route::get('/add',[MainController::class,'add']);
Route::post('/store',[MainController::class,'store']);
Route::post('/update/{id}',[MainController::class,'update']);
route::get('/delete/{id}',[MainController::class,'delete']);

