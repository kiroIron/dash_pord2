<?php

use App\Http\Controllers\admincontroller;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Loader\Configurator\Traits\RouteTrait;

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

Route::get('/admin',[admincontroller::class,'index'])->name('adminHome');
Route::get('/products',[admincontroller::class,'viewproducts'])->name('viewproducts');
Route::get('/delete/{id}',[admincontroller::class,'deleteproduct'])->name('deleteproduct');
Route::get('/createproduct' ,[admincontroller::class,'create'])->name('createproduct');
Route::post('/storeproduct' ,[admincontroller::class,'storeproduct'])->name('storeproduct');
Route::get('/editproduct/{id}' ,[admincontroller::class,'edit'])->name('editproduct');
Route::put('/updateproduct' ,[admincontroller::class,'update'])->name('updateproduct');  





Route::resource('/category' ,CategoryController::class);
Route::get('/hicategory' , [CategoryController::class ,'hicategory'])->name('hicategory');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
