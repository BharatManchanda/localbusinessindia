<?php

namespace App\Repositories;

use App\Models\Media;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MediaRepository
{
    protected $disk = 'public'; // Change if you use a different disk

    public function create(UploadedFile $file, $mediaable, string $folder = 'media'): Media {
        $path = $file->store($folder, $this->disk);

        return $mediaable->media()->create([
            'file_name'     => $file->getClientOriginalName(),
            'file_path'     => $path,
            'mime_type'     => $file->getClientMimeType(),
        ]);
    }

    public function update(Media $media, UploadedFile $file, string $folder = 'media'): Media
    {
        // Delete old file
        if (Storage::disk($this->disk)->exists($media->file_path)) {
            Storage::disk($this->disk)->delete($media->file_path);
        }

        $path = $file->store($folder, $this->disk);

        $media->update([
            'file_name'     => $file->getClientOriginalName(),
            'file_path'     => $path,
            'mime_type'     => $file->getClientMimeType(),
        ]);

        return $media;
    }

    public function delete(Media $media): bool {
        if (Storage::disk($this->disk)->exists($media->file_path)) {
            Storage::disk($this->disk)->delete($media->file_path);
        }

        return $media->delete();
    }
}
