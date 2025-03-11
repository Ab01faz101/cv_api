<?php

use App\Http\Controllers\Api\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/users' , [\App\Http\Controllers\UserController::class , "index"]);


Route::prefix('/services')->group(function (){
    Route::get('/', [ServiceController::class, 'index']);
    Route::get('/show/{service}', [ServiceController::class, 'show']);
    Route::post('/store', [ServiceController::class, 'store']);
    Route::put('/update/{service}', [ServiceController::class, 'update']);
    Route::delete('/destroy/{service}', [ServiceController::class, 'destroy']);
});
