<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function respondWithToken($token)
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => null
        ], 200);
    }

    public function responseWithData($data = [])
    {
        return response()->json([
            'data' => $data,
            'success' => 1,
            'message' => 'Your action has been completed successfully.'
        ], 200);
    }

    public function responseWithPagination($data)
    {
        $response = [
            'pagination' => [
                'total' => $data->total(),
                'per_page' => (int)$data->perPage(),
                'current_page' => $data->currentPage(),
                'last_page' => $data->lastPage(),
                'from' => $data->firstItem(),
                'to' => $data->lastItem()
            ],

            'data' => $data->items()
        ];
        return $this->responseWithData($response);
    }

    public function responseValidation($errors)
    {
        return response()->json($errors, 422);
    }
    public function responseUnauthorized()
    {
        return response()->json(['message' => 'Unauthorized'], 401);
    }
}
