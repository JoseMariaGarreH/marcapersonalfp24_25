@extends('layouts.master')

@section('content')

<div class="row">

    @foreach ($ciclos as $ciclo)

    <div class="col-4 col-6-medium col-12-small">
        <section class="box">
            <a href="#" class="image featured" title="SleaY, CC BY 4.0 &lt;https://creativecommons.org/licenses/by/4.0&gt;, via Wikimedia Commons"><img width="256" alt="Curriculum-vitae-warning-icon" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Curriculum-vitae-warning-icon.svg/256px-Curriculum-vitae-warning-icon.svg.png"></a>
            <header>
                <h3><strong>Nombre</strong> {{ $ciclo->nombre }}</h3>
            </header>
            <ul>
                <li>Grado: {{ $ciclo->grado }}</li>
                <li>Código Ciclo: {{ $ciclo->codCiclo }}</li>
                <li>Código Familia: {{ $ciclo->codFamilia }}</li>
            </ul>
            <footer>
                <ul class="actions">
                    <li><a href="{{ action([App\Http\Controllers\CicloController::class, 'getShow'], ['id' => $ciclo->id] ) }}" class="button alt">Más info</a></li>
                </ul>
            </footer>
        </section>
    </div>

    @endforeach

</div>
@endsection
