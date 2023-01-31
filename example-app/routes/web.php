<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\UserController;
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
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

//Route::get('/', function () {
//    return 'Laravel atejo cia';
//});

//Route::get('products', [ProductController::class, 'displayProduct']);

//Route::get('/', [HomeController::class, 'index']);
//
//Route::get('/sveikuciai/{name?}', function ($name = null) {
//    return view('sveikuciai', ['name' => $name]);
//});

//Route::redirect('/', 'hello', 301);
//
////user/2
//Route::get('user/{id}', function ($id) {
//    return 'User: '. $id;
//});
//
////user/2/comments/5
//Route::get('user/{id}/comments/{commentId}', function ($id, $commentId) {
//    return 'User: '. $id . ' - '. $commentId;
//});
//
//Route::get('product/{name?}', function ($name = 'Apple') {
//    return $name;
//});
//
//Route::get('book/{id}', function ($id) {
//    return $id;
//})->where('id', '[LT0-9]+');
////->where('id', '[0-9]+');
////->where('id', '[A-Za-z]+');
//
//Route::get('car/{id}', function ($id) {
//    return $id;
//})->whereNumber('id');
//
//Route::get('car/{id}/{name}', function ($id) {
//    return $id;
//})->whereNumber('id')->whereAlpha('name');

// GET index            books/index
// GET show/{id}        books/show/1
// GET create           books/create
// POST store           books/store
// GET edit/{id}        books/edit/1
// PUT update/{id}      books/update/1
// DELETE destroy/{id}  books/destroy/1

Route::get('books', [BookController::class, 'index']);
Route::get('books/{id}', [BookController::class, 'show'])->whereNumber('id');
Route::get('books/create', [BookController::class, 'create']);
Route::post('books/store', [BookController::class, 'store']);

//Route::get('categories', [CategoryController::class, 'index']);
//Route::any('categories/store', [CategoryController::class, 'store']);
////Route::post('categories/store', [CategoryController::class, 'store']);
//Route::get('categories/{id}', [CategoryController::class, 'show']);
//


//Route::resource('books', BookController::class);
//
//Route::resources([
//    'books' => BookController::class,
//    'users' => UserController::class,
//    'categories' => CategoryController::class
//]);

Route::get('items', [ItemsController::class, 'index']);
Route::get('items/{id}', [ItemsController::class, 'show']);

Route::get('categories', [BookCategoryController::class, 'index']);
Route::get('categories/{id}', [BookCategoryController::class, 'show']);

Route::get('authors', [AuthorController::class, 'index']);
Route::get('authors/{id}', [AuthorController::class, 'show']);

Route::get('blogs', [BlogController::class, 'index']);
Route::any('blogs/create', [BlogController::class, 'create']);
Route::get('blogs/edit', [BlogController::class, 'edit']);
Route::get('blogs/delete', [BlogController::class, 'delete']);
Route::get('blogs/{id}', [BlogController::class, 'show']);


Route::get('products/create', [ProductController::class, 'create']);
