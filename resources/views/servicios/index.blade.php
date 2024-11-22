@extends('layout.app')

@section('title', 'Servicios')

@section('content')
<h1>Servicios</h1>
<a href="{{ url('/servicios/create') }}">Agregar Servicio</a>
<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Imagen</th>
        </tr>
    </thead>
    <tbody>
        
    </tbody>
</table>
@endsection
