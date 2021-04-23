<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload (Request $request){
        $STATUS = 'succees';
        $ERROR;
        $MESSAGE;
         $STATUS;
        $response = array();
        try{
            $image = $request->file('image');
            if($image->getClientOriginalExtension() !== 'png'){
            
            }
        } catch(Exception $e){
            $STATUS = 'false';
        }
        

        array_push($response,['status'=>$STATUS]);

        return response()->json($response);
    }
}
