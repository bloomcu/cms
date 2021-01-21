<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Layout;
use App\Models\Block;

use App\Http\Controllers\TypeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PageController;

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

Route::put('/companies/redwood/pages-update-batch', [PageController::class, 'updateBatch']);

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

Route::get('/blocks', function () {
    return Block::all();
});

Route::get('/blocks/{id}', function ($id) {
    return Block::find($id)
        ->load('contents');
});
