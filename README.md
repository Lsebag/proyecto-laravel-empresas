<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Proyecto empresas
Creo el proyecto nuevo
```shell
    laravel new empresas
```

### Requisitos
## R1 Instalar autentificación
Me ubico en el directorio del proyecto y ejecuto las siguientes instrucciones
1. Instalo breeze, me creará una carpeta en ***vendor/laravel/breeze***
```shell
    composer require laravel/breeze
```

2. Publico las vistas, controladores y rutas en mi proyecto
```shell
  php artisan breeze:install
```
Al usar este comando seleccionamos la opción "Blade"

3. Instalo las herramientas de front (tailwind)
```shell
  npm install
```

4. Pongo en funcionamiento el servidor de base de datos
- Cargo el fichero docker-compose.yaml en el directorio del proyecto
    [Fichero ***docker-compose.yaml***](./docker-compose.yaml)
```yaml
    docker compose up -d
```

- Pongo disponible el servidor de base de datos

5. Edito el fichero ***.env*** para configurar la base de datos
```shell
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=23307
    DB_DATABASE=empresas
    DB_USERNAME=sebas
    DB_PASSWORD=sebas
```

6. Ejecuto las migraciones
```shell
  php artisan migrate
```

7. Arranco las herramientas de cliente
```shell
    npm run dev
```

8. Puedo probar que está todo bien instalado, pruebo a hacer el login
Abro el servidor

```shell
    php artisan serve &
```

# Clonar el proyecto y levantarlo
Clono el proyecto
```shell
    git clone https://...
    cd laravel_empresas
    composer update
    npm install
```

* Verifico que tenga el fichero .env, si no lo consigo y genero la clave
```shell
    php artisan key:gen
```

* Cargo las bases de datos
```shell
#Al estar funcionando con docker, lo levanto. El fichero se aporta con el proyecto
    docker compose up -d
    php artisan migrate
```
* Levanto el proyecto y verifico su funcionamiento (el & es para no perder el terminal y ejecutar el proceso en background)
```shell
    php artisan serve &
    npm run dev
```

## [Diseño_de pantallas](./documentacion/diseño_layout.md)


## Modelo alumnos
- Ahora creamos el modelo alumnos, el cual tendrá nombre, teléfono, email, un atributo multivaluado de idiomas y una clave foránea de empresas.

```bash
    php artisan make:model Alumno --all
```

- También creamos el modelo Idioma porque al ser un atributo multivaluado necesitamos una nueva tabla
```bash
    php artisan make:model Idioma --all
```

- En el archivo [create_alumnos_table.php](./database/migrations/2023_04_04_065957_create_alumnos_table.php) escribo lo siguiente para crear la tabla:

```bash
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre');
            $table->string('telefono');
            $table->string('email');
            $table->foreignId('empresa_id')->constrained();
            
        });
    }
```

- En el archivo [create_idiomas_table.php](./database/migrations/2023_04_04_071709_create_idiomas_table.php) escribo lo siguiente:

```bash
    public function up(): void
    {
        Schema::create('idiomas', function (Blueprint $table) {
            $table->id();
            $table->foreignId("alumno_id")->constrained();
            $table->string('idioma');
            $table->timestamps();

        });
    }
```

- En [AlumnoFactory.php](./database/factories/AlumnoFactory.php) pongo lo siguiente para poblar la tabla

```bash
    use App\Models\Empresa;
    use Illuminate\Support\Arr;
    
    public function definition(): array
    {
        // Con el siguiente código recibo un id de una empresa aleatoria
        $empresas=Empresa::all('id');

        //Convierto la colección a un array
        $empresas=$empresas->toArray();
        $empresa_id=Arr::random($empresas)['id'];

        return [
            'nombre'=>fake()->name(),
            'telefono'=>fake()->phoneNumber(),
            'email'=>fake()->email(),
            'empresa_id'=>$empresa_id
            //
        ];
    }
}
```

- En [AlumnoSeeder.php](./database/seeders/AlumnoSeeder.php) lo siguiente:

```bash
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
                   $alumno->idioma=$idioma_tupla;
                   $idioma->save();
               }
               }
            });

    }
```

- En el [AlumnoController.php](./app/Http/Controllers/AlumnoController.php) ponemos:

