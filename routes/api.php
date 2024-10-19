<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IslandController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Hello World
Route::get('/hello', function () {
    return "Hello World!";
});

// IslandController
Route::apiResource('islands', IslandController::class);