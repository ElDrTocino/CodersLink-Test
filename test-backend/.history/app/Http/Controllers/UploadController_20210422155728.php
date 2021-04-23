<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload (Request $request){


        // foreach ($request->file('images') as $file) {
        //     $fileName =  time()."_".$file->getClientOriginalName();
        //     Storage::disk('public')->put($fileName, File::get($file));


        // }


        $request->validate([
            'image' => 'required|image|mimes:png|max:2048',
        ]);





        return response()->json(['success' => true]);
    }
}
