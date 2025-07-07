<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeceasedController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| These routes are loaded by the RouteServiceProvider within a group
| which is assigned the "api" middleware group. Enjoy building your API!
|
*/

// 🔍 Search route
Route::get('/search', [DeceasedController::class, 'search']);

// 📍 Get burial plot by lot number
Route::get('/plot/{lot_number}', [DeceasedController::class, 'getPlot']);
