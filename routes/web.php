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



Route::get('/main' , [\App\Http\Controllers\mycontroller::class , 'index'])->middleware('cekuser');
Route::get('/stock' , [\App\Http\Controllers\mycontroller::class , 'stock'])->middleware('cekuser');
Route::get('/login' , [\App\Http\Controllers\mycontroller::class , 'login']);
Route::get('/update' , [\App\Http\Controllers\mycontroller::class , 'update']);
Route::get('/addtransaction' , [\App\Http\Controllers\mycontroller::class , 'addtransaction']);

Route::get('/transaction' , [\App\Http\Controllers\mycontroller::class , 'transaction']);

Route::post('/login/process' , [\App\Http\Controllers\mycontroller::class , 'authlogin']);
Route::post('/stock/process' , [\App\Http\Controllers\mycontroller::class , 'stockprocess']);
Route::post('/transaction/process' , [\App\Http\Controllers\mycontroller::class , 'transactionprocess']);

Route::get('/updatestock/{nama}' , [\App\Http\Controllers\mycontroller::class , 'updatestock']);
Route::post('/updatestock/process' , [\App\Http\Controllers\mycontroller::class , 'updatestockprocess']);
Route::get('/deletestock/{nama}' , [\App\Http\Controllers\mycontroller::class , 'deletestock']);

Route::get('/updatetransactions/{id}' , [\App\Http\Controllers\mycontroller::class , 'updatetransaction']);
Route::post('/updatetransactions/process' , [\App\Http\Controllers\mycontroller::class , 'updatetransactionprocess']);

Route::get('/deletetransactions/{id}' , [\App\Http\Controllers\mycontroller::class , 'deletetransactions']);

Route::get('/gettransaksi' , [\App\Http\Controllers\mycontroller::class , 'getpdftrans']) ;
Route::get('/getproducts' , [\App\Http\Controllers\mycontroller::class , 'getpdfstock']) ;

