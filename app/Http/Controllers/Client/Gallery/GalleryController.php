<?php

namespace App\Http\Controllers\Client\Gallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        return view('clients.gallery.index');
    }
}
