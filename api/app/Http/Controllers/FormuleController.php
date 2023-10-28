<?php

namespace App\Http\Controllers;

use App\Http\Resources\FormuleResource;
use App\Models\Formule;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Formule $formule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Formule $formule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formule $formule)
    {
        //
    }
}
