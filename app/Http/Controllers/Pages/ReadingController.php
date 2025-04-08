<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ReadingController extends Controller
{
    public function showReadings()
    {
        return view('pages.reading');
    }
}
