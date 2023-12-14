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
Route::get("", function (){
    return redirect()->route('admin.home');
});

Route::group(['middleware'=>'admin.logged'],function(){
    Route::get("home",[HomeController::class,"index"])->name('admin.home');

    Route::group(['prefix'=>'admins'],function(){
        Route::get("",[AdminController::class,"index"])->name('admins.index');
        Route::group(['prefix'=>'store'],function(){
            Route::get("",[AdminController::class,"store"])->name('admin.store');
            Route::post("",[AdminController::class,"save"])->name('admin.save');
        });
        Route::get("edit/{admin}",[AdminController::class,"edit"])->name('admin.edit');
        Route::post("update/{admin}",[AdminController::class,"update"])->name('admin.update');
        Route::get("delete/{admin}",[AdminController::class,"destroy"])->name('admin.destroy');
    });
});


