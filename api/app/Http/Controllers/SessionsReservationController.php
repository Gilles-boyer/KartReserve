<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SessionsReservation;
use App\Http\Requests\SessionReservationStatutRequest;

class SessionsReservationController extends Controller
{

    public function changeStatutSession(
        SessionReservationStatutRequest $request,
        SessionsReservation $sessionsReservation
    ) {
        $sessionsReservation->Statut = $request->Statut;
        $sessionsReservation->save();
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
    public function show(SessionsReservation $sessionsReservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SessionsReservation $sessionsReservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SessionsReservation $sessionsReservation)
    {
        //
    }
}
