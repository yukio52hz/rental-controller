<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
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

//Route::post('/login',[ PagesController::class,'startSession']);
//index
//ruta con parametro
//rutas
Route::get('/',  [PagesController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=> 'admin','as'=>'admin'],function(){
    Route::get('/',  [AdminController::class, 'index']);
    Route::post('/usuarios/edit',[ AdminController::class,'updateUser']);
    Route::get('/usuarios/show/{id}',[ AdminController::class,'showUser']);
    Route::resource('/usuarios', AdminController::class);
});
Auth::routes();

 


