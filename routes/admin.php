<?php

use App\Http\Controllers\Admin\DoorDivisionController;
use App\Http\Controllers\Admin\FillingController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\InventoryCategoryController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\PlacePositionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group([
    'prefix' => 'home',
    'middleware' => 'auth'
], function () {
    Route::get('', [HomeController::class, 'index'])->name('home');
    Route::resource('position', PlacePositionController::class);
    Route::resource('door-division', DoorDivisionController::class);
    Route::resource('fillings', FillingController::class);
    Route::resource('inventory-category', InventoryCategoryController::class);
    Route::resource('inventory', InventoryController::class);
});
