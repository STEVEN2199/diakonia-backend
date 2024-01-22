<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InstitucionesController;
use App\Http\Controllers\ReadDataController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Models\Institucion;
use App\Http\Controllers\BeneficiarioXAnioController;
use App\Http\Controllers\InstitucionesXCategoriaController;
use App\Http\Controllers\InstitucionesXEstadoController;
use App\Models\InstitucionesXEstado;

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
Route::post('logout', [AuthController::class, 'logout']);
Route::get('auditoria', [ReadDataController::class, 'readInstitucionesAuditoriaCategoria']);
Route::get('auditoria1', [ReadDataController::class, 'readInstitucionesAuditoriaCategoriaMax']);
// Route::get('instituciones-categoria', [InstitucionesXCategoriaController::class, 'obtenerInstitucionesXCategoria']);
// Route::apiResource('beneficiarios', BeneficiarioXAnioController::class);

Route::middleware(["auth:sanctum", 'role:Administrador'])->group(function () {
    Route::get('caracterizacion', [ReadDataController::class, 'obtenerCaracterizaciones']);
    Route::get('sectores', [ReadDataController::class, 'obtenerSectores']);
    Route::get('DataUsers', [AuthController::class, 'AllUsers']);
    Route::put("/users/{id}", [UsersController::class, 'edit']);
    Route::delete("/users/{id}", [UsersController::class, 'destroy']);
    Route::delete("/users/{id}", [UsersController::class, 'destroy']);
    Route::get('userProfile', [UsersController::class, 'userProfile']);
    Route::apiResource('beneficiarios', BeneficiarioXAnioController::class);
    Route::get('/beneficiarios-anio', [BeneficiarioXAnioController::class, 'rangoAnio']);
    Route::get('instituciones-estado', [InstitucionesXEstadoController::class, 'obtenerInstitucionesXEstado']);
    Route::get('instituciones-categoria', [InstitucionesXCategoriaController::class, 'obtenerInstitucionesXCategoria']);
    Route::get('instituciones_auditoria', [ReadDataController::class, 'readInstitucionesAuditoria']);
    Route::get('instituciones-categoria-bronce-plata', [ReadDataController::class, 'readInstitucionesAuditoriaCategoria']);
    Route::get('instituciones-categoria-oro', [ReadDataController::class, 'readInstitucionesAuditoriaCategoriaMax']);

});

Route::get("roles", [RolesController::class, 'index']);

Route::group(["middleware" => ["auth:sanctum", "role:Administrador|Usuario General"]], function () {
    Route::post('ingresarInstitucion', [ReadDataController::class, 'registrarInstitucion']);
    Route::get("disableInstitucion/{id}", [InstitucionesController::class, 'disableInstitucion']);
    Route::put("editInstitucion/{id}", [InstitucionesController::class, 'editInstitucion']);
    Route::get("filter", [InstitucionesController::class, 'filterInstitucion']);
    Route::get('actividades', [ReadDataController::class, 'obtenerActividades']);
    Route::get('tiposPoblacion', [ReadDataController::class, 'obtenerTiposPoblacion']);
    Route::post('agregarInstitucion', [InstitucionesController::class, 'store']);
});

// Route::group(["middleware" => ["auth:sanctum", "role:Administrador|Usuario Invitado"]], function () {
// });

Route::group(["middleware" => ["auth:sanctum", "role:Administrador|Usuario General|Usuario Invitado"]], function () {
    Route::get('user', [AuthController::class, 'user']);
    Route::post('readData', [ReadDataController::class, 'readData']);
    Route::get('AllData', [ReadDataController::class, 'AllData']);
    Route::get('AllInstituciones', [ReadDataController::class, 'AllInstituciones']);
    Route::get('DataInstituciones', [ReadDataController::class, 'DataInstituciones']);
    Route::get('DataInstitucionesId/{id}', [ReadDataController::class, 'DataInstitucionesId']);
    Route::get('DataInstitucionesDirecciones', [ReadDataController::class, 'DataInstitucionesDirecciones']);
    Route::get('getAllInformation', [ReadDataController::class, 'getAllInformation']);
});
