<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServiceController;
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



Route::get('/',[PagesController::class,'welcome']);

Route::get('login',[AdminController::class,'login']);


Route::post('admin-login',[AdminController::class,'authenticate']);

Route::get('/main',[MainController::class,'index']);
// dd('123');
Route::post('/mainup',[MainController::class,'create']);

Route::get('/service/create',[ServiceController::class,'create']);
Route::post('/service/create/store',[ServiceController::class,'store']);
Route::get('/service/list',[ServiceController::class,'list']);
Route::get('/service/edit{id}',[ServiceController::class,'edit']);
Route::post('/service/create/update{id}',[ServiceController::class,'update']);
Route::post('/service/create/destroy{id}',[ServiceController::class,'destroy']);

                                                                                                                                                                                                                                                                   
Route::get('/portfolio/create',[PortfolioController::class,'create']);
Route::post('/portfolio/create/store',[PortfolioController::class,'store']);
Route::get('/portfolio/list',[PortfolioController::class,'list']);
Route::get('/portfolio/edit{id}',[PortfolioController::class,'edit']);
Route::post('/portfolio/create/update{id}',[PortfolioController::class,'update']);
Route::post('/portfolio/create/destroy{id}',[PortfolioController::class,'destroy']);

Route::get('/about/create',[AboutController::class,'create']);
Route::post('/about/create/store',[AboutController::class,'store']);
Route::get('/about/list',[AboutController::class,'list']);
Route::get('/about/edit{id}',[AboutController::class,'edit']);
Route::post('/about/create/update{id}',[AboutController::class,'update']);
Route::post('/about/create/destroy{id}',[AboutController::class,'destroy']);

Route::post('contact',[ContactController::class,'store']);


Route::get('/dashboard',[DashboardController::class,'dashboard']);
Route::get('/logout',[AdminController::class,'logout']);

// Route::group(['middleware'=>'admin'],function(){
//     Route::get('/dashboard',[DashboardController::class,'dashboard']);
// });
