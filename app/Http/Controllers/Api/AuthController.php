<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginUserRequest;
use App\Models\User;
use App\Traits\ApiResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponses;
    public function login(LoginUserRequest $request): JsonResponse
    {
        $request->validated($request->all());

        if (!Auth::attempt($request->only(['email', 'password']))) {
            return $this->errorsResponse('Invalid credentials', 401);
        }

        $user = User::where('email', $request->email)->first();

        // Generate and return the token
        return $this->successResponse(
            'Authenticated',
            [
                'token' => $user->createToken(
                    'API Token ' . $user->email, // Use $user->email for the token name
                    ['*'], // Permissions scope (default)
                    now()->addMonth() // Token expiration date
                )->plainTextToken
            ]
        );
    }

//    Revoking Auth Token
    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();
        return $this->successResponse('');
    }
}
