<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
//    protected $fillable=['nombre','direccion','DNI'];

    // Lo siguiente es para que no me muestre el created_at y updated_at
    protected $hidden=['created_at','updated_at'];
    use HasFactory;
}
