<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;

class TareaController extends Controller
{
    /* Mostrar todas las tareas */
    public function index(Request $request)
    {
        $tareas = Tarea::all();

        if ($request->expectsJson()) {
            return response()->json($tareas);
        }

        return view('tareas.index', compact('tareas'));
    }

    /* Obtener una tarea */
    public function show(Request $request, $id)
    {
        $tarea = Tarea::findOrFail($id);

        if ($request->expectsJson()) {
            return response()->json($tarea);
        }

        return view('tareas.show', compact('tarea'));
    }

    /* Guardar nueva tarea */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'prioridad' => 'nullable',
        ]);

        $tarea = Tarea::create($validated);

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Tarea creada correctamente',
                'data' => $tarea
            ], 201);
        }

        return redirect()->to('/tareas')->with('success', 'Tarea creada!');
    }

    /* Actualizar tarea */
    public function update(Request $request, $id)
    {
        $tarea = Tarea::findOrFail($id);

        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'prioridad' => 'nullable|string',
            'duracion_dias' => 'nullable',
            'completada' => 'boolean'
        ]);

        $tarea->update($validated);

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Tarea actualizada correctamente',
                'data' => $tarea
            ]);
        }

        return redirect()->to('/tareas')->with('success', 'Tarea actualizada!');
    }

    /* Eliminar tarea */
    public function destroy(Request $request, $id)
    {
        $tarea = Tarea::findOrFail($id);
        $tarea->delete();

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Tarea eliminada correctamente'
            ]);
        }

        return redirect()->to('/tareas')->with('success', 'Tarea eliminada correctamente');
    }
}
