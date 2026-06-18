<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('customer.home');
});

Route::get('/admin', function () {
    return view('admin.index');
});