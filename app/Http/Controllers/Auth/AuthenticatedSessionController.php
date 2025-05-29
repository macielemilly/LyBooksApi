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
                'token' => $token
            ]);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
   public function destroy(Request $request)
{
    $user = $request->user();

    // Apaga todos os tokens do usuário - logout de todas as sessões
    // $user->tokens()->delete();

    // Ou apaga somente o token atual, mas antes valida se existe e se não é transitório
    $token = $request->user()->currentAccessToken();

    if ($token && method_exists($token, 'delete')) {
        $token->delete();
    } else {
        // Apaga todos tokens se o token atual não pode ser deletado (fallback)
        $user->tokens()->delete();
    }

    return response()->json(['message' => 'Logged out successfully']);
}

}



