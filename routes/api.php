<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TypeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReplicatePageController;
use App\Http\Controllers\PageBlueprintController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\BaseBlockController;
use App\Http\Controllers\FrameworkController;
use App\Http\Controllers\WikiController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FileSignUploadController;

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
Route::resource('organizations.pages.replicate', ReplicatePageController::class, ['only' => [
    'store'
]]);
Route::resource('organizations.page-blueprints', PageBlueprintController::class);

Route::resource('organizations.files', FileController::class);
Route::post('organizations/{organization}/files/sign', [FileSignUploadController::class, 'sign']);

Route::resource('types', TypeController::class);

Route::resource('categories', CategoryController::class);

Route::resource('frameworks', FrameworkController::class);

Route::resource('wikis', WikiController::class);

Route::resource('base-blocks', BaseBlockController::class);
Route::resource('blocks', BlockController::class);
