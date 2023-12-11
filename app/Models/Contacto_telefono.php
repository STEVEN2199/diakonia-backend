<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto_telefono extends Model
{
    use HasFactory;
    protected $table = 'contacto_telefono';
    protected $fillable = ['telefono_contacto', 'contacto_id'];

    public function contacto()
    {
        return $this->belongsTo(Contacto::class);
    }
}
