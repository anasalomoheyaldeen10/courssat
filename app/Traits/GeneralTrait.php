<?php

namespace App\Traits;
Trait GeneralTrait
{
    public function apiResponse($data=null, bool $status =true, $error=null,$statusCode=200)
    {
            $array=[
            'data'=>$data,
            'status' => $status,
            'error' => $error,
            'statusCode' => $statusCode ];
            return response()->json($array, $statusCode);


    }
}
