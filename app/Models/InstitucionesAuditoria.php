<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitucionesAuditoria extends Model
{
    use HasFactory;

    protected $table = 'institucion_auditoria';
    protected $fillable = ['nombre', 'representante_legal', 'ruc', 'numero_beneficiarios', 'anio'];
    protected $hidden = ['created_at', 'updated_at'];
}
