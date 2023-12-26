<?php

use App\Enums\UserTypes;
use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\EditorController;
use App\Http\Controllers\Auth\UserAuthController;
use Illuminate\Support\Facades\Route;

Route::post('login', [UserAuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {

    ///Articles
Route::prefix('articles')->group(function () {
    Route::middleware([ 'CheckType:'.UserTypes::ADMIN->value])->
            get('', [ArticlesController::class, 'index']);


    Route::get('my_articles', [ArticlesController::class, 'getMyArticles']);
    Route::post('', [ArticlesController::class, 'store']);
    Route::put('/{article}', [ArticlesController::class, 'update']);
    Route::get('{article}', [ArticlesController::class, 'show']);
    Route::delete('{article}', [ArticlesController::class, 'destroy']);
});


///Editor
Route::middleware([ 'CheckType:'.UserTypes::ADMIN->value])->
    prefix('editors')->group(function () {
    Route::get('', [EditorController::class, 'index']);
    Route::post('', [EditorController::class, 'store']);
    Route::put('/{editor}', [EditorController::class, 'update']);
    Route::put('/permission/{editor}', [EditorController::class, 'updateRoleWithPermissions']);
    Route::get('/permission', [EditorController::class, 'getAllEditorPermission']);
    Route::get('{editor}', [EditorController::class, 'show']);
    Route::delete('{editor}', [EditorController::class, 'destroy']);
});
       
});
