<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //login
    public function login(Request $request)
    {
        $credentials = $request->all(['email', 'password']);
        $token = auth('api')->attempt($credentials);

        if($token ){
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['erro' => 'Usuário ou senha inválido'], 403);
        }

        return $this->respondWithToken(auth('api')->attempt($credentials));
    }

    //logout
    public function logout()
    {
        auth('api')->logout();

        return response()->json(['message' => 'Logout realizado com sucesso']);
    }

    //refresh
    public function refresh()
    {
        $token = auth('api')->refresh();

        return response()->json(['token' => $token], 200);
    }

    //me
    public function me()
    {
        return response()->json((auth()->user()));
    }
}
