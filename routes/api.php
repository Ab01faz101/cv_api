<?php

use App\Http\Controllers\Api\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\SkillController;

Route::get('/users' , [\App\Http\Controllers\UserController::class , "index"]);


Route::prefix('/services')->group(function (){
    Route::get('/', [ServiceController::class, 'index']);
    Route::get('/show/{service}', [ServiceController::class, 'show']);
    Route::post('/store', [ServiceController::class, 'store']);
    Route::put('/update/{service}', [ServiceController::class, 'update']);
    Route::delete('/destroy/{service}', [ServiceController::class, 'destroy']);
});

Route::prefix('/skills')->group(function (){
    Route::get('/', [SkillController::class, 'index']);
    Route::get('/show/{skill}', [SkillController::class, 'show']);
    Route::post('/store', [SkillController::class, 'store']);
    Route::put('/update/{skill}', [SkillController::class, 'update']);
    Route::delete('/destroy/{skill}', [SkillController::class, 'destroy']);
});
