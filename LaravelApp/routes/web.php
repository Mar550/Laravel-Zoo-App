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

Route::prefix('dashboard')->group(function(){
    Route::get('index',[AnimalController::class, 'index'])->name('dashboard.index');
    Route::get('indextest',[AnimalController::class, 'index'])->name('dashboard.indextest');
    Route::get('create',[AnimalController::class, 'create'])->name('dashboard.create');
    Route::post('store',[AnimalController::class, 'store'])->name('dashboard.store');
    Route::get('/animal/{id}',[AnimalController::class,'show'])->name('dashboard.show');
    Route::put('edit',[AnimalController::class,'edit'])->name('dashboard.edit');
    Route::delete('delete/{id}',[AnimalController::class,'destroy'])->name('dashboard.delete');
    Route::get('fetchData', [AnimalController::class,"fetchData"])->name('animal.indextest');
});







