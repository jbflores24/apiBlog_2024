<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::middleware('auth:sanctum')->group( function(){
    Route::apiResource('/rol',RolController::class);
    Route::apiResource('/article',ArticleController::class);
    Route::apiResource('/comment', CommentController::class);
    Route::post('article/actualizar/{id}',[ArticleController::class,'actualizar']);
});
Route::apiResource('/user',UserController::class);

Route::post ('/login',[AuthController::class,'login']);

