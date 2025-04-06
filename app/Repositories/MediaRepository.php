<?php

namespace App\Repositories;

use App\Models\Media;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MediaRepository
{   
    public static function create(UploadedFile $file, $path, $type = null) {
        $src = Storage::put('/' . trim($path, '/'), $file, 'public');
        return Media::create([
            'extension' => $file->extension(),
            'src' => $src,
            'path' => $path,
        ]);
    }

    // public static function storeByPath($filePath, $path, $type = null) {
    //     // Read the file content from the provided path
    //     $fileContents = file_get_contents($filePath);
    //     $fileName = basename($filePath); // Get the filename

    //     // Use Storage to put the file content into the specified directory
    //     $src = Storage::put('/' . trim($path, '/') . '/' . $fileName, $fileContents, 'public');

    //     // Return a new Media record with the stored file details
    //     return self::create([
    //         'extension' => pathinfo($filePath, PATHINFO_EXTENSION), // Get the extension from file path
    //         'src' => $src,
    //         'path' => $path,
    //         'type' => $type,
    //     ]);
    // }

    public static function update(UploadedFile $file, Media $media, $path) {
        $src = Storage::put('/' . trim($path, '/'), $file, 'public');

        if (Storage::exists($media->src)) {
            Storage::delete($media->src);
        }

        $media->update([
            'extension' => $file->extension(),
            'src' => $src,
            'path' => $path,
        ]);

        return $media;
    }

    // public static function updateOrCreateByRequest(UploadedFile $file, $path, $media = null, $type = null) {
    //     $src = Storage::put('/' . trim($path, '/'), $file, 'public');

    //     if ($media && Storage::exists($media->src)) {
    //         Storage::delete($media->src);
    //     }

    //     $media = self::query()->updateOrCreate([
    //         'id' => $media?->id ?? 0
    //     ], [
    //         'extension' => $file->extension(),
    //         'src' => $src,
    //         'path' => $path,
    //         'type' => $type,
    //     ]);

    //     return $media;
    // }
}