<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;

Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

Route::group(['prefix' => 'v1'], function (){
    Route::post('url-generate', [\App\Http\Controllers\LinkController::class,'generate'])->name('api.url-generate');
})->middleware('web');


