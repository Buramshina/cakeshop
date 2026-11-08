<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home()
    {
        return view('home'); // Ищет файл resources/views/home.blade.php
    }

    public function about()
    {
        return view('pages.about');
    }

    public function applyBaker()
    {
        return view('pages.apply-baker'); 
    }
}