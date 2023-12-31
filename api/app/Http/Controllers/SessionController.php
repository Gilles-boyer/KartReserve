<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Http\Requests\SessionRequest;
use App\Http\Resources\SessionResource;
use App\Http\Resources\ReservationSessionResource;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SessionResource::collection(Session::all());
    }

    /**
     * Display a listing of session by date.
     */
    public function getReservationBySession($date)
    {
        $sessions = Session::all()->map(function ($session) use ($date) {
            $session['date'] = $date;
            return $session;
        });

        return ReservationSessionResource::collection($sessions);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(SessionRequest $request)
    {
        $session = Session::create($request->validated());

        return response()->json(new SessionResource($session), 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SessionRequest $request, Session $session)
    {
        $session->update($request->validated());

        return response()->json(new SessionResource($session), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Session $session)
    {
        $session->delete();

        return response()->json(null, 204);
    }
}
