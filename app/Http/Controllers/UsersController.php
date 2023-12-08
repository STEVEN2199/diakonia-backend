<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        return response()->json(["message" => "User Updated!"], 200);
    }

    public function destroy($id)
    {
        User::destroy($id);
        return response()->json(["message" => "User Destroy"], 202);
    }
}
