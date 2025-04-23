<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskController2;

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
    Route::middleware('auth:sanctum')->post('/posts', [PostController::class, 'store']);

});
// Route::get('/gettasks', [TaskController::class, 'getIndex']);
Route::get('/updatetasks', [TaskController::class, 'update']);
Route::post('/tasks', [TaskController2::class, 'store']);
// Route::post('/tasks', [TaskController2::class, 'store']);



Route::get('/test', function () {
    return response()->json([
        'success' => true,
        'message' => 'API is working!',
        'data' => [
            'name' => 'Laravel API',
            'version' => '1.0'
        ]
    ]);
});
