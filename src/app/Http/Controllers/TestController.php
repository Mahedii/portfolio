<?php

namespace App\Http\Controllers;

use File;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    /**
     * Fetch expected data
     *
     * @param Request $request
     */
    public function __invoke(Request $request)
    {
        try {
            dd($request);
            if ($request->hasfile('multiplefile')) {
                dd($request);
                foreach ($request->multiplefile as $file) {
                    $file = json_decode($file, true);
                    $filename = $file['name'];
                    $fileData = base64_decode($file['data']);

                    $extension = pathinfo($filename, PATHINFO_EXTENSION);

                    $path = 'assets/uploads/';
                    if (!File::isDirectory(public_path($path))) {
                        File::makeDirectory(public_path($path), 0777, true, true);
                    }
                    Storage::disk('public')->put($path . $filename, $fileData);

                    // Resize image with Image Intervention
                    $resizedImage = Image::make($fileData)
                    ->resize(1280, 720, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->encode();

                    // Store the resized image
                    Storage::disk('public')->put($path . 'resized_' . $filename, $resizedImage);
                }
            }
            return redirect()->back()->with('uploaded', true);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
