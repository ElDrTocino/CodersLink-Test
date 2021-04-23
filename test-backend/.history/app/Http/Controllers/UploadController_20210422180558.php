<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class UploadController extends Controller
{
    public function upload (Request $request){
        $STATUS = 'succees';
        $IMAGE_TYPE= 'png';
        $MESSAGE;
        $STATUS;
        $response = array();
        try{
            if($request->exists('image')) {
                if($request->hasFile('image')){
                    $image = $request->file('image');
                    if($image->getClientOriginalExtension() != $IMAGE_TYPE){
                        $MESSAGE = 'The file extension is not PNG';
                    }else{
                        //UploadImage
                        $imageBase64 = base64_encode(file_get_contents($image));
                        $client = new Client();
                        $responseStorageService= $client->post(
                            'https://test.rxflodev.com',
                            array(
                                'form_params' => array(
                                    'imageData' => $imageBase64,
                                )
                            )
                        );
                        $data = json_decode($responseStorageService->getBody(), true);
                        $MESSAGE = $data['message'];
                        $STATUS =  $data['status'];
                        $response['url'] = $data['url'];
                    }
                }else{
                    $MESSAGE = 'The param, is not a file';
                }
            }else{
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
