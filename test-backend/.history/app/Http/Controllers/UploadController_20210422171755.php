<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class UploadController extends Controller
{
    public function upload (Request $request){
        $STATUS = 'succees';
        $IMAGE_TYPE= 'png';
        $ERROR;
        $MESSAGE;
        $STATUS;
        $response = array();
        $response2 = array();
        try{
            if($request->exists('image')) {
                if($request->hasFile('image')){
                    $image = $request->file('image');
                    if($image->getClientOriginalExtension() != $IMAGE_TYPE){
                        //$response['status'] = $STATUS;
                        $MESSAGE = 'The file extension is not PNG';
                    }else{
                        //UploadImage
                        $base64 = 'data:image/' . $IMAGE_TYPE . ';base64,' . base64_encode($image->pat‌​h());
                        //$image = base64_encode(file_get_contents($image->pat‌​h()));
                        //echo $base64;
                        $MESSAGE = $image;
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
