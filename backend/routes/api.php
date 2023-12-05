<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\EnlaceController;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/register', [AuthController::class, 'register']);


Route::group(['middleware' => 'auth:api'], function () {
    Route::post('auth/logout', [AuthController::class, 'logout']);
    Route::post('auth/refresh', [AuthController::class, 'refresh']);
    Route::post('auth/me', [AuthController::class, 'me']);

    Route::post('/rol',[RolController::class,'store']);
    Route::get('/rol',[RolController::class,'index']);
    Route::get('/rol/{id}',[RolController::class,'show']);
    Route::put('/rol/{id}',[RolController::class,'update']);
    Route::delete('/rol/{id}',[RolController::class,'delete']);
    
    Route::post('/personas',[PersonaController::class,'store']);
    Route::get('/personas',[PersonaController::class,'index']);
    Route::get('/personas/{id}',[PersonaController::class,'show']);
    Route::put('/personas/{id}',[PersonaController::class,'update']);
    Route::delete('/personas/{id}',[PersonaController::class,'delete']);
    
    Route::post('/usuarios',[UserController::class,'store']);
    Route::get('/usuarios',[UserController::class,'index']);
    Route::get('/usuarios/{id}',[UserController::class,'show']);
    Route::put('/usuarios/{id}',[UserController::class,'update']);
    Route::delete('/usuarios/{id}',[UserController::class,'delete']);
    
    
    Route::post('/paginas',[PaginaController::class,'store']);
    Route::get('/paginas',[PaginaController::class,'index']);
    Route::get('/paginas/{id}',[PaginaController::class,'show']);
    Route::put('/paginas/{id}',[PaginaController::class,'update']);
    Route::delete('/paginas/{id}',[PaginaController::class,'delete']);
    
    Route::post('/enlaces',[EnlaceController::class,'store']);
    Route::get('/enlaces',[EnlaceController::class,'index']);
    Route::get('/enlaces/{id}',[EnlaceController::class,'show']);
    Route::put('/enlaces/{id}',[EnlaceController::class,'update']);
    Route::delete('/enlaces/{id}',[EnlaceController::class,'delete']);
    
    Route::post('/bitacoras',[BitacoraController::class,'store']);
    Route::get('/bitacoras',[BitacoraController::class,'index']);
    Route::get('/bitacoras/{id}',[BitacoraController::class,'show']);
    Route::put('/bitacoras/{id}',[BitacoraController::class,'update']);
    Route::delete('/bitacoras/{id}',[BitacoraController::class,'delete']);
});