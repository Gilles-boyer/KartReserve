<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReservationFormule;
use App\Http\Requests\ReservationFormulePayedRequest;
use App\Http\Requests\ReservationFormuleTypePersonRequest;

class ReservationFormuleController extends Controller
{
    public function changePaiementStatut(
        ReservationFormule $reservationFormule,
        ReservationFormulePayedRequest $request
    ) {
        $reservationFormule->payed = $request->payed;
        $reservationFormule->save();

        return response()->json("modifié", 200);
    }

    public function changePersonType(
        ReservationFormule $reservationFormule,
        ReservationFormuleTypePersonRequest $request
    ) {
        $reservationFormule->Type_de_session = $request->Type_de_session;
        $reservationFormule->save();

        return response()->json("modifié", 200);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ReservationFormule $reservationFormule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReservationFormule $reservationFormule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReservationFormule $reservationFormule)
    {
        //
    }
}
