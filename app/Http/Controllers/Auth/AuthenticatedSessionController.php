<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $user = Auth::user();

            $token = $request->user()->createToken($user->email . '_Token')->plainTextToken;



            return response()->json([
                'token' => $token,
                'user' => $user

            ]);
        }

        return response()->json(['error' => 'Não autorizado'], 401);
    }
    public function destroy(Request $request)
    {
        $user = $request->user();


        $token = $request->user()->currentAccessToken();

        if ($token && method_exists($token, 'delete')) {
            $token->delete();
        } else {

            $user->tokens()->delete();
        }

        return response()->json(['message' => 'Deslogado com sucesso']);
    }
}
