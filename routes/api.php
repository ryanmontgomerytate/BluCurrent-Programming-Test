<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CivilizationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/civilizations', [CivilizationController::class, 'getCivilizations']);

Route::delete('/civilizations/{id}',[CivilizationController::class, 'deleteCivilizations']);

Route::put('/civilizations/{id}', 'App\Http\Controllers\CivilizationController@update');