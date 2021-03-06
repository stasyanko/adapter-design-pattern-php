<?php

namespace App\Adapters\Thumbnail;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\UploadedFile;

class CloudinaryApiAdapter implements ThumbnailMakerInterface
{
    public function make(UploadedFile $uploadedFile): string
    {
        $thumbnailUrl = Cloudinary::upload($uploadedFile->getRealPath())->getSecurePath();
        return $this->insertResizingParameter($thumbnailUrl);
    }

    private function insertResizingParameter($thumbnailUrl): string
    {
        return str_replace('/image/upload/', '/image/upload/w_150,c_scale/', $thumbnailUrl);
    }
}
