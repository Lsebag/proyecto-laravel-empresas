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
    DB_DATABASE=empresa
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
