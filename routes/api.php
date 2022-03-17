<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public: Posts
use Cms\Http\PublicApi\PublicPostController;

// Public: Globals
use Cms\Http\PublicApi\PublicGlobalsController;

// Auth
use Cms\Http\Auth\AuthController;

// Admin: Organizations
use Cms\Http\Organizations\OrganizationController;

// Admin: Properties
use Cms\Http\Properties\PropertyController;

// Admin: Posts
use Cms\Http\Posts\PostController;
use Cms\Http\Posts\PostSlugController;
use Cms\Http\Posts\PostPublishController;
use Cms\Http\Posts\PostReplicateController;

// Admin: Blocks
use Cms\Http\Blocks\BlockController;
use Cms\Http\Blocks\BlockReorderController;

// Admin: Files
use Cms\Http\Files\FileController;
use Cms\Http\Files\FileSignUploadController;

// Admin: Menus
use Cms\Http\Menus\MenuController;

// Admin: Globals
use Cms\Http\Globals\GlobalsController;

// Admin: Categories
use Cms\Http\Categories\CategoryController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where admin routes live. You must have an admin role to access.
|
*/

// TODO: Unwrap all resource controllers

// TODO: Use route groups with prefixes to clean these up
// E.g., Route::prefix('organizations/{organization}')->group(function () {});
// https://laravel.com/docs/8.x/routing#route-groups

// TODO: When a route model binding is not found (e.g., organization in property > posts)
// we need to return a helpful error, rather than a generic 404

// TODO: Move these organization endpoints to a "super" namespace
// only to be used by super admins.

Route::middleware('auth:sanctum')->group(function () {
    // Auth
    Route::prefix('{organization}/auth')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/me', [AuthController::class, 'me']);
    });

    // Admin: Organizations
    Route::get('organizations',                   [OrganizationController::class, 'index']);
    Route::post('organizations',                  [OrganizationController::class, 'store']);
    Route::get('organizations/{organization}',    [OrganizationController::class, 'show']);
    Route::put('organizations/{organization}',    [OrganizationController::class, 'update']);
    Route::delete('organizations/{organization}', [OrganizationController::class, 'destroy']);

    // Admin: Properties
    Route::prefix('{organization}')->group(function () {
        Route::get('/properties',               [PropertyController::class, 'index']);
        Route::post('/properties',              [PropertyController::class, 'store']);
        Route::get('/properties/{property}',    [PropertyController::class, 'show']);
        Route::put('/properties/{property}',    [PropertyController::class, 'update']);
        Route::delete('/properties/{property}', [PropertyController::class, 'destroy']);
    });

    // Admin: Posts
    Route::prefix('{organization}/{property}')->group(function () {
        Route::get('/posts',           [PostController::class, 'index']);
        Route::post('/posts',          [PostController::class, 'store']);
        Route::get('/posts/{post}',    [PostController::class, 'show']);
        Route::put('/posts/{post}',    [PostController::class, 'update']);
        Route::delete('/posts/{post}', [PostController::class, 'destroy']);
        
        // Posts Replicate
        // TODO: Rename this "duplicate" and use store method?
        Route::post('/posts/{post}/replicate', [PostReplicateController::class, 'replicate']);
        
        // Posts Publish
        Route::put('/posts/{post}/publish', [PostPublishController::class, 'publish']);
        Route::put('/posts/{post}/unpublish', [PostPublishController::class, 'unpublish']);
        
        // Posts Slug
        Route::get('/post/check-slug', [PostSlugController::class, 'check']);
    });

    // Admin: Blocks
    Route::prefix('{organization}/{property}')->group(function () {
        Route::get('/blocks',            [BlockController::class, 'index']);
        Route::post('/blocks',           [BlockController::class, 'store']);
        Route::get('/blocks/{block}',    [BlockController::class, 'show']);
        Route::put('/blocks/{block}',    [BlockController::class, 'update']);
        Route::delete('/blocks/{block}', [BlockController::class, 'destroy']);
        
        // Blocks - Reorder
        // TODO: This should be scoped to the post these blocks belong to.
        // It's not safe that I can pass any collection of blocks from different posts.
        Route::post('/blocks/reorder', [BlockReorderController::class, 'reorder']);
    });

    // Admin: Files
    Route::prefix('{organization}/{property}')->group(function () {
        Route::get('/files',           [FileController::class, 'index']);
        Route::post('/files',          [FileController::class, 'store']);
        
        // TODO: Finish up these actions in the FileController
        // Route::get('files/{file}',    [FileController::class, 'show']);
        // Route::put('files/{file}',    [FileController::class, 'update']);
        // Route::delete('files/{file}', [FileController::class, 'destroy']);
        
        // Files - Sign File
        Route::post('/file/sign', [FileSignUploadController::class, 'sign']);
    });

    // Admin: Menus
    Route::prefix('{organization}/{property}')->group(function () {
        Route::get('/menus',           [MenuController::class, 'index']);
        Route::post('/menus',          [MenuController::class, 'store']);
        Route::get('/menus/{menu}',    [MenuController::class, 'show']);
        Route::put('/menus/{menu}',    [MenuController::class, 'update']);
        Route::delete('/menus/{menu}', [MenuController::class, 'destroy']);
    });

    // Admin: Globals
    Route::prefix('{organization}/{property}')->group(function () {
        Route::get('/globals', [GlobalsController::class, 'show']);
    });

    // Admin: Categories
    Route::prefix('{organization}/{property}')->group(function () {
        Route::get('/categories',               [CategoryController::class, 'index']);
        Route::post('/categories',              [CategoryController::class, 'store']);
        Route::get('/categories/{category}',    [CategoryController::class, 'show']);
        Route::put('/categories/{category}',    [CategoryController::class, 'update']);
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);
    });
});

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
|
| Here is public routes live.
|
*/

// Public: Auth
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login',    [AuthController::class, 'login']);

// Public: Posts
Route::prefix('public/{property:id}')->group(function () {
    Route::get('/posts', [PublicPostController::class, 'show']);
});

// Public: Globals
Route::prefix('public/{property:id}')->group(function () {
    Route::get('/globals', [PublicGlobalsController::class, 'show']);
});
