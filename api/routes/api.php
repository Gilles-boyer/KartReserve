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
use App\Http\Controllers\ReservationFormuleController;
use App\Http\Controllers\SessionsReservationController;

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

Route::get('/reservations', [ReservationController::class, 'index']);
Route::get('/paiements', [PaiementController::class, 'index']);

//ReservationFormule
Route::put('/reservation-formule-paiement/{reservationFormule}', [ReservationFormuleController::class, 'changePaiementStatut']);
Route::put('/reservation-formule-type-person/{reservationFormule}', [ReservationFormuleController::class, 'changePersonType']);

//SessionsReservationFormule
route::put('/session-reservation-formule/{sessionsReservation}', [SessionsReservationController::class, 'changeStatutSession']);

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
Route::get('/reservation-sessions/{date}', [SessionController::class, 'getReservationBySession']);

//clients
Route::get('/clients', [ClientController::class, 'index']);
Route::post('/client', [ClientController::class, 'store']);
Route::put('/client/{client}', [ClientController::class, 'update']);
Route::delete('/client/{client}', [ClientController::class, 'destroy']);


//mode-paiements
Route::get('/mode-paiements', [ModePaiementController::class, 'index']);
Route::post('/mode-paiement', [ModePaiementController::class, 'store']);
Route::put('/mode-paiement/{modePaiement}', [ModePaiementController::class, 'update']);
Route::delete('/mode-paiement/{modePaiement}', [ModePaiementController::class, 'destroy']);

//formules
Route::get('/formules', [FormuleController::class, 'index']);
Route::post('/formule', [FormuleController::class, 'store']);
Route::put('/formule/{formule}', [FormuleController::class, 'update']);
Route::delete('/formule/{formule}', [FormuleController::class, 'destroy']);
