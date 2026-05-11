<?php

use App\Http\Controllers\PublicController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/designs', [PublicController::class, 'getDesigns']);
Route::get('/nominals', [PublicController::class, 'getNominals']);
