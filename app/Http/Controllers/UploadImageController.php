<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UploadImage;

class UploadImageController extends Controller
{
    function show() {
        return view("upload_form");
    }
    
    function upload(Request $request) {
        $request->validate([
            'image' => 'required|file|image|mimes:png,jpeg'    
        ]);
        $upload_image = $request->file('image');
        
        if($upload_image) {
            $path = $upload_image->store('uploads', "public");
            if($path) {
                UploadImage::create([
                    "file_name" => $upload_image->getClientOriginalName(),
                    "file_path" => $path
                ]);
            }
        }
        return redirect("/");
    }
}
