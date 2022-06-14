<?php

use App\Http\Controllers\FamilyController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\RouteCompiler;
use App\Http\Controllers\AnimalController;
use Illuminate\Support\Facades\DB;
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
Route::get('index',[AnimalController::class,'index'])->name('index');
Route::get('create',[AnimalController::class,'create'])->name('create');
Route::post('store',[AnimalController::class,'store'])->name('store');
Route::get('/animal/{id}',[AnimalController::class,'show'])->name('show');
Route::get('edit/{id}',[AnimalController::class,'edit'])->name('edit');
Route::put('update/{id}',[AnimalController::class,'update'])->name('update');
Route::delete('delete/{id}',[AnimalController::class,'destroy'])->name('delete');
Route::get('families',[FamilyController::class,'index'])->name('families');








