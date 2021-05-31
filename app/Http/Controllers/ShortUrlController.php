<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;

class ShortUrlController extends Controller
{
    public function index($code)
    {
        $url = ShortUrl::where('code', $code)->firstOrFail();

        return redirect()->to($url->url);
    }
}
