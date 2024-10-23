<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    /** @use HasFactory<\Database\Factories\TareaFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'dni',
        'titulo',
        'descripcion',
        'fecha_vencimiento',
        'estado',
    ];

    //Relación: Una tarea pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        // Registrar cambios cuando se actualiza una tarea
        static::updated(function ($tarea) {
            //dd($tarea->id);
            // Guardar en la tabla de cambios
            Cambio::create([
                'user_id' => auth()->id(),
                'modelo' => 'Tarea',
                'tarea_id' => $tarea->id,
            ]);
            
        });
    }

    public function historial()
    {
        return $this->hasMany(Cambio::class);
    }

    public function getFechaTransformadaAttribute()
    {
        return Carbon::parse($this->fecha_vencimiento)->format('d-m-Y');
    }

}
