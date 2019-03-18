<?php

namespace App\Utils;

trait ApiResponse
{
    public function fail($msg = "error", $code = -1)
    {

        return response()->json([
                'code' => $code,
                'msg' => $msg,
            ]
        );
    }

    public function success($data = [])
    {
        return response()->json([
                'code' => 0,
                'msg' => "ok",
                'data' => $data,
            ]
        );
    }
}