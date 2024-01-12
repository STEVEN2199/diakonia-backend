<?php

namespace App\Http\Controllers;
use App\Models\InstitucionesXEstado;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class InstitucionesXEstadoController extends Controller
{
    //
    public function obtenerInstitucionesXEstado(Request $request){
        $beneficiarios = DB::table('instituciones_x_estado')
            ->where('anio', [ $request->anioFin])
            ->get();

        return response()->json($beneficiarios);
    }
}
