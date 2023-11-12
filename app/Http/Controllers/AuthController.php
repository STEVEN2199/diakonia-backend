<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Agrega esta línea para importar la clase Auth
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response; // Agrega esta línea para importar la clase Response

class AuthController extends Controller
{
    public function user()
    {
        return Auth::user();
    }

    public function register(Request $request)
    {
        return User::create([
            'name' => $request->input('name'),
            'apellido' => $request->input('apellido'),
            'email' => $request->input('email'),
            'telefono' => $request->input('telefono'),
            'cargo_institucional' => $request->input('cargo_institucional'),
            'password' => Hash::make($request->input('password'))
        ]);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response([
                'message' => 'Invalid credentials'
            ], Response::HTTP_UNAUTHORIZED);
        }
        $user = Auth::user();

        $token = $user->createToken('token')->plainTextToken;

        $cookie = cookie('jwt', $token, 60*24);

        return response([
            'message' =>'Success'
        ])->withCookie($cookie);
    }

    public function logout(){
        $cookie = Cookie::forget('jwt');

        return response([
            'message' =>'Success'
        ])->withCookie($cookie);
    }

    public function AllUsers()
    {
        return User::all();

    }


}
