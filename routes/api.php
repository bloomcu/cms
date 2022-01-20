<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Organizations
use Cms\Http\Organizations\OrganizationController;

// Properties
use Cms\Http\Properties\PropertyController;

// Pages
use Cms\Http\Pages\PageController;
use Cms\Http\Pages\PageBlueprintController;
use Cms\Http\Pages\PageCheckSlugController;
use Cms\Http\Pages\PageReplicateController;

// Layouts
use Cms\Http\Layouts\LayoutController;
use Cms\Http\Layouts\LayoutDraftController;
use Cms\Http\Layouts\LayoutPublishController;

// Blocks
use Cms\Http\Blocks\BlockController;
use Cms\Http\Blocks\BlockReorderController;

// Files
use Cms\Http\Files\FileController;
use Cms\Http\Files\FileSignUploadController;

// Menus
use Cms\Http\Menus\MenuController;

// Globals
use Cms\Http\Globals\GlobalsController;

// Categories
use Cms\Http\Categories\CategoryController;

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

// TODO: Unwrap all resource controllers

// TODO: Use route groups with prefixes to clean these up
// E.g., Route::prefix('organizations/{organization}')->group(function () {});
// https://laravel.com/docs/8.x/routing#route-groups

// TODO: When a route model binding is not found (e.g., organization in property > pages)
// we need to return a helpful error, rather than a generic 404

// Organizations
Route::prefix('organizations')->group(function () {
    Route::get('',                  [OrganizationController::class, 'index']);
    Route::post('',                 [OrganizationController::class, 'store']);
    Route::get('{organization}',    [OrganizationController::class, 'show']);
    Route::put('{organization}',    [OrganizationController::class, 'update']);
    Route::delete('{organization}', [OrganizationController::class, 'destroy']);
});

// Properties
Route::prefix('organizations/{organization}')->group(function () {
    Route::get('properties',               [PropertyController::class, 'index']);
    Route::post('properties',              [PropertyController::class, 'store']);
    Route::get('properties/{property}',    [PropertyController::class, 'show']);
    Route::put('properties/{property}',    [PropertyController::class, 'update']);
    Route::delete('properties/{property}', [PropertyController::class, 'destroy']);
});

// Pages
Route::prefix('organizations/{organization}/properties/{property}')->group(function () {
    Route::get('pages',           [PageController::class, 'index']);
    Route::post('pages',          [PageController::class, 'store']);
    Route::get('pages/{page}',    [PageController::class, 'show']);
    Route::put('pages/{page}',    [PageController::class, 'update']);
    Route::delete('pages/{page}', [PageController::class, 'destroy']);
    
    // Pages - Blueprints Only
    Route::get('page/blueprints', [PageBlueprintController::class, 'index']);
    
    // Pages - Check Slug
    Route::get('page/check-slug', [PageCheckSlugController::class, 'show']);
    
    // Pages - Replicate
    // TODO: Rename this "duplicate" and use store method
    Route::post('pages/{page}/replicate', [PageReplicateController::class, 'replicate']);
});

// Layouts
Route::prefix('organizations/{organization}/properties/{property}')->group(function () {
    Route::get('layouts',             [LayoutController::class, 'index']);
    Route::post('layouts',            [LayoutController::class, 'store']);
    Route::get('layouts/{layout}',    [LayoutController::class, 'show']);
    Route::put('layouts/{layout}',    [LayoutController::class, 'update']);
    Route::delete('layouts/{layout}', [LayoutController::class, 'destroy']);
    
    // Layouts - Draft
    Route::post('layouts/{layout}/draft', [LayoutDraftController::class, 'store']);
    Route::get('layouts/{layout}/draft',  [LayoutDraftController::class, 'show']);

    // Layouts - Publish
    Route::post('layouts/{layout}/publish', [LayoutPublishController::class, 'store']);
});

// Blocks
Route::prefix('organizations/{organization}/properties/{property}')->group(function () {
    Route::get('blocks',            [BlockController::class, 'index']);
    Route::post('blocks',           [BlockController::class, 'store']);
    Route::get('blocks/{block}',    [BlockController::class, 'show']);
    Route::put('blocks/{block}',    [BlockController::class, 'update']);
    Route::delete('blocks/{block}', [BlockController::class, 'destroy']);
    
    // Blocks - Reorder
    // TODO: This should probably be scoped to the layout these blocks belong to.
    // It's not safe that I can pass any collection of blocks from different layouts.
    Route::post('blocks/reorder', [BlockReorderController::class, 'reorder']);
});

// Files
Route::prefix('organizations/{organization}/properties/{property}')->group(function () {
    Route::get('files',           [FileController::class, 'index']);
    Route::post('files',          [FileController::class, 'store']);
    
    // TODO: Finish up these actions in the FileController
    // Route::get('files/{file}',    [FileController::class, 'show']);
    // Route::put('files/{file}',    [FileController::class, 'update']);
    // Route::delete('files/{file}', [FileController::class, 'destroy']);
    
    // Files - Sign File
    Route::post('file/sign', [FileSignUploadController::class, 'sign']);
});

// Menus
Route::prefix('organizations/{organization}/properties/{property}')->group(function () {
    Route::get('menus',           [MenuController::class, 'index']);
    Route::post('menus',          [MenuController::class, 'store']);
    Route::get('menus/{menu}',    [MenuController::class, 'show']);
    Route::put('menus/{menu}',    [MenuController::class, 'update']);
    Route::delete('menus/{menu}', [MenuController::class, 'destroy']);
});

// Globals
Route::prefix('organizations/{organization}/properties/{property}')->group(function () {
    Route::get('globals', [GlobalsController::class, 'index']);
});

// Categories
// TODO: Rewrite categories to the same way menus are written
Route::prefix('categories')->group(function () {
    Route::get('/',           [CategoryController::class, 'index']);
    Route::post('/',          [CategoryController::class, 'store']);
    Route::get('/{category}', [CategoryController::class, 'show']);
    Route::put('/{category}', [CategoryController::class, 'update']);
    
    // TODO: Finish up the destroy action in the CategoryController
    // Route::delete('/{category}', [CategoryController::class, 'destroy']);
});
