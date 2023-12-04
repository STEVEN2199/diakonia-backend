<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReadDataController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

//Route::get('user',[AuthController::class, 'user']);
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [AuthController::class, 'user']);
    Route::post('logout', [AuthController::class, 'logout']);
});

Route::get('DataUsers', [AuthController::class, 'AllUsers']);

Route::post('readData', [ReadDataController::class, 'readData']);
Route::get('AllData', [ReadDataController::class, 'AllData']);
Route::get('AllInstituciones', [ReadDataController::class, 'AllInstituciones']);

Route::get('DataInstituciones',[ReadDataController::class, 'DataInstituciones']);
Route::get('DataInstitucionesId/{id}',[ReadDataController::class, 'DataInstitucionesId']);
Route::get('DataInstitucionesDirecciones',[ReadDataController::class, 'DataInstitucionesDirecciones']);

Route::get('caracterizacion', [ReadDataController::class, 'obtenerCaracterizaciones']);
Route::get('sectores', [ReadDataController::class, 'obtenerSectores']);
Route::get('actividades', [ReadDataController::class, 'obtenerActividades']);

Route::post('ingresarInstitucion', [ReadDataController::class, 'registrarInstitucion']);
