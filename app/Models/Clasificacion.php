<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clasificacion extends Model
{
    use HasFactory;
    protected $table = 'clasificacion';
    protected $fillable=['nombre_clasificacion','condicion','institucion_id'];

}
