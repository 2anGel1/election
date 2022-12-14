<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CodeController;
use App\Http\Controllers\Api\CandidatController;
use App\Http\Controllers\Api\VoterController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/codes', CodeController::class);
Route::get('codes/exportcodes', [CodeController::class, 'exportCodes']);

Route::apiResource('/voters', VoterController::class);

Route::apiResource('/candidats', CandidatController::class);