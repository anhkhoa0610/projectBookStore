<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudPublisherController;

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

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');
