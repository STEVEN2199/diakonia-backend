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
        return response()->json(["message" => "User Updated!"], 200);
    }

    public function destroy($id)
    {
        User::destroy($id);
        return response()->json(["message" => "User Destroy"], 200);
    }
}
