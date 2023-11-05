<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaludoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/ 

Route::get('/', function () {
    return view('welcome');
});


//Ruta para el nombre
Route::get('/saludo/{nombre}/{apellido?}', function ($nombre, $apellido = null) {   
    if ($apellido) {
        $mensaje = "Hola $nombre $apellido";
    } else {
        $mensaje = "Hola $nombre";
    }

    return $mensaje;
});

//Rutas para las operaciones
Route::get('suma/{num1}/{num2}', function ($num1, $num2) {
    $resultado = $num1 + $num2;
    return "La suma es de: $resultado";
});

Route::get('resta/{num1}/{num2}', function ($num1, $num2) {
    $resultado = $num1 - $num2;
    return "La resta es de: $resultado";
});

Route::get('multiplicacion/{num1}/{num2}', function ($num1, $num2) {
    $resultado = $num1 * $num2;
    return "La multiplicación es de: $resultado";
});

Route::get('division/{num1}/{num2}', function ($num1, $num2) {
    if ($num2 == 0) {
        return "No se puede dividir";
    }

    $resultado = $num1 / $num2;
    return "La división es de: $resultado";
});

//Ruta para el saludo mediante la vista
Route::get('/saludovista', function () {
    return view('ejemplo');
});

//Ruta que manda a un controlador con el nombre del visitante y salude desde la vista 
Route::get('/saludo/{nombre}', [SaludoController::class, 'saludar']);

