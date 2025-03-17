<?php

use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\EductionController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\UserJobController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\SkillController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/users' , [\App\Http\Controllers\UserController::class , "index"]);

Route::prefix('/auth')->group(function (){
    Route::post('login' , [LoginController::class , 'loginStore']);
});

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


Route::prefix('/eduction')->group(function (){
    Route::get('/', [EductionController::class, 'index']);
    Route::get('/show/{eduction}', [EductionController::class, 'show']);
    Route::post('/store', [EductionController::class, 'store']);
    Route::put('/update/{eduction}', [EductionController::class, 'update']);
    Route::delete('/destroy/{eduction}', [EductionController::class, 'destroy']);
});



Route::prefix('/user-job')->group(function (){
    Route::get('/', [UserJobController::class, 'index']);
    Route::get('/show/{userJob}', [UserJobController::class, 'show']);
    Route::post('/store', [UserJobController::class, 'store']);
    Route::put('/update/{userJob}', [UserJobController::class, 'update']);
    Route::delete('/destroy/{userJob}', [UserJobController::class, 'destroy']);
});

Route::prefix('/portfolio')->group(function (){
    Route::get('/', [PortfolioController::class, 'index']);
    Route::get('/show/{portfolio}', [PortfolioController::class, 'show']);
    Route::post('/store', [PortfolioController::class, 'store']);
    Route::put('/update/{portfolio}', [PortfolioController::class, 'update']);
    Route::delete('/destroy/{portfolio}', [PortfolioController::class, 'destroy']);
});

Route::prefix('/contacts')->group(function (){
    Route::get('/', [ContactController::class, 'index']);
    Route::get('/show/{contact}', [ContactController::class, 'show']);
    Route::post('/store', [ContactController::class, 'store']);
    Route::put('/update/{contact}', [ContactController::class, 'update']);
    Route::delete('/destroy/{contact}', [ContactController::class, 'destroy']);
});
