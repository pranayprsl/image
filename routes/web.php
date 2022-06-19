<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/',[UserController::class,'index'])->name('index');

Route::get('/create',[UserController::class,'create'])->name('create');

Route::Post('/store',[UserController::class,'store'])->name('store');

Route::get('{user}/edit',[UserController::class,'edit'])->name('edit');

Route::patch('/update/{id}',[UserController::class,'update'])->name('update');

Route::get('{user}/show',[UserController::class,'show'])->name('show');

Route::get('/{user}/delete',[UserController::class,'destroy'])->name('destroy');