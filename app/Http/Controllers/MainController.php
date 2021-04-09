<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Adapters\Bitcoin\BitcoinPriceInterface;
use App\Adapters\Email\EmailClientInterface;
use App\Adapters\Image\ImageSearchInterface;
use App\Adapters\Invoice\InvoiceGeneratorInterface;
use App\Adapters\Invoice\InvoiceItemDto;
use App\Adapters\Invoice\PartyDto;
use App\Adapters\IpGeolocation\IpGeolocationInterface;
use App\Adapters\News\NewsClientInterface;
use App\Adapters\Thumbnail\ThumbnailMakerInterface;
use App\Adapters\UrlShortener\UrlShortenerInterface;
use App\Adapters\Weather\WeatherProviderInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Controller as BaseController;
use DateTime;

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

    public function news(NewsClientInterface $newsClient)
    {
        $newsDtos = $newsClient->search(
            'Suez canal',
            new DateTime(),
            100
        );

        dd($newsDtos);
    }

    public function invoice(InvoiceGeneratorInterface $invoiceGenerator)
    {
        $sellerDto = new PartyDto('Andrew', '202-555-0193');
        $buyerDto = new PartyDto('Mark', '308-158-0173');
        $invoiceItemDtos = [
            new InvoiceItemDto('Apples', 5, 7, 3),
            new InvoiceItemDto('Oranges', 8, 5, 7),
        ];
        $fileName = 'Invoice_0001';

        $invoiceGenerator->generate(
            $sellerDto,
            $buyerDto,
            $invoiceItemDtos,
            'USD',
            '$',
            $fileName
        );

        return response()->file(storage_path('app/public/' . $fileName . '.pdf'));
    }
}
