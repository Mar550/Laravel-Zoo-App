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
return view('layout');
});

Route::get('/card', function () {
return view('animal2.card');
});

Route::get('/families', function () {
    return view('families');
    });

Route::get('/continents', function () {
    return view('continents');
    });


    Route::get('index',[AnimalController::class,'index'])->name('index');
    Route::get('create',[AnimalController::class,'create'])->name('create');
    Route::post('store',[AnimalController::class,'store'])->name('dashboard.store');
    Route::get('/animal/{id}',[AnimalController::class,'show'])->name('dashboard.show');
    Route::get('edit/{id}',[AnimalController::class,'showData'])->name('dashboard.edit');
    Route::put('update/{id}',[AnimalController::class,'updateData'])->name('dashboard.update');
    Route::delete('delete/{id}',[AnimalController::class,'destroy'])->name('dashboard.delete');



Route::prefix('dashboard')->group(function(){
    Route::get('index',[AnimalController::class, 'index'])->name('dashboard.index');
    Route::get('indextest',[AnimalController::class, 'index'])->name('dashboard.indextest');
 /** Route::get('create',[AnimalController::class, 'create'])->name('dashboard.create'); */
    Route::post('store',[AnimalController::class, 'store'])->name('dashboard.store');
    Route::get('/animal/{id}',[AnimalController::class,'show'])->name('dashboard.show');
    Route::get('edit/{id}',[AnimalController::class,'showData'])->name('dashboard.edit');
    Route::put('update/{id}',[AnimalController::class,'updateData'])->name('dashboard.update');
    Route::delete('delete/{id}',[AnimalController::class,'destroy'])->name('dashboard.delete');
    Route::get('fetchData', [AnimalController::class,"fetchData"])->name('animal.indextest');
});






