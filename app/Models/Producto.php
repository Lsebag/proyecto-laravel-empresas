<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //Aquí establezco qué atributos permito con carga masiva de un formulario
    protected $fillable=['cod','nombre','nombre_corto','descripcion','PVP','familia'];
    use HasFactory;
    // Aquí le digo a laravel que mi tabla se llama producto
    // En el caso de que el nombre de mi clase fuera Producto y el nombre de mi tabla fuera productos, es decir que
    // sea igual, pero en plural, laravel interpretaría esto y no sería necesario especificar nada.
    // Como ese no es el caso debo decirle cómo se llama la tabla
    protected $table="producto";

    // Laravel espera que la clave primaria sea numérica, autoincremental y se llame id, pero como este no es el
    //caso debemos especificarle cómo es la primary kay, le decimos que se llama cod y que es de tipo string
    protected $primaryKey="cod";
    protected $keyType="string";
    public $incrementing="false";

    // Esto es si no tengo los campos create_at y update_at
    public $timestamps=false;
}
