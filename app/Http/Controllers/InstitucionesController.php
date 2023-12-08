<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Estado;
use App\Models\Institucion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $user = Auth::user();
        $institucion = Institucion::find($id);
        if (!$institucion) {
            return response()->json(["message" => "No existe la institucion"], 404);
        }
        if (!strcmp($user->cargo_institucion, "Administrador")) {
            $institucion->update($request->all());
            return response()->json(["message" => "Informacion Actualizada"]);
        } else {
            $institucion->numero_beneficiarios = $request->input('numero_beneficiarios');
            $institucion->save();
        }
        $contacto = Contacto::find($institucion->id);
        $contacto->nombre = $request->input("nombre");
        $contacto->nombre = $request->input("apellido");
        $contacto->save();
        $contacto_correo = $contacto->contacto_correo();
        $contacto_correo->correo_contacto = $request->input("correo_contacto");
        $contacto_correo->save();
        $contacto_telefono = $contacto->contacto_telefono();
        $contacto_telefono->telefono_contacto = $request->input("telefono_contacto");
        $contacto_telefono->save();
    }

    public function filterInstitucion(Request $request)
    {
        $tipoPoblacion = $request->query('tipo_poblacion');
        $actividad = $request->query('actividad');
        if ($tipoPoblacion == null && $actividad == null) {
            return response('Bad Requests', 400);
        }

        if ($tipoPoblacion == null & $actividad) {
            $instituciones = Institucion::with('actividad')->where('actividad_id', "=", $actividad);
            return response()->json(["instituciones" => $instituciones], 200);
        }

        if ($actividad == null & $tipoPoblacion) {
            $instituciones = Institucion::with('tipo_poblacion')->where('tipo_poblacion', "=", $tipoPoblacion);
            return response()->json(["instituciones" => $instituciones], 200);
        }

        //Falta Hacer JOins
        $institucion = DB::table('institucion');

        return response('NOT_IMPLEMENTED', 200);
    }
}
