@extends('layout.app')

@section('title', 'Citas')

@section('content')
<h1>Citas</h1>
<a href="{{ url('/citas/create') }}">Agendar Cita</a>
<table>
    <thead>
        <tr>
            <th>Mascota</th>
            <th>Servicio</th>
            <th>Fecha y Hora</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
@endsection
