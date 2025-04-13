<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudBookController;
use App\Http\Controllers\CrudPublisherController;


use App\Http\Controllers\CrudCategoriesController;
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
Route::get('dashboard', [CrudBookController::class, 'dashboard']);

Route::get('login', [CrudBookController::class, 'login'])->name('login');
Route::post('login', [CrudBookController::class, 'authUser'])->name('user.authUser');

Route::get('createBook', [CrudBookController::class, 'createBook'])->name('book.createBook');
Route::post('createBook', [CrudBookController::class, 'postBook'])->name('book.postBook');

Route::get('readBook', [CrudBookController::class, 'readBook'])->name('book.readBook');

Route::get('deleteBook', [CrudBookController::class, 'deleteBook'])->name('book.deleteBook');

Route::get('updateBook', [CrudBookController::class, 'updateBook'])->name('book.updateBook');
Route::post('updateBook', [CrudBookController::class, 'postUpdateBook'])->name('book.postUpdateBook');

Route::get('listBook', [CrudBookController::class, 'listBook'])->name('book.list');

Route::get('signout', [CrudBookController::class, 'signOut'])->name('signout');

Route::get('dashboard', [CrudPublisherController::class, 'dashboard']);

Route::get('login', [CrudPublisherController::class, 'login'])->name('login');
Route::post('login', [CrudPublisherController::class, 'authUser'])->name('user.authUser');

Route::get('createPublisher', [CrudPublisherController::class, 'createPublisher'])->name('publisher.createPublisher');
Route::post('createPublisher', [CrudPublisherController::class, 'postPublisher'])->name('publisher.postPublisher');

Route::get('readPublisher', [CrudPublisherController::class, 'readPublisher'])->name('publisher.readPublisher');

Route::get('deletePublisher', [CrudPublisherController::class, 'deletePublisher'])->name('publisher.deletePublisher');

Route::get('updatePublisher', [CrudPublisherController::class, 'updatePublisher'])->name('publisher.updatePublisher');
Route::post('updatePublisher', [CrudPublisherController::class, 'postUpdatePublisher'])->name('publisher.postUpdatePublisher');

Route::get('listPublisher', [CrudPublisherController::class, 'listPublisher'])->name('publisher.list');

Route::get('signout', [CrudPublisherController::class, 'signOut'])->name('signout');

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


Route::get('/', function () {
    return view('dashboard');
});

