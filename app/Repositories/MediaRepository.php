<?php

namespace App\Repositories;

use App\Models\Media;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MediaRepository
{
    protected const DISK = 'public'; // Use constant instead of property

    public static function create(UploadedFile $file, $mediaable, string $folder = 'media'): Media
    {
        $path = $file->store($folder, self::DISK);

        return $mediaable->media()->create([
            'file_name' => $file->getClientOriginalName(),
            'file_path' => $path,
            'mime_type' => $file->getClientMimeType(),
        ]);
    }

    public static function update(Media $media, UploadedFile $file, string $folder = 'media'): Media {
        if (Storage::disk(self::DISK)->exists($media->file_path)) {
            Storage::disk(self::DISK)->delete($media->file_path);
        }

        $path = $file->store($folder, self::DISK);

        $media->update([
            'file_name' => $file->getClientOriginalName(),
            'file_path' => $path,
            'mime_type' => $file->getClientMimeType(),
        ]);

        return $media;
    }

    public static function delete(Media $media): bool
    {
        if (Storage::disk(self::DISK)->exists($media->file_path)) {
            Storage::disk(self::DISK)->delete($media->file_path);
        }

        return $media->delete();
    }
}
