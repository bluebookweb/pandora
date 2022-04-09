<?php

use App\Http\Controllers\Front\MainController;
use Illuminate\Support\Facades\Route;

Route::get('', [MainController::class, 'index']);

require_once 'admin.php';
