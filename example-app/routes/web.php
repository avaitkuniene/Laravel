<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use Inertia\Inertia;

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

// GET index            books/index
// GET show/{id}        books/show/1
// GET create           books/create
// POST store           books/store
// GET edit/{id}        books/edit/1
// PUT update/{id}      books/update/1
// DELETE destroy/{id}  books/destroy/1

Route::get('products/create', [ProductController::class, 'create']);


Route::get('books', [BookController::class, 'index']);
Route::get('books/create', [BookController::class, 'create']);
Route::get('books/edit/{id}', [BookController::class, 'edit'])
    ->name('books.edit')
    ->middleware( 'role');
Route::post('books/create', [BookController::class, 'create']);
Route::get('books/{id}', [BookController::class, 'show'])->whereNumber('id');
Route::delete('books/delete/{id}', [BookController::class, 'delete'])
    ->name('books.delete')
    ->middleware( 'role');
Route::post('books/create', [BookController::class, 'store']);

Route::get('authors', [AuthorController::class, 'index']);
Route::get('authors/edit/{id}', [AuthorController::class, 'edit'])
    ->name('authors.edit')
    ->middleware( 'role');
Route::get('authors/create', [AuthorController::class, 'create']);
Route::delete('authors/delete/{id}', [AuthorController::class, 'delete'])
    ->name('authors.delete')
    ->middleware( 'role');
Route::get('authors/{id}', [AuthorController::class, 'show']);
Route::post('authors/create', [AuthorController::class, 'store']);

Route::get('categories', [CategoryController::class, 'index'])->middleware('auth');
Route::any('categories/edit/{id}', [CategoryController::class, 'edit'])
    ->name('category.edit')
    ->middleware( 'role');
Route::get('categories/create', [CategoryController::class, 'create']);
Route::post('categories/create', [CategoryController::class, 'store']);
Route::delete('categories/delete/{id}', [CategoryController::class, 'delete'])
    ->name('category.delete')
    ->middleware( 'role');
Route::get('categories/{id}', [CategoryController::class, 'show']);

Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthController::class, 'show'])->name('login');
    Route::post('login', [AuthController::class, 'authenticate'])->name('authenticate');
    Route::get('register', [RegistrationController::class, 'show']);
    Route::post('register', [RegistrationController::class, 'store'])
        ->name('register');
});

Route::get('profile', [UserController::class, 'show'])
    ->middleware('auth')
    ->name('profile');
Route::get('home', [HomeController::class, 'index']);
Route::get('logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

Route::get('reset', [ResetPasswordController::class, 'show']);
Route::post('reset', [ResetPasswordController::class, 'store'])->name('reset');


//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});

//Route::get('/dashboard', function () {
//    return Inertia::render('Dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});
//
//require __DIR__.'/auth.php';



