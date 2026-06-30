<?php
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ImageGalleryController extends Controller
{

    public function index(Request $request)
    {
        $directories = Storage::disk('public')->directories();
        $selectedFolder = $request->query('folder', $directories[0] ?? null);
        $images = [];

        if ($selectedFolder) {
            $files = Storage::disk('public')->files($selectedFolder);

            $images = collect($files)
                ->filter(fn($file) => preg_match('/\.(jpg|jpeg|png|gif|bmp|svg|webp)$/i', $file))
                ->map(function ($file) {
                    $fullPath = storage_path('app/public/' . $file);
                    $imageInfo = @getimagesize($fullPath); // width, height from image
    
                    return [
                        'path' => $file,
                        'url' => asset("public/storage/{$file}"),
                        'size' => Storage::disk('public')->size($file), // in bytes
                        'width' => $imageInfo[0] ?? null,
                        'height' => $imageInfo[1] ?? null,
                    ];
                })->values()->toArray();
        }

        return view('admin.views.list.ImageGallery', compact('directories', 'selectedFolder', 'images'));
    }

    public function destroy(string $image)
    {
        if (str_contains($image, '..')) {
            return back()->with('error', 'Invalid path.');
        }

        if (!Storage::disk('public')->exists($image)) {
            return back()->with('error', 'File not found.');
        }

        Storage::disk('public')->delete($image);

        return back()->with('success', 'Image deleted successfully!');
    }
}
