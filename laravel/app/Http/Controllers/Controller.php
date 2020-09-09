<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function dataResponse($data)
    {
        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }

    public function successResponse($message)
    {
        return response()->json([
            'success' => true,
            'message' => $message
        ], 200);
    }

    public function errorResponse($error, $code = 404)
    {
        return response()->json([
            'success' => false,
            'message' => $error
        ], $code);
    }
}
