<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload (Request $request){

        
         foreach ($request->file('images') as $file) {
            // $fileName =  time()."_".$file->getClientOriginalName();
            echo($file->getClientOriginalExtension());

        }
        
        return response()->json(['success' => true]);
    }
}
