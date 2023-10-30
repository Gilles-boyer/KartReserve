<?php

namespace App\Http\Controllers;

use App\Models\Alerte;
use Illuminate\Http\Request;
use App\Http\Requests\AlerteRequest;
use App\Http\Resources\AlerteResource;

class AlerteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return AlerteResource::collection(Alerte::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AlerteRequest $request)
    {
        $alerte = Alerte::create($request->validated());

        return response()->json(new AlerteResource($alerte), 201);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(AlerteRequest $request, Alerte $alerte)
    {
        $alerte->update($request->validated());

        return response()->json(new AlerteResource($alerte), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alerte $alerte)
    {
        $alerte->delete();

        return response()->json(null, 204);
    }
}
