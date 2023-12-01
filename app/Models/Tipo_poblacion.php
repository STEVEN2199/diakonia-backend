<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_poblacion extends Model
{
    use HasFactory;
    protected $fillable = ['tipo_poblacion', 'institucion_id'];
    protected $table =  'tipo_poblacion';

    public function institucion()
    {
        return $this->belongsTo(Institucion::class, 'institucion_id', 'id');
    }
}
