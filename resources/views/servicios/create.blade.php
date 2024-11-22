@extends('layout.app')

@section('title', 'Agregar Servicio')

@section('content')
<h1>Agregar Servicio</h1>
<form action="{{ url('/servicios') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Nombre:</label>
    <input type="text" name="nombre" required><br>

    <label>Descripción:</label>
    <textarea name="descripcion" required></textarea><br>

    <label>Precio:</label>
    <input type="number" name="precio" step="0.01" required><br>

    <label>Imagen:</label>
    <input type="file" name="imagen"><br>

    <button type="submit">Guardar Servicio</button>
</form>
@endsection
