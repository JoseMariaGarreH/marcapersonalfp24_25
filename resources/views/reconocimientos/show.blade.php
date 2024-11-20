@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-6">
        <a href="#" class="image featured" title="Sakatsp, CC BY-SA 4.0 &lt;https://creativecommons.org/licenses/by-sa/4.0&gt;, via Wikimedia Commons"><img width="256" alt="Award icon" src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Award_icon.png"></a>
    </div>
    <div class="col-md-6">
        <ul>
            <li>Estudiante ID: {{ $reconocimiento['estudiante_id'] }}</li>
            <li>Actividad ID: {{ $reconocimiento['actividad_id'] }}</li>
            <li>Documento: {{ $reconocimiento['documento'] }}</li>
            <li>Fecha: {{ $reconocimiento['fecha'] }}</li>
            <li>Docente Validador: {{ $reconocimiento['docente_validador'] }}</li>
        </ul>
        <a href="{{ action([App\Http\Controllers\ReconocimientoController::class, 'getEdit'], ['id' => $id])  }}" class="btn btn-primary">Editar</a>
        <a href="{{ action([App\Http\Controllers\ReconocimientoController::class, 'getIndex']) }}" class="btn btn-secondary">Regresar</a>
    </div>
</div>
@endsection
