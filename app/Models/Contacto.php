<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;
    protected $table = 'contacto';
    protected $fillable = ['nombre', 'apellido', 'institucion_id'];
    protected $hidden = ['created_at', 'updated_at'];

    public function contacto_correo()
    {
        return $this->hasMany(Contacto_correo::class, "contacto_id", "id");
    }

    public function contacto_telefono()
    {
        return $this->hasMany(Contacto_telefono::class, "contacto_id", "id");
    }

    public function institucion()
    {
        return $this->belongsTo(Institucion::class, "id", "institucion_id");
    }
}
