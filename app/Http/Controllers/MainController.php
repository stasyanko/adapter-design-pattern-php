<?php

namespace App\Http\Controllers;

use App\Adapters\Email\EmailAdapter;
use App\Adapters\ImageOptimizer\ImageOptimizerAdapter;
use App\Adapters\ImageOptimizer\ImageQualityValues;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
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

    public function optimizeImage(ImageOptimizerAdapter $optimizerAdapter)
    {
        $imageUrl = 'https://homepages.cae.wisc.edu/~ece533/images/mountain.png';
        $optimizedImagePath = $optimizerAdapter->optimize($imageUrl,200,ImageQualityValues::MEDIUM);

        dd($optimizedImagePath);
    }
}
