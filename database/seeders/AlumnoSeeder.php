<?php

namespace Database\Seeders;

use App\Models\Alumno;
use App\Models\Idioma;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Aquí recojo a cada alumno y determino qué se hará con él, en este caso queremos que se le asigne 1,2 o 3 idiomas para cada alumno
        Alumno::factory()->count(50)->create()
            ->each(function ($alumno){
               $idiomas=['Inglés','Francés','Alemán','Ruso','Italiano','Portugés'];
               $num_idiomas=rand(0,5);
               if ($num_idiomas!=0){
               $idiomas_hablados=Arr::random($idiomas,$num_idiomas);
               foreach ($idiomas_hablados as $idioma_tupla){
                   $idioma=new Idioma();
                   $idioma->alumno_id=$alumno->id;
                   $idioma->idioma=$idioma_tupla;
                   $idioma->save();
               }
               }
            });

    }
}
