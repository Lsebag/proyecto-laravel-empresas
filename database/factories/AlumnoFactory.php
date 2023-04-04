<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Empresa;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Con el siguiente código recibo un id de una empresa aleatoria
        $empresas=Empresa::all('id');

        //Convierto la colección a un array
        $empresas=$empresas->toArray();
        $empresa_id=Arr::random($empresas)['id'];

        return [
            'nombre'=>fake()->name(),
            'email'=>fake()->email(),
            'telefono'=>fake()->phoneNumber(),
            'empresa_id'=>$empresa_id
            //
        ];
    }
}
