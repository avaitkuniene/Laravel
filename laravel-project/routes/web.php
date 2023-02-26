<?php

use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('home', [HomeController::class, 'index']);
Route::get('recipes', [RecipeController::class, 'index']);
Route::get('recipes/{id}', [RecipeController::class, 'show'])->whereNumber('id');

Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthorizationController::class, 'show'])
        ->name('login');
    Route::post('login', [AuthorizationController::class, 'authenticate'])
        ->name('authenticate');
    Route::get('register', [RegistrationController::class, 'show']);
    Route::post('register', [RegistrationController::class, 'store'])
        ->name('register');
});

Route::middleware(['auth'])->group(function () {
    Route::get('ingredients', [IngredientController::class, 'index']);
    Route::get('ingredients/{id}', [IngredientController::class, 'show'])->whereNumber('id');
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('categories/{id}', [CategoryController::class, 'show'])->whereNumber('id');
    Route::get('logout', [AuthorizationController::class, 'logout'])
        ->name('logout');
    Route::get('change', [ChangePasswordController::class, 'show']);
    Route::post('change', [ChangePasswordController::class, 'store'])
        ->name('change');
    Route::get('profile', [UserController::class, 'index']);
});

Route::middleware(['role'])->group(function () {
    Route::get('recipes/create', [RecipeController::class, 'create']);
    Route::post('recipes/create', [RecipeController::class, 'store']);
    Route::get('recipes/edit/{id}', [RecipeController::class, 'edit'])
        ->name('recipes.edit');
    Route::post('recipes/edit/{id}', [RecipeController::class, 'edit']);
    Route::delete('recipes/delete/{id}', [RecipeController::class, 'delete'])
        ->name('recipes.delete');
    Route::get('ingredients/create', [IngredientController::class, 'create']);
    Route::post('ingredients/create', [IngredientController::class, 'store']);
    Route::get('ingredients/edit/{id}', [IngredientController::class, 'editView'])
        ->name('ingredients.edit');
    Route::post('ingredients/edit/{id}', [IngredientController::class, 'edit']);
    Route::delete('ingredients/delete/{id}', [IngredientController::class, 'delete'])
        ->name('ingredients.delete');
    Route::get('categories/create', [CategoryController::class, 'create']);
    Route::post('categories/create', [CategoryController::class, 'store']);
    Route::get('categories/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('categories/edit/{id}', [CategoryController::class, 'edit'])
        ->name('categories.edit');
    Route::delete('categories/delete/{id}', [CategoryController::class, 'delete'])
        ->name('categories.delete');
});




