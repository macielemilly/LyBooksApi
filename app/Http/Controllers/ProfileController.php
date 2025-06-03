<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse; {
    /**
     * Mostrar dados do perfil do usuário.
     */

    class ProfileController extends Controller
    {
        public function edit(Request $request): JsonResponse
        {
            return response()->json($request->user());
        }

        public function update(ProfileUpdateRequest $request): JsonResponse
        {
            $user = $request->user();

            $user->fill($request->validated());

            if ($user->isDirty('email')) {
                $user->email_verified_at = null;
            }

            $user->save();

            return response()->json([
                'message' => 'Perfil atualizado com sucesso.',
                'user' => $user,
            ]);
        }

        public function destroy(Request $request): JsonResponse
        {
            $request->validate([
                'password' => ['required', 'current_password'],
            ]);

            $user = $request->user();


            $user->tokens()->delete();
            $user->delete();

           

            return response()->json([
                'message' => 'Conta deletada com sucesso.',
            ]);
        }
    }
}
