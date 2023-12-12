<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;


Route::group(['prefix'=>'/login','middleware'=>'admin.notLogged'],function(){
    Route::get("",[AuthController::class,"login"])->name('admin.login');
    Route::post("",[AuthController::class,"loginPost"])->name('admin.loginPost');
});


Route::get("logout",[AuthController::class,"logout"])->name('admin.logout');

Route::group(['middleware'=>'admin.logged'],function(){
    Route::get("home",[HomeController::class,"home"])->name('admin.home');

    Route::group(['prefix'=>'/admin'],function(){
        Route::get("index",[AdminController::class,"index"])->name('admin.index');
        
        Route::get("",[AdminController::class,"getData"])->name('admin.getData');
        Route::post("",[AdminController::class ,"createAdmin"])->name('admin.createAdmin');
        Route::get("edit/{admin}",[AdminController::class,"adminEdit"])->name('admin.edit');
        Route::post("update/{admin}",[AdminController::class,"adminUpdate"])->name('admin.update');
        Route::get("delete/{admin}",[AdminController::class,"adminDelete"])->name('admin.delete');
    });
});


