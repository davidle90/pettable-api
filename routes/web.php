<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/workflow-guide', function () {
    return view('workflow_guide');
});
