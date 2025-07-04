<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\JsonResponse;

class VerifyEmailController
{
    
    public function __invoke(EmailVerificationRequest $request): JsonResponse
    {
        
        $request->fulfill();

        return response()->json([
            'message' => 'Email verificado com sucesso.'
        ], 200);
    }
}
