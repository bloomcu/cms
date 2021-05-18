<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Layout;

use App\Http\Controllers\TypeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BlockController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
//

Route::put('/companies/{company}/pages-update-batch', [PageController::class, 'updateBatch']);

Route::resource('types', TypeController::class);
Route::resource('categories', CategoryController::class);
Route::resource('companies', CompanyController::class);
Route::resource('companies.pages', PageController::class);

Route::get('/layouts', function () {
    return Layout::all();
});

Route::get('/layouts/{id}', function ($id) {
    return Layout::find($id)
        ->load('blocks');
});

Route::resource('blocks', BlockController::class);
// Route::get('/blocks', function () {
//     return Block::all();
// });

Route::get('/blocks/{id}', function ($id) {
    return Block::find($id)
        ->load('contents');
});
