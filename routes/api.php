<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\BookApiController;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('v1/login', [PassportAuthController::class, 'login']);

Route::get('v1/books/list', [BookApiController::class, 'index'])->middleware(['auth:api']);

Route::get('v1/books/{id}', [BookApiController::class, 'show'])->middleware(['auth:api']);

Route::post('v1/books/update', [BookApiController::class, 'update'])->middleware(['auth:api']);

Route::delete('v1/books/{id}', [BookApiController::class, 'destroy'])->middleware(['auth:api']);
