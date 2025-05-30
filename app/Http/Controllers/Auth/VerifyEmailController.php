<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\JsonResponse;

class VerifyEmailController
{
    /**
     * Marca o email do usuário como verificado.
     */
    public function __invoke(EmailVerificationRequest $request): JsonResponse
    {
        // Marca o email como verificado
        $request->fulfill();

        return response()->json([
            'message' => 'Email verificado com sucesso.'
        ], 200);
    }
}
