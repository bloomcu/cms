<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Organizations\OrganizationController;

use Pages\PageController;
use Pages\ReplicatePageController;
use Pages\PageBlueprintController;

use Layouts\LayoutController;

use Blocks\BlockController;
use Cms\Http\Blocks\BlockReorderController;
// use Blocks\BlockIndexController;
// use Blocks\BlockStoreController;
// use Blocks\BlockShowController;
// use Blocks\BlockUpdateController;

use Blocks\BaseBlockController;

use Files\FileController;
use Cms\Http\Files\FileSignUploadController;

use Categories\CategoryController;

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

Route::resource('organizations', OrganizationController::class);
Route::resource('organizations.pages', PageController::class);
Route::resource('organizations.pages.replicate', ReplicatePageController::class, ['only' => ['store']]);
Route::resource('organizations.page-blueprints', PageBlueprintController::class);

Route::resource('organizations.layouts', LayoutController::class);

Route::apiResource('organizations.blocks', BlockController::class);
// Route::apiResource('organizations.blocks.reorder', BlockReorderController::class, ['only' => ['store']]);
Route::post('organizations/{organization}/blocks/reorder', [BlockReorderController::class, 'reorder']);


Route::resource('organizations.files', FileController::class, ['only' => ['index', 'store']]);
Route::post('organizations/{organization}/files/sign', [FileSignUploadController::class, 'sign']);

Route::resource('categories', CategoryController::class);

// TODO: Use apiResource on all routes
Route::apiResource('menus', MenuController::class);

// Route::resource('base-blocks', BaseBlockController::class);

// Route::get('/blocks', BlockIndexController::class);
// Route::post('/blocks', BlockStoreController::class);
// Route::get('/blocks/{block:uuid}', BlockShowController::class);
// Route::patch('/blocks/{block:uuid}', BlockUpdateController::class);
