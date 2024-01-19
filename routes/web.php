<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/vatservice/', [\App\Http\Controllers\VATServiceController::class, 'getVatAmount']);

