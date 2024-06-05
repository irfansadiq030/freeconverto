<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;

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

        // dd($request);

        // Get the uploaded file
        $file = $request->file('img');

        // Get the format
        $format = $request->input('format');

        // configure with favored image driver (gd by default)
        // Image::configure(['driver' => 'imagick']);


        // Read the image from the file
        $img = Image::make($file);


        // Create a new filename with the desired format
        $newFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.' . $format;
        // dd($newFilename);
        // Convert and save the image in the new format
        $img->encode($format)->save(public_path('converted_images/' . $newFilename));

        // Generate the URL of the converted image
        $imageUrl = asset('converted_images/' . $newFilename);

        // Redirect back with the image URL
        return Redirect::back()->with('imageUrl',
            $imageUrl
        );
    }
}
