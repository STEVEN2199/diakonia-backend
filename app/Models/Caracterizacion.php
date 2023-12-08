<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caracterizacion extends Model
{
    use HasFactory;
    protected $table = 'caracterizacion';
    protected $fillable = ['nombre_caracterizacion'];

    public function instituciones()
    {
        return $this->belongsToMany(Institucion::class, 'caracterizacion_institucion', 'caracterizacion_id', 'institucion_id');
    }
}
