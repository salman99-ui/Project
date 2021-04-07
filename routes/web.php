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

Route::get('/p' , [\App\Http\Controllers\mycontroller::class , 'index']);
Route::get('/stock' , [\App\Http\Controllers\mycontroller::class , 'stock']);
Route::get('/h' , function() {
    return 'Hello world' ;
});
