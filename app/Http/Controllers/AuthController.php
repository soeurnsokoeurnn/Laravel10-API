<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiLoginRequest;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use  Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    use ApiResponses;
    public function login(ApiLoginRequest $request): JsonResponse
    {
        return $this->responseSuccess($request->get('email'));
    }

    public function register(): JsonResponse
    {
        return $this->responseSuccess('register');
    }
}
