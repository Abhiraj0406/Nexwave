<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;

class ReadoutController extends Controller
{
    public function showReadings()
    {
        return view('pages.reading');
    }
}
