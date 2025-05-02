<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudBookController;
use App\Http\Controllers\CrudPublisherController;
use App\Http\Controllers\CrudCategoriesController;
use App\Http\Controllers\CrudRepoController;
use App\Http\Controllers\CrudCouponController;
use App\Http\Controllers\CrudAuthorController;
use App\Http\Controllers\CrudOrdersController;
use App\Http\Controllers\CrudOrdersDetailsController;

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


// Route::get('create', [CrudRepoController::class, 'createUser'])->name('user.createUser');
// Route::post('create', [CrudRepoController::class, 'postUser'])->name('user.postUser');

Route::get('createCate', [CrudCategoriesController::class, 'createCategory'])->name('categories.createCategory');
Route::post('createCate', [CrudCategoriesController::class, 'postCategory'])->name('categories.postCategory');

// Route::get('read', [CrudRepoController::class, 'readUser'])->name('user.readUser');
Route::get('readCate', [CrudCategoriesController::class, 'readCategory'])->name('categories.readCategory');

// Route::get('delete', [CrudRepoController::class, 'deleteUser'])->name('user.deleteUser');
Route::get('deleteCate', [CrudCategoriesController::class, 'deleteCategory'])->name('categories.deleteCategory');

// Route::post('update', [CrudRepoController::class, 'postUpdateUser'])->name('user.postUpdateUser');
// Route::get('update', [CrudRepoController::class, 'updateUser'])->name('user.updateUser');

Route::get('updateCate', [CrudCategoriesController::class, 'updateCategory'])->name('categories.updateCategory');
Route::post('updateCate', [CrudCategoriesController::class, 'postUpdateCategory'])->name('categories.postUpdateCategory');

// Route::get('list', [CrudRepoController::class, 'listUser'])->name('user.list');
Route::get('listCate', [CrudCategoriesController::class, 'listCategories'])->name('categories.list');


Route::get('/', function () {
    return view('dashboard');
});



Route::get('login', [CrudRepoController::class, 'login'])->name('login');
Route::post('login', [CrudRepoController::class, 'authUser'])->name('user.authUser');

Route::get('createRepo', [CrudRepoController::class, 'createRepo'])->name('repo.createRepo');
Route::post('createRepo', [CrudRepoController::class, 'postRepo'])->name('repo.postRepo');

Route::get('readRepo', [CrudRepoController::class, 'readRepo'])->name('repo.readRepo');

Route::get('deleteRepo', [CrudRepoController::class, 'deleteRepo'])->name('repo.deleteRepo');

Route::get('updateRepo', [CrudRepoController::class, 'updateRepo'])->name('repo.updateRepo');
Route::post('updateRepo', [CrudRepoController::class, 'postUpdateRepo'])->name('repo.postUpdateRepo');

Route::get('listRepo', [CrudRepoController::class, 'listRepo'])->name('repo.list');


Route::get('/couponscreate', [CrudCouponController::class, 'createCoupon'])->name('coupon.create');
Route::post('/couponscreate', [CrudCouponController::class, 'postCoupon'])->name('coupon.store');

Route::get('/couponslist', [CrudCouponController::class, 'listCoupon'])->name('coupon.list');

Route::get('/coupons/{id}/edit', [CrudCouponController::class, 'editCoupon'])->name('coupon.edit');
Route::put('/coupons/{id}', [CrudCouponController::class, 'updateCoupon'])->name('coupon.update');

Route::delete('/coupons/{id}', [CrudCouponController::class, 'deleteCoupon'])->name('coupon.delete');

Route::get('/coupons/{id}', [CrudCouponController::class, 'readCoupon'])->name('coupon.read');

//Author Routes
Route::get('/authorslist', [CrudAuthorController::class, 'listAuthor'])->name('authors.list');
Route::get('/authorscreate', [CrudAuthorController::class, 'createAuthor'])->name('authors.create');
Route::post('/authors', [CrudAuthorController::class, 'postAuthor'])->name('authors.store');
Route::get('/authors/{id}/edit', [CrudAuthorController::class, 'editAuthor'])->name('authors.edit');
Route::put('/authors/{id}', [CrudAuthorController::class, 'updateAuthor'])->name('authors.update');
Route::delete('/authors/{id}', [CrudAuthorController::class, 'deleteAuthor'])->name('authors.delete');
Route::get('/authors/{id}', [CrudAuthorController::class, 'readAuthor'])->name('authors.read');

/// Routers for CRUD orders
///
Route::get('createOrder', [CrudOrdersController::class, 'createOrder'])->name('orders.createOrder');
Route::post('createOrder', [CrudOrdersController::class, 'postOrder'])->name('orders.postOrder');

Route::get('readOrder', [CrudOrdersController::class, 'readOrder'])->name('orders.readOrder');

Route::get('deleteOrder', [CrudOrdersController::class, 'deleteOrder'])->name('orders.deleteOrder');

Route::get('updateOrder', [CrudOrdersController::class, 'updateOrder'])->name('orders.updateOrder');
Route::post('updateOrder', [CrudOrdersController::class, 'postUpdateOrder'])->name('orders.postUpdateOrder');

Route::get('listOrder', [CrudOrdersController::class, 'listOrders'])->name('orders.list');

/// Routers for CRUD ordersDetails
///
Route::get('createOrderDetails', [CrudOrdersDetailsController::class, 'createOrderDetails'])->name('orders.createOrderDetails');

Route::post('createOrderDetails', [CrudOrdersDetailsController::class, 'postOrderDetails'])->name('orders.postOrderDetails');

Route::get('readOrderDetails', [CrudOrdersDetailsController::class, 'readOrderDetails'])->name('orders.readOrderDetails');

Route::get('deleteOrderDetails', [CrudOrdersDetailsController::class, 'deleteOrderDetails'])->name('orders.deleteOrderDetails');

Route::get('updateOrderDetails', [CrudOrdersDetailsController::class, 'updateOrderDetails'])->name('orders.updateOrderDetails');

Route::post('updateOrderDetails', [CrudOrdersDetailsController::class, 'postUpdateOrderDetails'])->name('orders.postUpdateOrderDetails');

Route::get('listOrderDetailsByOrderId', [CrudOrdersDetailsController::class, 'listOrderDetailsByOrderId'])->name('orders.listOrderDetailsByOrderId');
