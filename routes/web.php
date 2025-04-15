<?php

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
Route::post('login', [CrudUserController::class, 'authUser'])->name('user.authUser');

Route::get('createRepo', [CrudUserController::class, 'createRepo'])->name('repo.createRepo');
Route::post('createRepo', [CrudUserController::class, 'postRepo'])->name('repo.postRepo');

Route::get('readRepo', [CrudUserController::class, 'readRepo'])->name('repo.readRepo');

Route::get('deleteRepo', [CrudUserController::class, 'deleteRepo'])->name('repo.deleteRepo');

Route::get('updateRepo', [CrudUserController::class, 'updateRepo'])->name('repo.updateRepo');
Route::post('updateRepo', [CrudUserController::class, 'postUpdateRepo'])->name('repo.postUpdateRepo');

Route::get('listRepo', [CrudUserController::class, 'listRepo'])->name('repo.list');

Route::get('signout', [CrudUserController::class, 'signOut'])->name('signout');

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');
