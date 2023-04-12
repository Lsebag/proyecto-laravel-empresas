<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIdiomaRequest;
use App\Http\Requests\UpdateIdiomaRequest;
use App\Models\Idioma;

class IdiomaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function get_paginate(){
        $idiomas=Idioma::paginate(10);
        return response ($idiomas);
    }

    public function index()
    {
        //
        // $idiomas=Idioma::all();
        $idiomas=Idioma::paginate(10);

        $campos=array_keys($idiomas[0]->getAttributes());

        unset($campos[array_search('created_at',$campos)]);
        unset($campos[array_search('updated_at',$campos)]);
        // unset($campos[array_search('alumno_id',$campos)]);


        return view("idiomas.listado_idiomas",['filas'=>$idiomas,'campos'=>$campos,'tabla'=>'Idiomas']);

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
    public function store(StoreIdiomaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Idioma $idioma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idioma $idioma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIdiomaRequest $request, Idioma $idioma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idioma $idioma)
    {
        //
    }
}
