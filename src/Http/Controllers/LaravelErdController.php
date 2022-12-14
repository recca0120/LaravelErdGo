<?php

namespace Recca0120\LaravelErd\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Recca0120\LaravelErd\Templates\Factory;

class LaravelErdController extends Controller
{
    public function index(Factory $factory, $file = 'laravel-erd.ddl')
    {
        $factory->supports($file);
        $storagePath = config('laravel-erd.storage_path');
        $contents = base64_encode(File::get($storagePath . '/' . $file));

        return view('laravel-erd::index', compact('contents'));
    }
}