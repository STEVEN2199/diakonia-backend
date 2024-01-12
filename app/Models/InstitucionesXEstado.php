<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitucionesXEstado extends Model
{
    use HasFactory;

    protected $table = 'instituciones_x_estado';

    protected $fillable = [
        'anio',
        'numero_instituciones',
        'numero_instituciones_activas',
        'numero_instituciones_pasivas'
    ];
}
