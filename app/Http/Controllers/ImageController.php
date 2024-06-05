<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class ImageController extends Controller
{
    public function convertImage(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        // Get the uploaded file
        $file = $request->file('img');

        // configure with favored image driver (gd by default)
        // Image::configure(['driver' => 'imagick']);


        // Read the image from the file
        $img = Image::make($file);


        // Create a new filename with the desired format
        $newFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.png';

        // Convert and save the image in the new format
        $img->encode($format)->save(public_path('converted_images/' . $newFilename));
        dd($newFilename);
        
        return response()->json([
            'message' => 'Image converted successfully',
            'new_image' => url('converted_images/' . $newFilename)
        ]);
    }
}
