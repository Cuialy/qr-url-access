<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
