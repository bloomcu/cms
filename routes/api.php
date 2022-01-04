<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Organizations
use Organizations\OrganizationController;

// Pages
use Pages\PageController;
use Cms\Http\Pages\PageBlueprintController;
use Cms\Http\Pages\PageReplicateController;

// Layouts
use Layouts\LayoutController;

// Blocks
use Blocks\BlockController;
use Cms\Http\Blocks\BlockReorderController;

// Files
use Files\FileController;
use Cms\Http\Files\FileSignUploadController;

// Categories
use Categories\CategoryController;

// Menus
use Menus\MenuController;

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

// Organizations
Route::apiResource('organizations', OrganizationController::class);

// Pages
Route::apiResource('organizations.pages', PageController::class);
Route::get('organizations/{organization}/page-blueprints', [PageBlueprintController::class, 'index']);
Route::post('organizations/{organization}/pages/{page}/replicate', [PageReplicateController::class, 'replicate']);

// Layouts
Route::apiResource('organizations.layouts', LayoutController::class);

// Blocks
Route::apiResource('organizations.blocks', BlockController::class);
Route::post('organizations/{organization}/blocks/reorder', [BlockReorderController::class, 'reorder']);

// Files
Route::apiResource('organizations.files', FileController::class, ['only' => ['index', 'store']]);
Route::post('organizations/{organization}/files/sign', [FileSignUploadController::class, 'sign']);

// Categories
Route::apiResource('categories', CategoryController::class);

// Menus
Route::apiResource('menus', MenuController::class);
