<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class InstitucionesXCategoriaController extends Controller
{
    //
    public function obtenerInstitucionesXCategoria(Request $request){
        $beneficiarios = DB::table('mejores_instituciones_x_categoria')
            ->where('anio', [ $request->anioFin])
            ->orderBy('categoria', 'asc')
            ->get();

        return response()->json($beneficiarios);
    }
}
