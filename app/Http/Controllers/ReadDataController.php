<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Agrega esta línea para importar la clase Auth
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response; // Agrega esta línea para importar la clase Response

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
}
