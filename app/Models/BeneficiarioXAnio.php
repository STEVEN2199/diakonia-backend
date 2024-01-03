<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeneficiarioXAnio extends Model
{
    use HasFactory;

    protected $table = 'beneficiarios_x_anio';

    protected $fillable = [
        'anio',
        'numero_instituciones',
        'numero_beneficiarios',
    ];
}
