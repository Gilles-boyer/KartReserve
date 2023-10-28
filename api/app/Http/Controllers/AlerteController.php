<?php

namespace App\Http\Controllers;

use App\Http\Resources\AlerteResource;
use App\Models\Alerte;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Alerte $alerte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alerte $alerte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alerte $alerte)
    {
        //
    }
}
