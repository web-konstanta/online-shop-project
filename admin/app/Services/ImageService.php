<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImageService
{
    public function resize(UploadedFile $file, string $path, int $width, int $height): string
    {
        $imageName = Str::replace(
            '/',
            '',
            Hash::make($file->getClientOriginalName())
        );
        $image = Image::make($file)
            ->fit($width, $height)
            ->save(public_path('storage/' . $path . '/' . $imageName . '.jpg'));
        return $path . '/' . $image->basename;
    }

    public function saveProductImages(array $files): string
    {
        $paths = [];
        foreach ($files as $file) {
            $paths[] = $this->resize($file, 'product', 300, 300);
        }
        return json_encode($paths);
    }

    public function deleteImages(array $images): void
    {
        foreach ($images as $image) {
            Storage::delete('public/' . $image);
        }
    }
}
