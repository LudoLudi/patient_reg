<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IslandController;

Route::get('/', function () {
    return view('welcome');
});

Route::apiResource('islands', IslandController::class);