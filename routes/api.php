<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Categories\CategoryController;
use Organizations\OrganizationController;
use Pages\PageController;
use Pages\ReplicatePageController;
use Pages\PageBlueprintController;
use Layouts\LayoutController;
use Blocks\BlockController;
use Blocks\BaseBlockController;
use Frameworks\FrameworkController;
use Wikis\WikiController;
use Files\FileController;
use Cms\Http\Files\FileSignUploadController;

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

Route::resource('organizations.files', FileController::class, ['only' => ['index', 'store']]);
Route::post('organizations/{organization}/files/sign', [FileSignUploadController::class, 'sign']);

Route::resource('categories', CategoryController::class);

Route::resource('frameworks', FrameworkController::class);

Route::resource('wikis', WikiController::class);

Route::resource('base-blocks', BaseBlockController::class);
Route::resource('blocks', BlockController::class);
