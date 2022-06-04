<?php

use App\Http\Controllers\ArticleController;
use App\Models\Article;
use GuzzleHttp\Psr7\Request;
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

Route::prefix('posts')->group(function(){
    Route::get('/', [ArticleController::class, 'getArticles']);
    Route::get('/{id}', [ArticleController::class, 'getArticle']);
});

// Route::get('test/', function () {
//     return (new ArticleController)->getAll();
// });
// Route::get('posts/', [
//     ArticleController::class, 
//     'getAll'
// ]);