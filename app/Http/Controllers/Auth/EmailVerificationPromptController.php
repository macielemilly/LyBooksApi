<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class EmailVerificationPromptController
{
    /**
     * Handle the incoming request.
     *
     * 
     */
    public function __invoke(Request $request): JsonResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return response()->json([
                'message' => 'Email já verificado.',
                'verified' => true,
            ], 200);
        }

        return response()->json([
            'message' => 'Verificação de email pendente.',
            'verified' => false,
        ], 200);
    }
}
