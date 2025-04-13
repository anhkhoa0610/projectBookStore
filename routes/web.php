<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudBookController;

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

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');
