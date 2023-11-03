<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Agrega esta línea para importar la clase Auth
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response; // Agrega esta línea para importar la clase Response
use App\Models\Institucion;
use App\Models\Contacto;

class ReadDataController extends Controller
{
    public function storeData(Request $request)
    {
        $data = $request->input('data');

        dd($data);
        /*
        foreach ($data as $row) {
            // Aquí puedes guardar cada fila en la base de datos
            DB::table('tu_tabla')->insert((array) $row);
        }
        return response()->json(['message' => 'Datos guardados exitosamente']);*/
    }

    public function AllData()
    {
        return Institucion::all();

    }

    public function AllInstituciones(Request $request) {
        $query = DB::table('institucion')
            ->join('estado', 'institucion.id', '=', 'estado.institucion_id')
            ->get();

        return $query->toArray();
    }

    public function DataInstituciones(Request $request) {
        $instituciones = DB::table('institucion')->get();

        foreach ($instituciones as $institucion) {
            $actividades = DB::table('actividad')
                ->join('actividad_institucion', 'actividad.id', '=', 'actividad_institucion.actividad_id')
                ->where('actividad_institucion.institucion_id', $institucion->id)
                ->select('actividad.*')
                ->get();

            $institucion->actividades = $actividades;
        }

        foreach ($instituciones as $institucion) {
            $caracterizacion = DB::table('caracterizacion')
                ->join('caracterizacion_institucion', 'caracterizacion.id', '=', 'caracterizacion_institucion.caracterizacion_id')
                ->where('caracterizacion_institucion.institucion_id', $institucion->id)
                ->select('caracterizacion.*')
                ->get();

            $institucion->caracterizacion = $caracterizacion;
        }

        foreach ($instituciones as $institucion) {
            $sectorizacion = DB::table('sectorizacion')
                ->join('sectorizacion_institucion', 'sectorizacion.id', '=', 'sectorizacion_institucion.sector_id')
                ->where('sectorizacion_institucion.institucion_id', $institucion->id)
                ->select('sectorizacion.*')
                ->get();

            $institucion->sectorizacion = $sectorizacion;
        }

        /*
        foreach ($instituciones as $institucion) {
            $clasificacion = DB::table('clasificacion')
                ->join('clasificacion_institucion', 'clasificacion.id', '=', 'clasificacion_institucion.clasificacion_id')
                ->where('clasificacion_institucion.institucion_id', $institucion->id)
                ->select('clasificacion.*')
                ->get();

            $institucion->clasificacion = $clasificacion;
        }
        */

        foreach ($instituciones as $institucion) {
            $tipos_poblacion = DB::table('tipo_poblacion')
                ->where('tipo_poblacion.institucion_id', $institucion->id)
                ->select('tipo_poblacion.*')
                ->get();

            $institucion->tipos_poblacion = $tipos_poblacion;
        }

        foreach ($instituciones as $institucion) {
            $estado = DB::table('estado')
                ->where('estado.institucion_id', $institucion->id)
                ->select('estado.*')
                ->get();

            $institucion->estado = $estado;
        }

        foreach ($instituciones as $institucion) {
            $direccion = DB::table('direccion')
                ->where('direccion.institucion_id', $institucion->id)
                ->select('direccion.*')
                ->get();

            $institucion->direccion = $direccion;
        }

        foreach ($instituciones as $institucion) {
            $red_bda = DB::table('red_bda')
                ->where('red_bda.institucion_id', $institucion->id)
                ->select('red_bda.*')
                ->get();

            $institucion->red_bda = $red_bda;
        }

        foreach ($instituciones as $institucion) {
            $contactos = DB::table('contacto')
                ->where('contacto.institucion_id', $institucion->id)
                ->select('contacto.*')
                ->get();

            foreach ($contactos as $contacto) {
                $correos = DB::table('contacto_correo')
                    ->where('contacto_correo.contacto_id', $contacto->id)
                    ->select('contacto_correo.correo_contacto')
                    ->get();

                $telefonos = DB::table('contacto_telefono')
                    ->where('contacto_telefono.contacto_id', $contacto->id)
                    ->select('contacto_telefono.telefono_contacto')
                    ->get();

                $contacto->correos = $correos;
                $contacto->telefonos = $telefonos;
            }

            $institucion->contactos = $contactos;
        }

        return $instituciones->toArray();
    }


