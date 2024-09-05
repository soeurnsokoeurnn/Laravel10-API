<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
trait ApiResponses
{
    protected function responseSuccess($message, $data=[]): JsonResponse
    {
        return $this->successResponse($message, $data, 200);
    }
    protected function successResponse($message, $data=[], $statusCode = 200): JsonResponse
    {
        return response()->json([
            'data' => $data,
            'message' => $message,
            'statusCode' => $statusCode,
        ], $statusCode);
    }
    protected function errorsResponse($message, $statusCode): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'statusCode' => $statusCode,
        ], $statusCode);
    }
}
