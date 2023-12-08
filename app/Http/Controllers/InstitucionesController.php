<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Institucion;
use Illuminate\Http\Request;

class InstitucionesController extends Controller
{
    public function disableInstitucion($id)
    {
        $institucionEstado = Estado::where('nombre_estado', '=', $id);
        $institucionEstado->nombre_estado = 'PASIVA';
        $institucionEstado->save();
        return response()->json(["message" => "Estado de la institucion actualizada"], 200);
    }

    public function editInstitucion(Request $request, $id)
    {
        $institucion = Institucion::find($id);
        $institucion->update($request->all());

        return response()->json(["message" => "Informacion Actualizada"]);
    }

    public function filterInstitucion(Request $request)
    {
        
    }
}
