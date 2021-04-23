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
                        dd("aa");
                    }
                }else{
                    array_push($response2,'message'=>'The param, is not a file');
                    array_push($response2,['status'=>$STATUS]);
                }
            }else{

            }
        }catch(Exception $e){
            $STATUS = 'false';
        }
        

        array_push($response,$response2);

        return response()->json($response);
    }
}
