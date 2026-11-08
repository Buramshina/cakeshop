<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BakerDashboardoController extends Controller
{
    public function index()
    {
        return view('baker.dashboard');
    }
}
