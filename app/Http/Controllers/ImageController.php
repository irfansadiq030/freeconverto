<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\Log;

class ImageController extends Controller
{
    public function convertImage(Request $request)
    {
        try {
            // Validate the incoming request
            // $request->validate([
            //     'imgFile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // 10MB max
            // ]);

            // Check if file is uploaded
            if (!$request->hasFile('imgFile')) {
                return response()->json([
                    'message' => 'No file uploaded',
                ], 400);
            }


            // Get the uploaded file
            $file = $request->file('imgFile');

            // Get the format
            // $format = $request->input('format');
            $format = 'png';

            // Read the image from the file
            $img = Image::make($file);

            // Create a new filename with the desired format
            $newFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.'. $format  ;

            // Convert and save the image in the new format
            $img->encode($format)->save(public_path('converted_images/' . $newFilename));

            // Generate the URL of the converted image
            $imageUrl = asset('converted_images/' . $newFilename);

            return response()->json([
                'message' => 'Image converted successfully',
                'new_image' => $imageUrl
            ]);
        } catch (\Exception $e) {
            Log::error('Image conversion failed: ' . $e->getMessage());

            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }

    }
}
