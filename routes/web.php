<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use League\CommonMark\CommonMarkConverter;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api-docs', function () {
    $markdown = File::get(base_path('API_DOC.md'));
    $converter = new CommonMarkConverter([
        'html_input' => 'strip',
        'allow_unsafe_links' => false,
    ]);
    $html = $converter->convert($markdown);

    return view('api-docs', ['content' => $html]);
});

Route::get('/demo', function () {
    return view('demo');
});
