<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function json(string $message, array $data=[], int $statusCode=200) {
        return response()->json([
            "message" => $message,
            "data" => $data,
        ], $statusCode);
    }
}
