<?php

namespace App\Http\Controllers;

use App\Adapters\Email\EmailAdapter;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class MainController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home(EmailAdapter $emailAdapter)
    {
        $emailAdapter->send('sdfsdf','sdfsdf','sdfsdf');
    }
}
