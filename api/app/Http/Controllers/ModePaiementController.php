<?php

namespace App\Http\Controllers;

use App\Models\ModePaiement;
use Illuminate\Http\Request;
use App\Http\Requests\ModePaiementRequest;
use App\Http\Resources\ModePaiementResource;

class ModePaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ModePaiementResource::collection(ModePaiement::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ModePaiementRequest $request)
    {
        $modePaiement = ModePaiement::create($request->validated());

        return response()->json(new ModePaiementResource($modePaiement), 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ModePaiementRequest $request, ModePaiement $modePaiement)
    {
        $modePaiement->update($request->validated());

        return response()->json(new ModePaiementResource($modePaiement), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModePaiement $modePaiement)
    {
        $modePaiement->delete();

        return response()->json(null, 204);
    }
}

