<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitucionesXCategoria extends Model
{
    use HasFactory;
    protected $table = 'mejores_instituciones_x_categoria';

    protected $fillable = [
        'anio',
        'id_institucion',
        'puesto',
        'categoria',
        
    ];
}
