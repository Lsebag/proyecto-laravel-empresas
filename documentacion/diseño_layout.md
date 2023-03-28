# Layout
* Creamos el layour siguiendo las especificaciones
* * Para ello añadimos las clases en [tailwind.config.js](../tailwind.config.js)
```bash
            height:{
                "10vh":"10vh",
                "15vh":"15vh",
                "65vh":"65vh",
            },
            colors:{
                "header": "#E6621F",
                "nav": "#EDEDEE",
                "main": "#FFFFFF",
                "footer": "#898989"
            },
```
* Establecemos el [layout.blade.php](../resources/views/layout.blade.php)
* Lo probamos
1. Creo una nueva ruta que retorne una página que extienda de layout
    - Creamos la ruta
```php
Route::view('main','main');
```

- Creo la página [main.blade.php](../resources/views/main.blade.php) que extienda de layout
2. Lo probamos http://localhost:8000/main

