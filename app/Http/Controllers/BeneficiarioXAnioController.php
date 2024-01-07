<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeneficiarioXAnio;
use Illuminate\Support\Facades\DB;

class BeneficiarioXAnioController extends Controller
{
    //

    public function index()
    {
        // $beneficiarios = BeneficiarioXAnio::all();
        $beneficiarios = BeneficiarioXAnio::orderBy('anio', 'asc')->get();
        return response()->json($beneficiarios);
    }

    public function rangoAnio(Request $request){

        $beneficiarios = DB::table('beneficiarios_x_anio')
            ->whereBetween('anio', [$request->anioInicio, $request->anioFin])
            ->orderBy('anio', 'asc')
            ->get();

        return response()->json($beneficiarios);

    }

    public function store(Request $request)
    {
        $request->validate([
            'anio' => 'required',
            'numero_instituciones' => 'required',
            'numero_beneficiarios' => 'required',
        ]);

        $beneficiario = BeneficiarioXAnio::create($request->all());

        return response()->json($beneficiario, 201);
    }

    public function show(BeneficiarioXAnio $beneficiario)
    {
        return response()->json($beneficiario);
    }

    public function update(Request $request, BeneficiarioXAnio $beneficiario)
    {
        $request->validate([
            'anio' => 'required',
            'numero_instituciones' => 'required',
            'numero_beneficiarios' => 'required',
        ]);

        $beneficiario->update($request->all());

        return response()->json($beneficiario, 200);
    }

    public function destroy(BeneficiarioXAnio $beneficiario)
    {
        $beneficiario->delete();

        return response()->json(null, 204);
    }
}
