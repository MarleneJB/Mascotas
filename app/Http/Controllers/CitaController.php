<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Mascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CitaController extends Controller
{
    public function index()
    {
        try {
            $citas = Cita::with('mascota')->get();
            return response()->json($citas, 200);
        } catch (\Exception $e) {
            Log::error("Error al obtener las citas: " . $e->getMessage());
            return response()->json(['error' => 'Ocurrió un error al obtener las citas'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'mascota_id' => 'required|exists:mascotas,id',
                'servicio' => 'required|string|max:255',
                'fecha_hora' => 'required|date_format:Y-m-d H:i:s|after:now',
                'estado' => 'nullable|string|in:pendiente,confirmada,completada,cancelada',
            ]);

            $cita = Cita::create($request->all());

            return response()->json($cita, 201);
        } catch (\Exception $e) {
            Log::error("Error al crear la cita: " . $e->getMessage());
            return response()->json(['error' => 'Ocurrió un error al crear la cita'], 500);
        }
    }

    public function show(string $id)
    {
        try {
            $cita = Cita::with('mascota')->findOrFail($id);
            return response()->json($cita, 200);
        } catch (\Exception $e) {
            Log::error("Error al mostrar la cita: " . $e->getMessage());
            return response()->json(['error' => 'Ocurrió un error al mostrar la cita'], 500);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $cita = Cita::findOrFail($id);

            $request->validate([
                'mascota_id' => 'sometimes|exists:mascotas,id',
                'servicio' => 'sometimes|string|max:255',
                'fecha_hora' => 'sometimes|date_format:Y-m-d H:i:s|after:now',
                'estado' => 'sometimes|string|in:pendiente,confirmada,completada,cancelada',
            ]);

            $cita->update($request->all());

            return response()->json($cita, 200);
        } catch (\Exception $e) {
            Log::error("Error al actualizar la cita: " . $e->getMessage());
            return response()->json(['error' => 'Ocurrió un error al actualizar la cita'], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $cita = Cita::findOrFail($id);
            $cita->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            Log::error("Error al eliminar la cita: " . $e->getMessage());
            return response()->json(['error' => 'Ocurrió un error al eliminar la cita'], 500);
        }
    }

    public function indexWithTrashed()
    {
        try {
            $citas = Cita::withTrashed()->get();
            return response()->json($citas, 200);
        } catch (\Exception $e) {
            Log::error("Error al obtener todas las citas, incluidos los eliminados: " . $e->getMessage());
            return response()->json(['error' => 'Ocurrió un error al obtener las citas'], 500);
        }
    }

    public function restore(string $id)
    {
        try {
            $cita = Cita::withTrashed()->findOrFail($id);
            $cita->restore();
            return response()->json($cita, 200);
        } catch (\Exception $e) {
            Log::error("Error al restaurar la cita: " . $e->getMessage());
            return response()->json(['error' => 'Ocurrió un error al restaurar la cita'], 500);
        }
    }
}
