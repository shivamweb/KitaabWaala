<?php

use App\Http\Controllers\BookDetailController;
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
    Route::get('/order', function () {
        return view('school.order');
    });
    Route::get('/dashboard', function () {
        return view('school.dashboard');
    });
    
    Route::get('/approved-bookList', function () {
        return view('school.approved-bookList');
    });

    Route::get('/my-purchase-list', function () {
        return view('school.my-purchase-list');
    });
    Route::get('/transactions', function () {
        return view('school.transactions');
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
    Route::get('/my-purchase-list', [BookDetailController::class, 'fetchBookDetail'])->name('fetchBookDetail');
    Route::get('view-book-detail/{uuid}', [BookDetailController::class, 'viewBookDetails'])->name('BookDetail');
    Route::get('/place-neworder', [BookDetailController::class, 'placeNewBookOrder'])->name('Place-New-Order');
});
