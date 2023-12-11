<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Red_bda extends Model
{
    use HasFactory;
    protected $table = "red_bda";
    protected $fillable = ['mes_ingreso', 'anio_ingreso', 'institucion_id'];
    protected $hidden = ['institucion_id', 'created_at', 'updated_at'];
}
