<?php

use Cms\Domain\Table\TableGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Organizations
use Cms\Http\Organizations\OrganizationController;

// Properties
use Cms\Http\Properties\PropertyController;

// Posts
use Cms\Http\Posts\PostController;
use Cms\Http\Posts\PostBlueprintController;
use Cms\Http\Posts\PostCheckSlugController;
use Cms\Http\Posts\PostReplicateController;

// Pages
use Cms\Http\Pages\PageController;

// Articles
use Cms\Http\Articles\ArticleController;

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

// Tables
use Cms\Http\Tables\TableController;
use Cms\Http\Tables\TableGroupsController;
use Cms\Http\Tables\TableGroupTablesController;

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

// TODO: When a route model binding is not found (e.g., organization in property > posts)
// we need to return a helpful error, rather than a generic 404

// TODO: Move these organization endpoints to a "super" namespace
// only to be used by super admins.

// Organizations
Route::get('organizations',                   [OrganizationController::class, 'index']);
Route::post('organizations',                  [OrganizationController::class, 'store']);
Route::get('organizations/{organization}',    [OrganizationController::class, 'show']);
Route::put('organizations/{organization}',    [OrganizationController::class, 'update']);
Route::delete('organizations/{organization}', [OrganizationController::class, 'destroy']);

// Properties
Route::prefix('{organization}')->group(function () {
    Route::get('properties',               [PropertyController::class, 'index']);
    Route::post('properties',              [PropertyController::class, 'store']);
    Route::get('properties/{property}',    [PropertyController::class, 'show']);
    Route::put('properties/{property}',    [PropertyController::class, 'update']);
    Route::delete('properties/{property}', [PropertyController::class, 'destroy']);
});

// Posts
Route::prefix('{organization}/{property}')->group(function () {
    Route::get('posts',           [PostController::class, 'index']);
    Route::post('posts',          [PostController::class, 'store']);
    Route::get('posts/{post}',    [PostController::class, 'show']);
    Route::put('posts/{post}',    [PostController::class, 'update']);
    Route::delete('posts/{post}', [PostController::class, 'destroy']);
    
    // Posts - Replicate
    // TODO: Rename this "duplicate" and use store method
    Route::post('posts/{post}/replicate', [PostReplicateController::class, 'replicate']);
    
    // Posts - Blueprints Only
    Route::get('post/blueprints', [PostBlueprintController::class, 'index']);
    
    // Posts - Check Slug
    Route::get('post/check-slug', [PostCheckSlugController::class, 'show']);
});

// Pages
Route::prefix('{organization}/{property}')->group(function () {
    Route::get('pages', [PageController::class, 'index']);
});

// Articles
Route::prefix('{organization}/{property}')->group(function () {
    Route::get('articles', [ArticleController::class, 'index']);
});

// Layouts
Route::prefix('{organization}/{property}')->group(function () {
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
Route::prefix('{organization}/{property}')->group(function () {
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
Route::prefix('{organization}/{property}')->group(function () {
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
Route::prefix('{organization}/{property}')->group(function () {
    Route::get('menus',           [MenuController::class, 'index']);
    Route::post('menus',          [MenuController::class, 'store']);
    Route::get('menus/{menu}',    [MenuController::class, 'show']);
    Route::put('menus/{menu}',    [MenuController::class, 'update']);
    Route::delete('menus/{menu}', [MenuController::class, 'destroy']);
});

// Globals
Route::prefix('{organization}/{property}')->group(function () {
    Route::get('globals', [GlobalsController::class, 'index']);
});

// Categories
Route::prefix('{organization}/{property}')->group(function () {
    Route::get('categories',               [CategoryController::class, 'index']);
    Route::post('categories',              [CategoryController::class, 'store']);
    Route::get('categories/{category}',    [CategoryController::class, 'show']);
    Route::put('categories/{category}',    [CategoryController::class, 'update']);
    Route::delete('categories/{category}', [CategoryController::class, 'destroy']);
});

Route::get('tables', [TableController::class, 'index']);
Route::post('tables', [TableController::class, 'store']);
Route::get('tables/{table}', [TableController::class, 'show']);
Route::put('tables/{table}',    [TableController::class, 'update']);
Route::delete('tables/{table}', [TableController::class, 'destroy']);

Route::get('table-groups', [TableGroupsController::class, 'index']);
Route::post('table-groups', [TableGroupsController::class, 'store']);
Route::get('table-groups/{table_group}', [TableGroupsController::class, 'show']);
Route::put('table-groups/{table_group}', [TableGroupsController::class, 'update']);
Route::delete('table-groups/{table_group}', [TableGroupsController::class, 'destroy']);

Route::get('table-group-tables/{table_group}', [TableGroupTablesController::class, 'index']);
Route::post('table-group-tables/{table_group}/{table}', [TableGroupTablesController::class, 'store']);

Route::delete('table-group-tables/{table_group}/{table}', [TableGroupTablesController::class, 'destroy']);