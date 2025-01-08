@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Modificar familia profesional
         </div>
         <div class="card-body" style="padding:30px">

            <form action="{{ action([\App\Http\Controllers\FamiliaProfesionalController::class, 'putEdit'], ['id' => $familiaProfesional->id]) }}" method="POST" enctype="multipart/form-data">

	            @csrf
                @method('PUT')

	            <div class="form-group">
                    <label for="codigo">Código</label>
                    <input type="text" name="codigo" id="codigo" class="form-control" value="{{ $familiaProfesional->codigo }}">
                 </div>

                 <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $familiaProfesional->nombre }}">
                 </div>

                 <div class="form-group">
                    <label for="imagen">imagen</label>
                    <input type="file" class="form-control" id="imagen" name="imagen" placeholder="imagen">
                </div>

	            <div class="form-group text-center">
	               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
	                   Modificar familia profesional
	               </button>
	            </div>

            </form>

         </div>
      </div>
   </div>
</div>

@endsection
