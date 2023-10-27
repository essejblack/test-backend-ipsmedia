<?php

namespace App\Traits;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

trait apiResponseTrait
{
    protected function response(
        JsonResource|string|ResourceCollection|Throwable|Exception|array $data = [],
        string|null                                                      $message = 'Success',
                                                                         $statusCode = Response::HTTP_OK,
    ): JsonResponse
    {

        if ($data instanceof Throwable) {
            return response()->json([
                'data' => [
                    'message' => $data->getMessage(),
                    'line' => $data->getLine(),
                    'file' => $data->getFile(),
                    'code' => $data->getCode(),
                ],
            ], ($statusCode != Response::HTTP_OK) ? $statusCode : Response::HTTP_EXPECTATION_FAILED);
        }

        if (is_array($data)) {
            return response()->json([
                'message' => $message,
                'data' => $data,
            ], $statusCode);
        }

        if (is_string($data)) {
            return response()->json(['message' => $data], $statusCode);
        }

        return $data->response()->setStatusCode($statusCode);
    }
}
