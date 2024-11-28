@extends('layouts.master')

@section('content')

<form action="formulario" method="post">
    @csrf
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}">
    <input type="submit" value="Enviar">
</form>

@endsection

