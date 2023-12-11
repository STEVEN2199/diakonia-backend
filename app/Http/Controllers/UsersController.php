<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //
    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        $user->update([
            "name" => $request->input(''),
            "apellido" => $request->input(''),
            "telefono" => $request->input(''),
            "cargo_institucional" => ucwords(strtolower($request->input(''))),
            "email" => $request->input('email'),
            'password' => Hash::make($request->input('password'))

        ]);
        $user->syncRoles($request->input("cargo_institucional"));
        return response()->json(["message" => "User Updated!"], 200);
    }

    public function destroy(User $user)
    {
        $user->removeRole($user->cargo_institucional);
        $user->delete();
        return response()->json(["message" => "User Eliminado"], 200);
    }
}
