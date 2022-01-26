<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ApiAnimalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/keep-alive',function(){
    return response()->json([
        'id'=>1,
        'data'=>now()
    ]);
});

Route::get('/help',function(){
    return view('families.show');
});


Route::middleware('auth:api')->get('/user',function(Request $request){
    return response()->json([
        'message' => 'User authenticated successfully', 
        'data' => $request->user(),
    ]);
});



Route::middleware('auth:api')->group(function(){   
    Route::prefix('users')->group(function(){
        Route::get('/all',[\App\Http\Controllers\ApiUserController::class,'index']);
        Route::get('/user/{id}',[\App\Http\Controllers\ApiUserController::class,'show']);

    });

    Route::prefix('animals')->group(function(){
        Route::get('/all',[\App\Http\Controllers\ApiAnimalController::class,'index']);
        Route::get('/animal/{id}',[\App\Http\Controllers\ApiContinentController::class,'show']);

    });

    Route::prefix('family')->group(function(){
        Route::get('/all',[\App\Http\Controllers\ApiFamilyController::class,'index']);
        Route::get('/family/{id}',[\App\Http\Controllers\ApiFamilyController::class,'show']);

    });

    Route::prefix('continent')->group(function(){
        Route::get('/all',[\App\Http\Controllers\ApiContinentController::class,'index']);
        Route::get('/continent/{id}',[\App\Http\Controllers\ApiFamilyController::class,'show']);

    });
});