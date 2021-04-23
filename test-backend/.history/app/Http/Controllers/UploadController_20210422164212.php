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
            if($request->exists('image')) {
                if($request->hasFile('image')){
                    $image = $request->file('image');
                    if($image->getClientOriginalExtension() != 'png'){
                        dd("aa");
                    }
                }else{
                    array_push($response,['message'=>$'The param, is not a file']);
                }
            }else{

            }
        }catch(Exception $e){
            $STATUS = 'false';
        }
        

        array_push($response,['status'=>$STATUS]);

        return response()->json($response);
    }
}
