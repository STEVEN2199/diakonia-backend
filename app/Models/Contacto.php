<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;
    protected $table = 'contacto';
    protected $fillable = ['nombre', 'apellido', 'institucion_id'];

    public function contacto_correo()
    {
        return $this->hasMany(Contacto_correo::class);
    }

    public function contacto_telefono()
    {
        return $this->hasMany(Contacto_telefono::class);
    }

    public function institucion()
    {
        return $this->belongsTo(Institucion::class, "id", "institucion_id");
    }
}
