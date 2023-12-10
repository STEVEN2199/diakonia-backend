<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    use HasFactory;
    protected $table = 'institucion';
    protected $fillable = ['nombre', 'representante_legal', 'ruc', 'numero_beneficiarios'];

    public function caracterizaciones()
    {
        return $this->belongsToMany(Caracterizacion::class, 'caracterizacion_institucion', 'institucion_id', 'caracterizacion_id');
    }

    public function actividades()
    {
        return $this->belongsToMany(Actividad::class, 'actividad_institucion', 'institucion_id', 'actividad_id');
    }

    public function sectorizaciones()
    {
        return $this->belongsToMany(Sectorizacion::class, 'sectorizacion_institucion', 'institucion_id', 'sector_id');
    }

    public function tipo_poblacion()
    {
        return $this->hasMany(Tipo_poblacion::class);
    }

    public function estado()
    {
        return $this->hasMany(Estado::class);
    }

    public function contacto()
    {
        return $this->belongsTo(Contacto::class);
    }
}
