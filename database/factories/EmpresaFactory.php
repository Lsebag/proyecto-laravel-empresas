<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empresa>
 */
class EmpresaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dni=fake()->randomNumber(8);
        $letra=chr(($dni % 27)+ord('A'));
        $dni="$dni-$letra";
        return [
            'nombre'=>fake()->company(),
            'direccion'=>fake()->address(),
            'DNI'=>$dni
            //
        ];
    }
}
