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

## Instalaremos Vue
-  Instalar Vue
```bash
 npm install vue@next --save-dev
```

-  Instalamos el plugin de vue para vite
```bash
  npm install @vitejs/plugin-vue
```

- Vamos a resources->js->[app.js](./resources/js/app.js)
- y debemos importar Vue, escribimos en el fichero lo siguiente:

```bash
    import {createApp} from "vue/dist/vue.esm-bundler";
```

- Especificamos en qué sección del HTML va a estar disponible y se monta especificando el id.
```bash
  .mount("#app");
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

- En [vite.config.js](vite.config.js) importamos vue
```bash
  import vue from '@vitejs/plugin-vue';
  ```

- Y luego establecemos en vite.config.js que utilizaremos vue
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

- En mi componente vue pongo lo siguiente:
```bash
    <template>
    <h1>Hola desde un componente vue</h1>
        Valor recibido {{nombre}}<hr>
        Valor generado {{valor1}}<hr>
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
    name: "saludo",
    props:['nombre'],
    data(){
        return{
            valor1: 'Hola desde vue'
        }
    },
    methods:{
        dime_algo:function (){
            return alert("Valor de valor es "+this.valor1);
            }
    }
}
```


