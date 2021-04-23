<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload (Request $request){
        $SUCCESS = 'succees', $ERROR, $MESSAGE, $STATUS;
        $response[];
        $image = $request->file('image');
        if($image->getClientOriginalExtension() !== 'png'){
            
        }
        $response[].push('status' => $STATUS);
        return response()->json([,'message' => $MESSAGE, $STATUS,'message' => $MESSAGE]);
    }
}
