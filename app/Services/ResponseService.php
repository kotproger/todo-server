<?php

namespace  App\Services;

class ResponseService
{
    public static function SendJson ($status, $data = [], $code = 200, $errors = []){
        return response() -> json([
            'status' => $status,
            'data' => $data,
            'errors' => $errors
        ], $code);
    }
}
