<?php

use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/', function () {
//     return response()->json('OK');
// });

// Route::post('settings', function (Request $request) {
//     $request->validate(['entry' => 'required|string|min:5']);

//     return response()->json('OK');
// });

Route::fallback(function () {
    abort(404, 'API resource not found');
});

Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);

Route::post('/posts', [PostController::class, 'store']);
Route::middleware('auth:sanctum')->get('/posts', [PostController::class, 'index']);
// Route::apiResource('posts', PostController::class)->middleware('auth:sanctum');
