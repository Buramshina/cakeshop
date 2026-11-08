<?php

namespace App\Support;

use Illuminate\Support\Facades\Request;

class Url
{
    public static function withParams(string $sort): string
    {
        return Request::fullUrlWithQuery(['sort' => $sort]);
    }
}