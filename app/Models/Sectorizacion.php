<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sectorizacion extends Model
{
    use HasFactory;
    protected $fillable=['nombre_sectorizacion'];

    public function instituciones()
    {
        return $this->belongsToMany(Institucion::class, 'sectorizacion__institucion', 'sector_id', 'institucion_id');
    }

}
