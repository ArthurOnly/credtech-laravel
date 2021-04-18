<?php
namespace App\Helpers;

class ResponseHelper{
    public static function format_response($success, $data, $message){
        $response = [
            'success' => $success,
            'data' => $data,
            'message' => $message
        ];
    
        return $response;
    }   
}