```bash
    public function index()
    {
        //
//        $alumnos=Alumno::all();
        $alumnos=Alumno::paginate(15);
        return view("alumnos.listado_alumnos",['alumnos'=>$alumnos]);
    }
```

- Establecemos la ruta en [web.php](routes/web.php)
```bash
use \App\Http\Controllers\AlumnoController;

Route::resource("alumnos",AlumnoController::class);
```

- Creo el fichero "listado_alumnos.blade.php" dentro de la carpeta alumnos dentro de la carpeta views [listado_alumnos.blade.php](./resources/views/alumnos)
```bash
@extends('layout')
@section('main')
    <table>
        <caption>Listado de alumnos</caption>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Telefono</th>

        </tr>
        @foreach($alumnos as $alumno)
            <tr>
                @csrf

                {{--                <td>{{$empresa->id}}</td>--}}
                <td>{{$alumno->id}}</td>
                <td>{{$alumno->nombre}}</td>
                <td>{{$alumno->email}}</td>
                <td>{{$alumno->telefono}}</td>

            </tr>
        @endforeach

    </table>
{{$alumnos->links()}}
@endsection
```

- Realizo las migraciones y pueblo las tablas:
```bash
php artisan migrante --seed
```

- En [StoreAlumnoRequest.php](./app/Http/Requests/StoreAlumnoRequest.php) y en [UpdateAlumnoRequest.php](./app/Http/Requests/UpdateAlumnoRequest.php) ponemos los valores a true
```bash
    public function authorize(): bool
    {
        return true;
    }
```

- En [DatabaseSeeder](./database/seeders/DatabaseSeeder.php) ponemos:
```bash
        $this->call([
            EmpresaSeeder::class,
            AlumnoSeeder::class
        ]);
```

- Luego hacemos
```bash
php artisan migrate:fresh --seed
```


## Instalaremos Vue
El link del profesor a esto es: https://es.wikieducator.org/Usuario:ManuelRomero/Vue

-  Instalar Vue
```bash
 npm install vue@next --save-dev
```

-  Instalamos el plugin de vue para vite
```bash
  npm install @vitejs/plugin-vue
```

- Vamos a [vite.config.js](vite.config.js), importamos vue

```bash
import vue from '@vitejs/plugin-vue';
```

- Y luego establecemos en vite.config.js que utilizaremos el plugin "vue"

```bash
export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
```

- Vamos a [app.js](./resources/js/app.js) y debemos importar Vue, escribimos en el fichero lo siguiente:

```bash
    import {createApp} from "vue/dist/vue.esm-bundler";
```

- Especificamos en qué sección del HTML va a estar disponible y se monta especificando el id: '.mount("#app")'
```bash
createApp({
    components:{
        saludo,
        cronometro
        }
    }

).mount("#app");
 ```

- Agrego en mi vista lo siguiente:
```html
    <head>
        @vite(["resources/js/app.js","resources/css/app.css"])
    </head>
    <body>
        <div id="app">
            <saludo nombre="Pedro"></saludo>
        </div>
    <body>
```

- Creamos el fichero saludo.vue dentro de resources->js->componentes

- En app.js importamos el componente saludo.
```bash
  import saludo from "./componentes/saludo.vue";
  
  createApp({
    components:{
        saludo
        }
    }

).mount("#app");
 ```



- En mi componente vue pongo lo siguiente:
```html
<template>
<h1>Hola desde un componente vue</h1>
    Valor recibido desde fuera: {{nombre}}<hr>
    Valor generado dentro del componente: {{nombre_interno}}<hr>
    <button @click="dime_algo">Click me</button>
</template>
```

-Puedo retornar valores
```bash
    data(){
        return{
            valor1: 'Hola desde vue'
        }
    },
```

- En mi componente vue puedo definir métodos
```bash
    methods:{
        dime_algo:function (){
            return alert("Valor de valor es "+this.valor1);
            }
    }
```

- Al final mi componente queda así:
```bash
export default {
    name: "saludo", // Nombre del componente
    props:['nombre'], // En props pongo los atributos que voy a recibir de afuera
    data(){ // Esta función va a devolver las variables del componente
        return{
            nombre_interno: 'Hola desde vue'
        }
    },
    methods:{
        dime_algo:function (){
            return alert("Valor de valor es "+this.valor1);
            }
    }
}
```


