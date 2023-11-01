<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    use HasFactory;
    protected $table = 'institucion';
    protected $fillable=['nombre','representante_legal','ruc','numero_beneficiarios'];

    public function caracterizaciones()
    {
        return $this->belongsToMany(Caracterizacion::class, 'caracterizacion__institucion', 'institucion_id', 'caracterizacion_id');
    }

    public function actividades()
    {
        return $this->belongsToMany(Actividad::class, 'actividad__institucion', 'institucion_id', 'actividad_id');
    }

    public function sectorizaciones()
    {
        return $this->belongsToMany(Sectorizacion::class, 'sectorizacion__institucion', 'institucion_id', 'sector_id');
    }
}
