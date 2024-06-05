<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class ImageController extends Controller
{
    public function blogImage($imageName)
    {
        $filePath = storage_path('app/public/blog_images') . '/' . $imageName;

        // Check if the file exists
        if (!file_exists($filePath)) {
            $filePath = storage_path('app/public/blog_images') . '/defaultImage.png';
        }
        $fileContents = file_get_contents($filePath);

        $response = new Response($fileContents, 200);

        $mimeType = mime_content_type($filePath);
        $response->header('Content-Type', $mimeType);

        return $response;
    }
}
