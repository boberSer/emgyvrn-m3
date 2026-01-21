<?php

namespace App\Exceptions;

use Illuminate\Http\Exceptions\HttpResponseException;

class ApiException extends HttpResponseException
{
    public function __construct($code = 422, $message = 'Validation Error', $errors = [])
    {
        $data = [
            'code' => $code,
            'message' => $message,
            'errors' => $errors
        ];

        if (!count($errors)) {
            $data['message'] = $message;
        }

        parent::__construct(response()->json($data)->setStatusCode($code));
    }
}
