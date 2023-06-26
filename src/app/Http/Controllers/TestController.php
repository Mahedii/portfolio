<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as ResizeImage;
use App\Services\TestDataService;

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
            $testDataService = new TestDataService($request);
            $response = $testDataService->getResponse();
            dd($response);
        } catch (Exception $e) {
            dd($e->getMessage());
        }

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
                    $resizedImage = ResizeImage::make($fileData)
                    ->resize(1280, 720, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->encode();

                    // Store the resized image
                    Storage::disk('public')->put($path . 'resized_' . $filename, $resizedImage);
                }
            }

            if ($request->hasfile('multipleImageFile')) {
                foreach ($request->multipleImageFile as $multi_image) {
                    $fileName = $multi_image->getClientOriginalName();
                    $path = public_path('frontend/assets/images/tour_packages/' . $SLUG . '/');
                    if (!File::isDirectory($path)) {
                        File::makeDirectory($path, 0777, true, true);
                    }
                    if ($multi_image->move($path, $fileName)) {
                        $filePath = 'frontend/assets/images/tour_packages/' . $SLUG . '/' . $fileName;
                        TourPackageImage::create([
                            'PACKAGE_ID' => $request->PACKAGE_ID,
                            'FILE_NAME' => $fileName,
                            'FILE_PATH' => $filePath,
                            'CREATOR' => Auth::user()->id
                        ]);
                    }
                    ResizeImage::make($multi_image)->resize(300, 200)->save(public_path($filePath));
                }
            }

            return redirect()->back()->with('uploaded', true);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