    public function DataInstitucionesId(Request $request, string $id) {
        $instituciones = DB::table('institucion')
        ->where('institucion.id', $id)
        ->get();

        foreach ($instituciones as $institucion) {
            $actividades = DB::table('actividad')
                ->join('actividad_institucion', 'actividad.id', '=', 'actividad_institucion.actividad_id')
                ->where('actividad_institucion.institucion_id', $institucion->id)
                ->select('actividad.*')
                ->get();

            $institucion->actividades = $actividades;
        }

        foreach ($instituciones as $institucion) {
            $caracterizacion = DB::table('caracterizacion')
                ->join('caracterizacion_institucion', 'caracterizacion.id', '=', 'caracterizacion_institucion.caracterizacion_id')
                ->where('caracterizacion_institucion.institucion_id', $institucion->id)
                ->select('caracterizacion.*')
                ->get();

            $institucion->caracterizacion = $caracterizacion;
        }

        foreach ($instituciones as $institucion) {
            $sectorizacion = DB::table('sectorizacion')
                ->join('sectorizacion_institucion', 'sectorizacion.id', '=', 'sectorizacion_institucion.sector_id')
                ->where('sectorizacion_institucion.institucion_id', $institucion->id)
                ->select('sectorizacion.*')
                ->get();

            $institucion->sectorizacion = $sectorizacion;
        }

        /*
        foreach ($instituciones as $institucion) {
            $clasificacion = DB::table('clasificacion')
                ->join('clasificacion_institucion', 'clasificacion.id', '=', 'clasificacion_institucion.clasificacion_id')
                ->where('clasificacion_institucion.institucion_id', $institucion->id)
                ->select('clasificacion.*')
                ->get();

            $institucion->clasificacion = $clasificacion;
        }
        */

        foreach ($instituciones as $institucion) {
            $tipos_poblacion = DB::table('tipo_poblacion')
                ->where('tipo_poblacion.institucion_id', $institucion->id)
                ->select('tipo_poblacion.*')
                ->get();

            $institucion->tipos_poblacion = $tipos_poblacion;
        }

        foreach ($instituciones as $institucion) {
            $estado = DB::table('estado')
                ->where('estado.institucion_id', $institucion->id)
                ->select('estado.*')
                ->get();

            $institucion->estado = $estado;
        }

        foreach ($instituciones as $institucion) {
            $direccion = DB::table('direccion')
                ->where('direccion.institucion_id', $institucion->id)
                ->select('direccion.*')
                ->get();

            $institucion->direccion = $direccion;
        }

        foreach ($instituciones as $institucion) {
            $red_bda = DB::table('red_bda')
                ->where('red_bda.institucion_id', $institucion->id)
                ->select('red_bda.*')
                ->get();

            $institucion->red_bda = $red_bda;
        }

        foreach ($instituciones as $institucion) {
            $contactos = DB::table('contacto')
                ->where('contacto.institucion_id', $institucion->id)
                ->select('contacto.*')
                ->get();

            foreach ($contactos as $contacto) {
                $correos = DB::table('contacto_correo')
                    ->where('contacto_correo.contacto_id', $contacto->id)
                    ->select('contacto_correo.correo_contacto')
                    ->get();

                $telefonos = DB::table('contacto_telefono')
                    ->where('contacto_telefono.contacto_id', $contacto->id)
                    ->select('contacto_telefono.telefono_contacto')
                    ->get();

                $contacto->correos = $correos;
                $contacto->telefonos = $telefonos;
            }

            $institucion->contactos = $contactos;
        }

        return $instituciones->toArray();
    }
}
