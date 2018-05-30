<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;

class BrowserShotController extends Controller
{
    public function index()
    {
        // $pathToImage = '/assets/browser.jpg';
        // Browsershot::url('https://hkorderportal.com')->save($pathToImage)->setNodeBinary('/usr/local/bin/node')->setNpmBinary('/usr/local/bin/npm');
        Browsershot::html('<h1>Hello world!!</h1>')->save('assets/example.pdf');
    }
}
