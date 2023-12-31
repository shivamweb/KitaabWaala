<?php

use App\Http\Controllers\BookDetailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SchoolDetailController;
use App\Http\Controllers\SchoolLoginController;
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

Route::group(['prefix' => 'school'], function () {
    Route::get('/dashboard', function () {
        return view('school.dashboard');
    });
    Route::get('/dashboard', function () {
        return view('school.dashboard');
    });

   


    Route::get('/purchase-book', function () {
        return view('school.purchase-book');
    });

    Route::get('/list-order', function () {
        return view('school.list-order');
    });
    Route::get('/profile', [SchoolDetailController::class, 'showProfile']);
    Route::post('/storeSchoolProfile', [SchoolDetailController::class, 'storeSchoolProfile'])->name('storeSchoolProfile');
    Route::post('/storeSchoolFaculityDetail', [SchoolDetailController::class, 'storeSchoolFaculityDetail'])->name('storeSchoolFaculityDetail');
    Route::post('/storeSchoolDocument', [SchoolDetailController::class, 'storeSchoolDocument'])->name('storeSchoolDocument');
    Route::get('/show-login', [SchoolDetailController::class, 'showSchoolLoginForm']);
    Route::post('/school-signin', [SchoolDetailController::class, 'Schoolsignin'])->name('School-Login');
    Route::post('/register', [SchoolDetailController::class, 'createSchool'])->name('School-register');
    Route::get('/place-neworder', [BookDetailController::class, 'fetchBookDetail'])->name('fetchBookDetail');
    Route::get('view-book-detail/{uuid}', [BookDetailController::class, 'viewBookDetails'])->name('BookDetail');
   Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('addToCart');
    Route::get('/get-cart-products', [CartController::class, 'getCartProducts'])->name('getCartProducts');
    Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::get('/order', [OrderController::class, 'orderListToSchool']);
    Route::get('/invoice/{orderId}', [OrderController::class, 'viewInvoiceToSchool']);

    Route::get('/fetchSchoolDetails', [SchoolDetailController::class, 'fetchSchoolDetails'])->name('fetchSchoolDetails');
    Route::post('/storeTransaction', [OrderController::class, 'storeTransaction'])->name('storeTransaction');

 
    Route::get('/add-inquiry', function () {
        return view('school.add-inquiry');
    });

    Route::get('/transactions', [OrderController::class, 'viewTransectionToSchool'])->name('viewTransection');
    Route::get('/purchasedBooksList', [BookDetailController::class, 'purchasedBooksList']);
    
    Route::get('/approved-bookList', [BookDetailController::class, 'fetchApprovedBookDetail']);

    
    Route::get('/showNotification', [NotificationController::class, 'showNotifications']);
    
    Route::get('/getNotifications',  [NotificationController::class, 'getNotifications']);
});
