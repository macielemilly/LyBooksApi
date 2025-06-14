<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification (API version).
     */
    public function store(Request $request): JsonResponse
    {
        $user = $request->user();

        if ($user->hasVerifiedEmail()) {
            return response()->json([
                'message' => 'Email já verificado.'
            ], 400); 
        }

        $user->sendEmailVerificationNotification();

        return response()->json([
            'message' => 'Link de verificação enviado com sucesso.'
        ], 202); 
    }
}


