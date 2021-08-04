<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TypeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReplicatePageController;
use App\Http\Controllers\PageBlueprintController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\BaseBlockController;
use App\Http\Controllers\FrameworkController;
use App\Http\Controllers\WikiController;
use App\Http\Controllers\FileController;

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

Route::resource('companies', CompanyController::class);
Route::resource('companies.pages', PageController::class);
Route::resource('companies.pages.replicate', ReplicatePageController::class, ['only' => [
    'store'
]]);
Route::resource('companies.files', FileController::class);

Route::resource('companies.page-blueprints', PageBlueprintController::class);

Route::resource('types', TypeController::class);

Route::resource('categories', CategoryController::class);

Route::resource('frameworks', FrameworkController::class);

Route::resource('wikis', WikiController::class);

Route::resource('base-blocks', BaseBlockController::class);
Route::resource('blocks', BlockController::class);
