<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendErrorResponse($message, $code = 400) {
        $response['status'] = 'error';
        $data = [
            'message' => $message
        ];
        $response['data'] = $data;
        return response()->json($response, $code);
    }

    public function sendSuccessResponse($data, $code = 200) {
        $response['status'] = 'success';
        $response['data'] = $data;
        return response()->json($response, $code);
    }
}
