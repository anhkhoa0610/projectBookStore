<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudUserController;
use App\Http\Controllers\CrudCouponController;

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

Route::get('create', [CrudUserController::class, 'createUser'])->name('user.createUser');
Route::post('create', [CrudUserController::class, 'postUser'])->name('user.postUser');

Route::get('read', [CrudUserController::class, 'readUser'])->name('user.readUser');

Route::get('delete', [CrudUserController::class, 'deleteUser'])->name('user.deleteUser');

Route::get('update', [CrudUserController::class, 'updateUser'])->name('user.updateUser');
Route::post('update', [CrudUserController::class, 'postUpdateUser'])->name('user.postUpdateUser');

Route::get('list', [CrudUserController::class, 'listUser'])->name('user.list');

Route::get('signout', [CrudUserController::class, 'signOut'])->name('signout');

Route::get('/couponscreate', [CrudCouponController::class, 'createCoupon'])->name('coupon.create');
Route::post('/couponscreate', [CrudCouponController::class, 'postCoupon'])->name('coupon.store');

Route::get('/couponslist', [CrudCouponController::class, 'listCoupon'])->name('coupon.list');

Route::get('/coupons/{id}/edit', [CrudCouponController::class, 'editCoupon'])->name('coupon.edit');
Route::put('/coupons/{id}', [CrudCouponController::class, 'updateCoupon'])->name('coupon.update');

Route::delete('/coupons/{id}', [CrudCouponController::class, 'deleteCoupon'])->name('coupon.delete');

Route::get('/coupons/{id}', [CrudCouponController::class, 'readCoupon'])->name('coupon.read');

Route::get('/', function () {
    return view('dashboard');
});

