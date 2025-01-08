@extends('layouts.master')

@section('content')


    <div class="row m-4">

        <div class="col-sm-4">

            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Curriculum-vitae-warning-icon.svg/256px-Curriculum-vitae-warning-icon.svg.png" style="height:200px"/>

        </div>
        <div class="col-sm-8">

            <h3><strong>Nombre</strong> {{ $ciclo->nombre }}</h3>
            <h4>
                <ul>
                    <li><strong>Grado:</strong> {{ $ciclo->grado }}</li>
                    <li><strong>Código Ciclo:</strong> {{ $ciclo->codCiclo }}</li>
                    <li><strong>Código Familia:</strong> {{ $ciclo->codFamilia }}</li>
                </ul>
            </h4>
            <a class="btn btn-warning" href="{{ action([App\Http\Controllers\CicloController::class, 'getEdit'], ['id' => $ciclo->id]) }}">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                Editar ciclo
            </a>
            <a class="btn btn-outline-info" href="{{ action([App\Http\Controllers\CicloController::class, 'getIndex']) }}">
                Volver al listado
            </a>

        </div>
    </div>

@endsection
