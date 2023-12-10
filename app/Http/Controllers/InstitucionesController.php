<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Estado;
use App\Models\Institucion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstitucionesController extends Controller
{
    public function disableInstitucion(Estado $institucionEstado)
    {
        $institucionEstado->nombre_estado = 'PASIVA';
        $institucionEstado->save();
        return response()->json(["message" => "Estado de la institucion actualizada"], 200);
    }

    public function editInstitucion(Request $request, $id)
    {
        $request->validate([
            ''
        ]);
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
        $actividad = $request->query('nombre_actividad');
        if (is_null($tipoPoblacion) && is_null($actividad)) {
            return response('Bad Request', 400);
        }

        if (is_null($tipoPoblacion) && $actividad) {
            $instituciones = Institucion::with('actividades')->where('actividad.nombre_actividad', "=", $actividad);
            return response()->json(["instituciones" => $instituciones], 200);
        }

        if (is_null($actividad) && $tipoPoblacion) {
            $instituciones = Institucion::with('tipo_poblacion')->where('tipo_poblacion.tipo_poblacion', "=", $tipoPoblacion);
            return response()->json(["instituciones" => $instituciones], 200);
        }

        $instituciones = Institucion::with(['actividad', 'tipo_poblacion'])->where([
            ['actividad.nombre_actividad', '=', $actividad],
            ['tipo_poblacion.tipo_poblacion', '=', $tipoPoblacion]
        ])->get();

        return response()->json(["instituciones" => $instituciones, "total" => count($instituciones)]);
    }
}
