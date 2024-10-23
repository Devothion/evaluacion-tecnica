<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cambio extends Model
{
    protected $fillable = [
        'tarea_id',
        'modelo',
        'user_id',
    ];

    public function tarea()
    {
        return $this->belongsTo(Tarea::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
