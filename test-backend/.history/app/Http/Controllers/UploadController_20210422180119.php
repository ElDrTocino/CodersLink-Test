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
                        //$imageBase64 = 'data:image/' . $IMAGE_TYPE . ';base64,' . base64_encode(file_get_contents($image));
                        $imageBase64 = base64_encode(file_get_contents($image));
                        //echo $imageBase64;
                        $client = new Client();
                        $responseStorageService= $client->post(
                            'https://test.rxflodev.com',
                            array(
                                'form_params' => array(
                                    'imageData' => $imageBase64,
                                )
                            )
                        );
                        

                        // $responseStorageService = $this->client->post(url('https://test.rxflodev.com'), [
                        //     'multipart' => [
                        //         [
                        //             'name'     => 'imageData',
                        //             'filename' => $image->getClientOriginalName(),
                        //             'Mime-Type'=> $image->getmimeType(),
                        //             'contents' => fopen( $image_path, 'r' ),
                        //         ],
                        //     ]
                        // ]);
                        $data = json_decode($responseStorageService->getBody(), true);
                        $MESSAGE = $data;
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
