<?php

    namespace App\Helpers;

    class ResponseFormatter {
        protected static $response = [
            'code' => null,
            'message' => null,
            'data' => null,
        ];

        public static function createResponse($code, $message, $data) {
            self::$response['code'] = $code;
            self::$response['message'] = $message;
            self::$response['data'] = $data;

            return response()->json(self::$response, self::$response['code']);
        }
    }

?>