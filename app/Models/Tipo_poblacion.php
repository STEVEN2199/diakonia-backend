<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_poblacion extends Model
{
    use HasFactory;
    protected $fillable=['tipo_poblacion','institucion_id'];

}
