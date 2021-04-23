<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload (Request $request){
        $SUCCESS = 'succees';
        $ERROR;
        $MESSAGE;
         $STATUS;
        $response[];
        $image = $request->file('image');
        if($image->getClientOriginalExtension() !== 'png'){
            
        }
        array_push($response, {'status'=>$STATUS});
        return response()->json(response);
    }
}
