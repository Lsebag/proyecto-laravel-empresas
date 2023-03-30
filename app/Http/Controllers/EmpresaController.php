<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmpresaRequest;
use App\Http\Requests\UpdateEmpresaRequest;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $empresas=Empresa::ALL();
        $empresas=Empresa::paginate(10);
        return view("empresas.listado",['empresas'=>$empresas]);
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
        $todas_empresas = Empresa::all();
//        return view("empresas.listado",['empresas'=>$todas_empresas]);
        return redirect(route("empresas.index"));

        //
    }
}
