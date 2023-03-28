<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Obtener todos los productos
        $productos=Producto::all();

        //Llamar a una vista que los renderice
        // En el array le pasamos los atributos que queremos que tenga esta lista
        // Lo primero es el nombre de la variable que crearé aquí mismo y lo segundo es el valor que le paso
        return view("productos.listado",["productos"=>$productos]);


//        echo "<h2>Estoy en index</h2>";
//        $productos = Producto::all();
//        dd($productos);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
//        echo "<h2>Estoy en create</h2>";
        return view("productos.formulario_productos");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductoRequest $request)
    {
        // Antes hacíamos así:
//        $valores_producto['name']=$_POST['name'];
//        $valores_producto['descripcion']=$_POST['descripcion'];
//        $producto=new Producto($valores_producto);

        // Ahora con laravel haremos así
        $producto=new Producto($request->input());
        $producto->saveOrFail();

        // Ahora puedo redirigir a la ruta index
        return redirect(route('products.index'));

        // O puedo hacer lo siguiente y devolver una vista
//        $productos=Producto::all();
//        return view("productos.listado",["productos"=>$productos]);

//        echo "<h2>Estoy en store</h2>";
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
        echo "<h2>Estoy en show del producto $producto</h2>";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $cod)
    {
        $producto  = Producto::find($cod);
        return view("productos.formulario_edit",['producto'=>$producto]);
        //
//        echo "<h2>Estoy en edit del producto $producto</h2>";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductoRequest $request, string $cod)
    {
        //
        $producto = Producto::find($cod);

        $datos=$request->input();
        $producto->update($datos);
        return redirect(route("products.index"));

//        echo "<h2>Estoy en update del producto $producto</h2>";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $cod)
    {
        //
        $producto = Producto::find($cod);
        $producto->delete();
        return redirect(route("products.index"));

//        echo "<h2>Estoy en borrando del producto $producto</h2>";
    }
}
