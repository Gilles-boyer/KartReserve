<?php

namespace App\Http\Controllers;

use App\Models\Formule;
use Illuminate\Http\Request;
use App\Http\Requests\FormuleRequest;
use App\Http\Resources\FormuleResource;

class FormuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return FormuleResource::collection(Formule::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormuleRequest $request)
    {
        $formule = Formule::create($request->validated());

        return response()->json(new FormuleResource($formule), 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormuleRequest $request, Formule $formule)
    {
        $formule->update($request->validated());

        return response()->json(new FormuleResource($formule), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formule $formule)
    {
        $formule->delete();

        return response()->json(null, 204);
    }
}

