<?php

namespace App\Http\Controllers;

use App\Adapters\Bitcoin\BitcoinPriceAdapter;
use App\Adapters\Email\EmailAdapter;
use App\Adapters\Thumbnail\ThumbnailMakerAdapter;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Controller as BaseController;

class MainController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function mail(EmailAdapter $emailAdapter)
    {
        $emailAdapter->send(
            'username@emailservice.com',
            'Hi! Thanks for signing up!',
            'Here is your verification code 12345'
        );

        dd('Email sent!');
    }

    public function makeThumbnail(ThumbnailMakerAdapter $thumbnailMakerAdapter)
    {
        $file = new UploadedFile(
            public_path('montblanc.jpg'),
            'montblanc.jpg'
        );
        $thumbnailUrl = $thumbnailMakerAdapter->make($file);

        dd($thumbnailUrl);
    }

    public function bitcoin(BitcoinPriceAdapter $bitcoinPriceAdapter)
    {
        $price = $bitcoinPriceAdapter->fetchPrice();

        dd($price);
    }
}
