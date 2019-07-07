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
        $data = [
            'status' => 'error',
            'message' => $message
        ];
        return response()->json($data, $code);
    }

    public function sendSuccessResponse($data, $code = 200) {
        $data['status'] = 'success';
        return response()->json($data, $code);
    }
}
