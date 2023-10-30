<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlerteController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FormuleController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ModePaiementController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/clients', [ClientController::class, 'index']);
Route::get('/reservations', [ReservationController::class, 'index']);
Route::get('/formules', [FormuleController::class, 'index']);
Route::get('/mode_paiements', [ModePaiementController::class, 'index']);
Route::get('/paiements', [PaiementController::class, 'index']);

//alertes
Route::get('/alertes', [AlerteController::class, 'index']);
Route::post('/alert', [AlerteController::class, 'store']);
Route::put('/alert/{alerte}', [AlerteController::class, 'update']);
Route::delete('/alert/{alerte}', [AlerteController::class, 'destroy']);

//sessions
Route::get('/sessions', [SessionController::class, 'index']);
Route::post('/session', [SessionController::class, 'store']);
Route::put('/session/{session}', [SessionController::class, 'update']);
Route::delete('/session/{session}', [SessionController::class, 'destroy']);
