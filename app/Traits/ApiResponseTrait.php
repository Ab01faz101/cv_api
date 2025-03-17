<?php

namespace App\Traits;

use PhpParser\Node\Expr\Array_;

trait ApiResponseTrait
{
    public function successMessage($data, $code, $message = null)
    {
        return response()->json([
            "status" => "success",
            "message" => $message,
            "data" => $data
        ], $code);
    }

    public function errorMessage($message = null, $code)
    {
        return response()->json([
            "status" => "error",
            "message" => $message,
        ], $code);
    }
}
