<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function success($message,$data, $code = 200)
    {
        return response()->json(['status' => 'ok','data' => $data ,'message' => $message , 'code' => $code],$code);
    }
    public function error($message='error',$code)
    {
        return response()->json(['status' => 'error','message' => $message],$code);
    }
}
