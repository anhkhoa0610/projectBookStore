<?php

use App\Http\Controllers\CrudCategoriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudUserController;

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

Route::get('dashboard', [CrudUserController::class, 'dashboard']);

Route::get('login', [CrudUserController::class, 'login'])->name('login');
// Route::post('login', [CrudUserController::class, 'authUser'])->name('user.authUser');

// Route::get('create', [CrudUserController::class, 'createUser'])->name('user.createUser');
// Route::post('create', [CrudUserController::class, 'postUser'])->name('user.postUser');

Route::get('create', [CrudCategoriesController::class, 'createCategory'])->name('categories.createCategory');
Route::post('create', [CrudCategoriesController::class, 'postCategory'])->name('categories.postCategory');

// Route::get('read', [CrudUserController::class, 'readUser'])->name('user.readUser');
Route::get('read', [CrudCategoriesController::class, 'readCategory'])->name('categories.readCategory');

// Route::get('delete', [CrudUserController::class, 'deleteUser'])->name('user.deleteUser');
Route::get('delete', [CrudCategoriesController::class, 'deleteCategory'])->name('categories.deleteCategory');

// Route::post('update', [CrudUserController::class, 'postUpdateUser'])->name('user.postUpdateUser');
// Route::get('update', [CrudUserController::class, 'updateUser'])->name('user.updateUser');

Route::get('update', [CrudCategoriesController::class, 'updateCategory'])->name('categories.updateCategory');
Route::post('update', [CrudCategoriesController::class, 'postUpdateCategory'])->name('categories.postUpdateCategory');

// Route::get('list', [CrudUserController::class, 'listUser'])->name('user.list');
Route::get('list', [CrudCategoriesController::class, 'listCategories'])->name('categories.list');

Route::get('signout', [CrudUserController::class, 'signOut'])->name('signout');

Route::get('/', function () {
    return view('welcome');
});
