<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTareaRequest;
use App\Http\Requests\UpdateTareaRequest;
use App\Models\Tarea;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Paginación de 10 tareas por pagina
        $tareas = Tarea::paginate(3);
        return view('tareas.index', compact('tareas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tareas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTareaRequest $request)
    {
        //dd($request->all());
        // Crear la tarea en la base de datos
        Tarea::create($request->validated());

        // Redirigir al index con un mensaje de éxito
        return redirect()->route('tareas.index')->with('success', 'La tarea ha sido creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarea $tarea)
    {
        //Cargamos la relación 'user' y 'historial' del modelo Tarea
        $tarea->load('user', 'historial.user');

        // Añadir atributos de tiempo en formato humano a la tarea principal
        $tarea->created_at_human = $tarea->created_at->locale('es')->diffForHumans();
        $tarea->updated_at_human = $tarea->updated_at->locale('es')->diffForHumans();

        // Iterar sobre cada cambio en el historial y agregar el formato 'updated_at_human'
        $tarea->historial->each(function ($historial) {
            $historial->updated_at_human = $historial->created_at->locale('es')->diffForHumans();
        });

        //dd($tarea);
        return view('tareas.show', compact('tarea'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarea $tarea)
    {
        $user = auth()->user();
        return view('tareas.edit', compact('tarea', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTareaRequest $request, Tarea $tarea)
    {
        //dd($request->all());
        // Actualizar la tarea en la base de datos
        $tarea->update($request->validated());

        // Redirigir al index con un mensaje de actualización
        return redirect()->route('tareas.index')->with('success', 'La tarea ha sido actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea)
    {
        // Eliminar la tarea de la base de datos
        $tarea->delete();

        // Redirigir al index con un mensaje de eliminación
        return redirect()->route('tareas.index')->with('success', 'La tarea ha sido eliminada exitosamente.');
    }
}
