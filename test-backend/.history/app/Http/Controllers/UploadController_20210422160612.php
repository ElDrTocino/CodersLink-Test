<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload (Request $request){

        foreach ($request->file('images') as $file) {
            echo $file->getClientOriginalExtension();
            // $fileName =  time()."_".$file->getClientOriginalName();
            return ($file->getClientOriginalExtension());

        }
        
        return response()->json(['success' => true]);
    }
}
