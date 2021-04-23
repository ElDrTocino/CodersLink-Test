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
        $response2 = array();
        try{
            if($request->exists('image')) {
                if($request->hasFile('image')){
                    $image = $request->file('image');
                    if($image->getClientOriginalExtension() != 'png'){
                        //$response['status'] = $STATUS;
                        $MESSAGE = 'The file extension is not PNG';
                    }else{
                        //UploadImage
                    }
                }else{
                    //$response['status'] = $STATUS;
                    $MESSAGE = 'The param, is not a file';
                }
            }else{
                   // $response['status'] = $STATUS;
                   $MESSAGE = 'Param is needed';
            }
            
        }catch(Exception $e){
            $STATUS = 'false';
            $MESSAGE = $e->getMessage();
        }

        $response['status'] = $STATUS;
        $response['message'] = $MESSAGE;
        return response()->json($response);
    }
}
