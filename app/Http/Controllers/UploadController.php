<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload (Request $request){
        $fileName =time().'-'.$_FILES['file']['name'];
        $request -> file('file')-> storeAs('public/images',$fileName);
        $url = '/storage/images/'.$fileName;
        return response() -> json([
            'success' => true,
            'path' => $url
        ]);
    }

    public function uploadImage (Request $request){
        $files = $request -> file('files');
        for ($i=0; $i < count($files) ; $i++) { 
        $fileName =time().'-'.$files[$i]->getClientOriginalName();
        $files[$i] -> storeAs('/public/images',$fileName);
        $url[] = '/storage/images/'.$fileName;
        
       }
       return response() -> json([
        'success' => true,
        'url' => $url

        ]);
    
    }
}
