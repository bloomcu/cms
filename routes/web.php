<?php

use App\Models\Post;
use App\Models\Layout;
use App\Models\Block;
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

Route::get('/posts', function () {
    return Post::all();
});

Route::get('/layouts', function () {
    return Layout::all();
});

Route::get('/blocks', function () {
    return Block::all();
});
