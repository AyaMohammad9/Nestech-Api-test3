<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group([
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
});

Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'posts'
], function ($router) {
    Route::get('/', [PostController::class, 'index']);
    Route::post('/create',[PostController::class, 'store']);
    Route::put('/{id}/update', [PostController::class, 'update']);
    Route::delete('/{id}/delete',[PostController::class,'delete']);

    Route::post('/{id}/comment',[CommentController::class, 'store']);

});

Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'user'
], function ($router) {
    Route::get('/posts', [AuthController::class, 'userPosts']);
});
