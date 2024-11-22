@extends('layout.app')

@section('title', 'Agendar Cita')

@section('content')
<h1>Agendar Cita</h1>

<form action="{{ url('/citas') }}" method="POST">
    @csrf


    <label>Para registrar mascota seleccione:</label>
    <a href="{{ url('/mascotas') }}">Formulario</a><br>


    <label for="mascota_id">Si ya tienes una mascota registrada:</label>
    <select name="mascota_id" id="mascota_id" required>
        <option value="">Seleccione una mascota</option>

    </select><br>

    <label for="servicio_id">Seleccionar Servicio:</label>
    <select name="servicio_id" id="servicio_id" required>
        <option value="">Seleccione un servicio</option>
    </select><br>


    <label for="fecha_hora">Fecha y Hora:</label>
    <input type="datetime-local" name="fecha_hora" required><br>


    <label for="estado">Estado:</label>
    <select name="estado" id="estado" required>
        <option value="pendiente">Pendiente</option>
        <option value="confirmada">Confirmada</option>
    </select><br>

    <button type="submit">Guardar Cita</button>
</form>
@endsection
