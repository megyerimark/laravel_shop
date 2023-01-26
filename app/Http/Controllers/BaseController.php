<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function sendResponse( $result, $message)
    {

        $responese = [
            "success"=> true,
            "data"=>$result,
            "message"=>$message
        ];
        return response()->json($responese , 200);
    }


    public function sendError($error,$errorMessages = [], $code= 404)
    {


    }
}


