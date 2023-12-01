<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix'=>'/login','middleware'=>'admin.notLogged'],function(){
    Route::get("",[AuthController::class,"login"])->name('admin.login');
    Route::post("",[AuthController::class,"loginPost"])->name('admin.loginPost');
});

Route::group(['middleware'=>'admin.logged'],function(){
    Route::get("home",[HomeController::class,"home"])->name('admin.home');
});

