<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Adapters\Bitcoin\BitcoinPriceInterface;
use App\Adapters\Email\EmailClientInterface;
use App\Adapters\Image\ImageSearchInterface;
use App\Adapters\IpGeolocation\IpGeolocationInterface;
use App\Adapters\Thumbnail\ThumbnailMakerInterface;
use App\Adapters\UrlShortener\UrlShortenerInterface;
use App\Adapters\Weather\WeatherProviderInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Controller as BaseController;

class MainController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function ip(IpGeolocationInterface $ipGeolocation)
    {
        $geoData = $ipGeolocation->geoDataFromIp('1.32.239.255	');

        dd($geoData);
    }

    public function image(ImageSearchInterface $imageSearch)
    {
        $imageDtos = $imageSearch->search('orange', 20);

        dd($imageDtos);
    }

    public function mail(EmailClientInterface $emailAdapter)
    {
        $emailAdapter->send(
            'username@emailservice.com',
            'Hi! Thanks for signing up!',
            'Here is your verification code 12345'
        );

        dd('Email sent!');
    }

    public function makeThumbnail(ThumbnailMakerInterface $thumbnailMakerAdapter)
    {
        $file = new UploadedFile(
            public_path('montblanc.jpg'),
            'montblanc.jpg'
        );
        $thumbnailUrl = $thumbnailMakerAdapter->make($file);

        dd($thumbnailUrl);
    }

    public function bitcoin(BitcoinPriceInterface $bitcoinPriceAdapter)
    {
        $price = $bitcoinPriceAdapter->fetchPrice();

        dd($price);
    }

    public function weather(WeatherProviderInterface $weatherProviderAdapter)
    {
        $weatherDto = $weatherProviderAdapter->currentWeather(53.893009,27.567444);

        dd($weatherDto);
    }

    public function shortenUrl(UrlShortenerInterface $urlShortener)
    {
        $shortUrl = $urlShortener->makeShortUrl('https://webcodingo.com');

        dd($shortUrl);
    }
}
