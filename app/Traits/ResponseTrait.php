<?php

namespace App\Traits;


trait ResponseTrait
{
    public function Error($code, $msg)
    {
        return response()->json(
            [
                'code' => $code,
                'message' => $msg,
                'result' => false
            ]
        );
    }

    public function BadRequest($errors)
    {
        return response()->json([
            'code' => "400",
            'message' => "Bad Request",
            'status' => false,
            'errors' => $errors
        ]);
    }

    public function Success($message = "OK", $code = "200")
    {
        return [
            'code' => $code,
            'message' => $message,
            'status' => true
        ];
    }

    public function returnData($key, $value, $message = "OK")
    {
        return response()->json([
            'code' => '200',
            'message' => $message, 
            'status' => true,
            $key => $value,
        ]);
    }
}
