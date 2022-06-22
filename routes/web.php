<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\AkunController;
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
// Route::get('/',[ApiController::class,'city']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function(){
    Route::get('/profil',[AkunController::class,'index']);
    Route::post('/profil/{id}',[AkunController::class,'update']);
    Route::get('/add-guest',[GuestController::class,'create']);
    Route::post('/add-guest',[GuestController::class,'store']);
    Route::delete('/guest/{id}', [GuestController::class, 'destroy']);
    Route::get('/guest/{id}/detail',[GuestController::class,'show']);
    Route::put('/guest/{id}',[GuestController::class,'update']);
    Route::post('/getCity',[GuestController::class,'getCity'])->name('getCity');
});


Route::get('/province',[ApiController::class,'province']);
Route::get('/city',[ApiController::class,'city']);