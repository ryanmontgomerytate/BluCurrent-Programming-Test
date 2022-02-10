<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CivilizationController;
use App\Models\Civilizations;

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
Route::resource('programs', App\Http\Controllers\CivilizationController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/civilizations', [CivilizationController::class, 'getCivilizations']);

// Route::delete('/civilizations/{id}', function ($id) {
//     return new CivilizationController(civilizations::findOrFail($id));
// });

Route::delete('/civilizations/{id}',[CivilizationController::class, 'deleteCivilizations']);