<?php

use App\Http\Controllers\HomeController;
use App\Models\Estudiante;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'getHome']);

Route::get('login', function() {
    return view('auth.login');
});

Route::get('logout', function() {
    return 'Logout usuario';
});

Route::get('perfil/{id?}', function($id = null) {
    return $id ? 'Visualizar el currículo de '. $id : 'Visualizar el currículo propio';
})->where('id', '[0-9]*');

Route::get('pruebaDB/{id?}', function ($votos = null) {
    $html = '';

    $count = Estudiante::where('votos', '>', $votos)->count();
    $max = Estudiante::max('votos');
    $min = Estudiante::min('votos');
    $media = Estudiante::avg('votos');
    $total = Estudiante::sum('votos');

    $html = '<ul>';
    $html .= '<li>Estuadiantes con más de 100 votos: ' .$count. '</li>';
    $html .= '<li>Máximo número de votos: ' .$max. '</li>';
    $html .= '<li>Mínimo número de votos: ' .$min. '</li>';
    $html .= '<li>Media de votos: ' .$media. '</li>';
    $html .= '<li>Total de votos: ' .$total. '</li>';



    $estudiantes = Estudiante::where('votos', '>', $votos)->take(5)->get();
    //echo $estudiante->nombre . ' - ' . $estudiante->ciclo . '<br />';
    foreach ($estudiantes as $item){
        $html .= '<li>' . $item->nombre . '</li>';
    }

    $count = Estudiante::where('votos', '>', 100)->count();

    $html .= '<ul>';
    $html .= '<li>Antes: ' . $count . '</li>';

    $estudiante = new Estudiante;
    $estudiante->nombre = 'Juan';
    $estudiante->apellidos = 'Martínez';
    $estudiante->direccion = 'Dirección de Juan';
    $estudiante->votos = 130;
    $estudiante->confirmado = true;
    $estudiante->ciclo = 'DAW';
    $estudiante->save();

    $count = Estudiante::where('votos', '>', 100)->count();
    $html .= '<li>Después: ' . $count . '</li>';
    $html .= '</ul>';

    return $html . "</ul>\n<ul>";

});



include __DIR__.'/actividades.php';
include __DIR__.'/curriculos.php';
include __DIR__.'/proyectos.php';
include __DIR__.'/reconocimientos.php';
include __DIR__.'/users.php';
