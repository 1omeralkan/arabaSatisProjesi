<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/firat', function () {
    return 'firat';
})->middleware('kayitliMi');





Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',
    ])->group(function () {
    Route::get('/dashboard', function ()
        {return view('dashboard');})->name('dashboard');
});

//ADMİN ROUTES

//bir middleware,bir prefix,bir kural

Route::group(['prefix'=>'/admin','middleware'=>'isAdmin'], function () {
    Route::get('/dashboard',[AdminController::class,'index'])->name('adminDashboard');

    //arabaMarkaRotaları
    Route::group(['prefix'=>'carBrand'], function () {
        Route::get('/index',[AdminController::class,'carBrandIndex'])->name('admin.carBrand.index');
        Route::get('/create',[AdminController::class,'carBrandCreate'])->name('admin.carBrand.create');
        Route::post('/add',[AdminController::class,'carBrandAdd'])->name('admin.carBrand.Add');
        Route::get('/update/{id}',[AdminController::class,'carBrandUpdate'])->name('admin.carBrand.update');
        Route::post('/update',[AdminController::class,'carBrandEdit'])->name('admin.carBrand.Edit');
        Route::get('/delete/{id}',[AdminController::class,'carBrandDelete'])->name('admin.carBrand.delete');

    });



    //arabaMarkaModelRotaları
    Route::group(['prefix'=>'carBrandModel'], function () {
        Route::get('/index',[AdminController::class,'carBrandModelIndex'])->name('admin.carBrandModel.index');
        Route::get('/create',[AdminController::class,'carBrandModelCreate'])->name('admin.carBrandModel.create');
        Route::post('/add',[AdminController::class,'carBrandModelAdd'])->name('admin.carBrandModel.Add');
        Route::get('/update/{id}',[AdminController::class,'carBrandModelUpdate'])->name('admin.carBrandModel.update');
        Route::post('/update',[AdminController::class,'carBrandModelEdit'])->name('admin.carBrandModel.Edit');
        Route::get('/delete/{id}',[AdminController::class,'carBrandModelDelete'])->name('admin.carBrandModel.delete');

    });


});





//USER ROUTES

Route::group(['prefix'=>'user'],function(){
    Route::group(['prefix'=>'arabaIlan'],function(){
        Route::get('/index',[UserController::class,'arabaIlanIndex'])->name('user.arabaIlan.index');
        Route::get('/create',[UserController::class,'arabaIlanCreate'])->name('user.arabaIlan.create');
        Route::post('/add',[UserController::class,'arabaIlanAdd'])->name('user.arabaIlan.Add');
        Route::get('/update/{id}',[UserController::class,'arabaIlanUpdate'])->name('user.arabaIlan.update');
        Route::post('/update',[UserController::class,'arabaIlanEdit'])->name('user.arabaIlan.Edit');
        Route::get('/delete/{id}',[UserController::class,'arabaIlanDelete'])->name('user.arabaIlan.delete');
        Route::get('/detay/{id}', [UserController::class, 'arabaIlanDetay'])->name('user.arabaIlan.detay');





    });


});





//TEST ROUTES
Route::get('/panel/template',function(){
    return view('panel.layout.app');
});
