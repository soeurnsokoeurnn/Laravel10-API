<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
trait ApiResponses
{
    protected function responseSuccess($message): JsonResponse
    {
        return $this->successResponse($message, 200);
    }
    protected function successResponse($data, $statusCode = 200): JsonResponse
    {
        return response()->json([
            'message' => $data,
            'statusCode' => $statusCode,
        ], $statusCode);
    }
}
