@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Modificar ciclo
         </div>
         <div class="card-body" style="padding:30px">

            <form action="{{ action([App\Http\Controllers\CicloController::class, 'getEdit'], ['id' => $ciclo->id]) }}" method="POST">

	            @csrf
                @method('PUT')

	            <div class="form-group">
                    <label for="codCiclo">Código Ciclo</label>
                    <input type="text" name="codCiclo" id="codCiclo" class="form-control" value="{{ $ciclo->codCiclo }}">
                 </div>

                 <div class="form-group">
                    <label for="codFamilia">Código Familia</label>
                    <input type="text" name="codFamilia" id="codFamilia" class="form-control" value="{{ $ciclo->codFamilia }}">
                 </div>

                 <div class="form-group">
                    <label for="grado">Grado</label>
                    <input type="text" name="grado" id="grado" class="form-control" value="{{ $ciclo->grado }}">
                 </div>

                 <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $ciclo->nombre }}">
                 </div>

	            <div class="form-group text-center">
	               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
	                   Modificar ciclo
	               </button>
	            </div>

            </form>

         </div>
      </div>
   </div>
</div>

@endsection
