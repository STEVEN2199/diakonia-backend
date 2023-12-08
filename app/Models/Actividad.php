<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;
    protected $table = 'actividad';
    protected $fillable = ['nombre_actividad'];

    public function instituciones()
    {
        return $this->belongsToMany(Institucion::class, 'actividad_institucion', 'actividad_id', 'institucion_id');
    }
}
