<?php

use App\Http\Controllers\AdminDetailController;
use App\Http\Controllers\BookDetailController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SchoolDetailController;
use Illuminate\Notifications\Notification;
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
Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
   
    Route::get('/add-notification', function () {
        return view('admin.add-notification');
    });

    Route::post('/admin-signin', [AdminDetailController::class, 'Adminsignin'])->name('Admin-signin');
    Route::get('/admin-login', [AdminDetailController::class, 'showAdminLoginForm']);
    Route::get('/profile', [AdminDetailController::class, 'showAdminProfile']);
    Route::post('/storeAdminProfile', [AdminDetailController::class, 'storeAdminProfile'])->name('storeAdminProfile');
    Route::get('/admin-logout', [AdminDetailController::class, 'Adminlogout'])->name('admin-logout');
    
    Route::get('/Schoolview', [SchoolDetailController::class, 'viewSchool'])->name('ViewSchool');
    Route::get('/list-school', [SchoolDetailController::class, 'fetchschoolListforAdmin'])->name('School-list');
    Route::get('/view-schooldetail/{uuid}', [SchoolDetailController::class, 'viewSchoolDetails'])->name('schoolDetail');
    Route::post('/view-school', [SchoolDetailController::class, 'addschoolforAdmin'])->name('School');

    Route::get('/notification', [NotificationController::class, 'showNotificationsAdmin'])->name('show.admin.notifications');
    Route::get('/getNotifications',  [NotificationController::class, 'getNotifications']);
    Route::get('/notificationAdd', [NotificationController::class, 'viewNotification']);
    Route::post('/notificationAdd', [NotificationController::class, 'sendNotification'])->name('sendNotification');
    Route::post('/book-detail', [BookDetailController::class, 'addbookDetails'])->name('Book Detail');
    Route::get('/view-book', [BookDetailController::class, 'viewBook'])->name('ViewBook');
    Route::get('/list-book', [BookDetailController::class, 'listbookforadmin'])->name('Book-list');
    Route::post('/add-class', [ClassesController::class, 'addClassforadmin'])->name('addClass');
    
    Route::get('/class', [ClassesController::class, 'listClassforadmin'])->name('class');
    Route::get('/editSchool/{uuid}', [SchoolDetailController::class, 'editSchool'])->name('editSchool');
    Route::post('/updateSchool/{uuid}', [SchoolDetailController::class, 'updateSchool'])->name('updateSchool');
   Route::post('/addBookToSchool', [SchoolDetailController::class, 'addBookToSchool'])->name('addBookToSchool');
});