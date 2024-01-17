<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('posts', [
        'posts' => \App\Models\Post::all()
    ]);
});

Route::get('posts/{post}', function ($slug) {

    return view('post', [
        'post' => \App\Models\Post::find($slug)
    ]);

})->where('post', '[A-z_\-]+');

