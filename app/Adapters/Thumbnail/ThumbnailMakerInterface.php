<?php

namespace App\Adapters\Thumbnail;

use Illuminate\Http\UploadedFile;

interface ThumbnailMakerInterface
{
    /**
     * @param UploadedFile $uploadedFile
     * @return string a URL with a thumbnail
     */
    public function make(UploadedFile $uploadedFile): string;
}
