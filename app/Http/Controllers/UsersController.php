<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Throwable;

class UsersController extends Controller
{
    //
    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        $user->update([
            "name" => $request->input('name'),
            "apellido" => $request->input('apellido'),
            "telefono" => $request->input('telefono'),
            "cargo_institucional" => ucwords(strtolower($request->input('cargo_institucional'))),
            "email" => $request->input('email'),
            'password' => Hash::make($request->input('password'))

        ]);
        $user->syncRoles($request->input("cargo_institucional"));
        return response()->json(["message" => "User Updated!"], 200);
    }

    public function destroy(int $id)
    {
        try {
            DB::beginTransaction();
            $user = User::find($id);
            $user->removeRole($user->cargo_institucional);
            $user->delete();
            DB::commit();
            return response()->json(["message" => "User Eliminado"], 200);
        } catch (Throwable $ex) {
            DB::rollBack();
            return response()->json(["message" => $ex->getMessage()], 400);
        }
    }

    public function userProfile(Request $request)
    {
        $user = auth()->user();
        return response()->json([
            "user" => $user->id,
            "rol" => $user->cargo_institucional
        ], 200);
    }
}
