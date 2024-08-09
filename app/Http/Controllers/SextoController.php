<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSextoRequest;
use App\Http\Requests\UpdateSextoRequest;
use App\Models\Sexto;

class SextoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('sexto');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSextoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Sexto $sexto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sexto $sexto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSextoRequest $request, Sexto $sexto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sexto $sexto)
    {
        //
    }
}
