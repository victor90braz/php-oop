<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('posts');
});

Route::get('posts/{post}', function ($slug) {

    // Find a post by its slug and pass it to a vew called "post"
    $post = \App\Models\Post::find($slug);

    return view('post', [
        'post' => $post
    ]);

})->where('post', '[A-z_\-]+');

