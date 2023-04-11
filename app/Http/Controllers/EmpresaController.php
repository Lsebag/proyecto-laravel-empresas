<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmpresaRequest;
use App\Http\Requests\UpdateEmpresaRequest;
use App\Models\Alumno;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    public function get_paginate(){
        $empresas=Empresa::paginate(10);
        return response ($empresas);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $empresas=Empresa::all();
        $empresas=Empresa::paginate(10);

        // Aquí me devuelve un array con el nombre de los campos
        $campos=array_keys($empresas[0]->getAttributes());

        // Lo siguiente es para eliminar del array los campos llamados created_at y updated_at
        unset($campos[array_search('created_at',$campos)]);
        unset($campos[array_search('updated_at',$campos)]);

//        return view("empresas.listado",['empresas'=>$empresas]);


        return view("empresas.listado",['filas'=>$empresas,'campos'=>$campos,'tabla'=>'Empresas']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //TODO Crear la página html create.blade.php (vistas) un formulario para rellenar
    return view("empresas.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmpresaRequest $request)
    {
        //
        $valores = $request->input();
        $empresa = new Empresa($valores);
        $empresa->saveOrFail();

        $empresas=Empresa::all();
//        return view("empresas.listado",['empresas'=>$empresas]);
        return redirect(route("empresas.index"));

    }

    /**
     * Display the specified resource.
     */
    public function show(Empresa $empresa)
    {
        //
        return view("empresas.edit",['empresa'=>$empresa]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $empresa)
    {
        //TODO pendiente de hacer el html editar.blade.php para visualizar en un formulario los datos de esta empresa
        $empresa = Empresa::find($empresa);
        return view("empresas.edit",['empresa'=>$empresa]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmpresaRequest $request, int $empresa)
    {
        //
        $empresa=Empresa::find($empresa);
        $valores = $request->input();
        $empresa->update($valores);

//        $todas_empresas = Empresa::all();
//        return view("empresas.listado",['empresas'=>$todas_empresas]);
        return redirect(route("empresas.index"));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $empresa)
    {
        $empresa = Empresa::find($empresa);
        $empresa->deleteOrFail();

        // $todas_empresas = Empresa::all();
        $todas_empresas=Empresa::paginate(10);

        
//        return view("empresas.listado",['empresas'=>$todas_empresas]);


        // return redirect(route("empresas.index"));
        return response($todas_empresas);


    }
}
