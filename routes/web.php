<?php

use App\Models\Company;
use App\Models\Page;
use App\Models\Layout;
use App\Models\Block;

use App\Http\Controllers\CompanyController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('companies', CompanyController::class);
// Route::get('/companies/create', [CompanyController::class, 'store']);

// Route::get('/pages', function () {
//     return Page::all();
// });
//
// Route::get('/pages/{id}', function ($id) {
//
//     return Page::find($id)
//         ->load('layout')
//         ->load('layout.blocks')
//         ->load(['layout.blocks.contents' => function($query) use ($id) {
//             $query->where('page_id', $id);
//         }]);
//
//     // return Post::find($id)
//     //     ->with('layout')
//     //     ->with('layout.blocks')
//     //     ->with(['layout.blocks.contents' => function($query) use ($id) {
//     //         $query->where('post_id', $id);
//     //     }])
//     //     ->get();
// });
//
// Route::get('/layouts', function () {
//     return Layout::all();
// });
//
// Route::get('/layouts/{id}', function ($id) {
//     return Layout::find($id)
//         ->load('blocks');
// });
//
// Route::get('/blocks', function () {
//     return Block::all();
// });
//
// Route::get('/blocks/{id}', function ($id) {
//     return Block::find($id)
//         ->load('contents');
// });
