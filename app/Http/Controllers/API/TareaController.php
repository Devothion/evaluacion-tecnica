<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\StoreTareaRequest;
use App\Http\Requests\API\UpdateTareaRequest;
use App\Models\Tarea;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tareas = Tarea::all();
        return response()->json([
            'message' => 'Tareas encontradas exitosamente',
            'data' => $tareas
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTareaRequest $request)
    {
        // Obtenemos el usuario autenticado a partir del token
        $user = auth()->user();

        // Si la validación pasa, creamos la tarea
        $tarea = Tarea::create(array_merge(
            $request->validated(),
            ['user_id' => $user->id],
            ['dni' => $user->dni],
            ['estado' => 'pendiente']
        ));

        // Devolver la respuesta en JSON
        return response()->json([
            'message' => 'Tarea creada exitosamente',
            'data' => $tarea
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarea $tarea)
    {
        $tarea = Tarea::find($tarea->id);
        return response()->json([
            'message' => 'Tarea encontrada exitosamente',
            'data' => $tarea
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTareaRequest $request, Tarea $tarea)
    {
        // Validar los datos y actualizar la tarea
        $tarea->update($request->validated());

        // Devolver la respuesta en JSON
        return response()->json([
            'message' => 'Tarea actualizada exitosamente',
            'data' => $tarea
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea)
    {
        // Verifica si la tarea existe
        if (!$tarea) {
            return response()->json([
                'message' => 'Tarea no encontrada',
            ], 404);
        }

        try {
            // Intenta eliminar la tarea
            $tarea->delete();

            // Responde con éxito si la eliminación es exitosa
            return response()->json([
                'message' => 'Tarea eliminada exitosamente',
            ], 200);
        } catch (\Exception $e) {
            // Si ocurre algún error durante la eliminación, devuelve un error 500
            return response()->json([
                'message' => 'Error al eliminar la tarea',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
