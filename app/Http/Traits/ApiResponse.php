<?php

namespace App\Http\Traits;

trait ApiResponse
{
    public function apiResponse($status = 200, $message = null, $errors = null, $data = null)
    {

        $responseArray = [
            'status' => $status,
            'message' => $message,
        ];

        if (!is_null($errors) && is_null($data)) {
            $responseArray['errors'] = $errors;
        } elseif (!is_null($data) && is_null($errors)) {
            $responseArray['data'] = $data;
        }


        return response($responseArray, 200);
    }
}