<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Estado;
use App\Models\Institucion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstitucionesController extends Controller
{
    public function disableInstitucion(Institucion $institucion)
    {
        $institucion->estado()->update(["nombre_estado" => "PASIVA"]);
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
            $institucion->update(["numero_beneficiarios" => $request->input('numero_beneficiarios')]);
        }
        $institucion->contacto()->update(["nombre" => $request->input("nombre"), "apellido" => $request->input("apellido")]);
        $contacto = Contacto::find($institucion->id);
        $contacto->contacto_correo()->update(["correo_contacto" => $request->input("correo_contacto")]);
        $contacto->contacto_telefono()->update(["contacto_telefono" => $request->input("contacto_telefono")]);
        return response()->json(["message" => "Informacion Institucion Actualizada"]);
    }

    public function filterInstitucion(Request $request)
    {
        $tipoPoblacion = $request->query('tipo_poblacion');
        $actividad = $request->query('nombre_actividad');
        if (is_null($tipoPoblacion) && is_null($actividad)) {
            return response('Bad Request', 400);
        }

        if (is_null($tipoPoblacion) && $actividad) {
            $instituciones = Institucion::with(['actividades', 'tipo_poblacion', 'red_bda', "clasificacion", "sectorizaciones", "contacto", "direccion", "estado", "caracterizaciones", "contacto.contacto_correo", "contacto.contacto_telefono"])->whereHas('actividades', function ($q) use ($actividad) {
                $q->where("actividad.nombre_actividad", "=", $actividad);
            })->get();
            return response()->json(["instituciones" => $instituciones, "total" => count($instituciones)], 200);
        }

        if (is_null($actividad) && $tipoPoblacion) {
            $instituciones = Institucion::with(['actividades', 'tipo_poblacion', 'red_bda', "clasificacion", "sectorizaciones", "contacto", "direccion", "estado", "caracterizaciones", "contacto.contacto_correo", "contacto.contacto_telefono"])->whereHas('tipo_poblacion', function ($q) use ($tipoPoblacion) {
                $q->where("tipo_poblacion.tipo_poblacion", "=", $tipoPoblacion);
            })->get();
            return response()->json(["instituciones" => $instituciones, "total" => count($instituciones)], 200);
        }

        $instituciones = Institucion::with(['actividades', 'tipo_poblacion', 'red_bda', "clasificacion", "sectorizaciones", "contacto", "direccion", "estado", "caracterizaciones", "contacto.contacto_correo", "contacto.contacto_telefono"])
            ->whereHas('actividades', function ($q) use ($actividad) {
                $q->where("actividad.nombre_actividad", "=", $actividad);
            })->whereHas('tipo_poblacion', function ($q) use ($tipoPoblacion) {
                $q->where("tipo_poblacion.tipo_poblacion", "=", $tipoPoblacion);
            })->get();

        return response()->json(["instituciones" => $instituciones, "total" => count($instituciones)]);
    }
}
