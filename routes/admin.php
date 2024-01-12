<?php

use App\Http\Controllers\AdminDetailController;
use App\Http\Controllers\BookDetailController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SchoolDetailController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InquiryController;

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

    Route::post('/admin-signin', [AdminDetailController::class, 'Adminsignin'])->name('Admin-signin');
    Route::get('/admin-login', [AdminDetailController::class, 'showAdminLoginForm']);
    Route::get('/profile', [AdminDetailController::class, 'showAdminProfile']);
    Route::post('/storeAdminProfile', [AdminDetailController::class, 'storeAdminProfile'])->name('storeAdminProfile');
    Route::get('/admin-logout', [AdminDetailController::class, 'Adminlogout'])->name('admin-logout');
    Route::get('/Schoolview', [SchoolDetailController::class, 'viewSchool'])->name('ViewSchool');
    Route::get('/list-school', [SchoolDetailController::class, 'fetchschoolListforAdmin'])->name('School-list');
    Route::get('/view-schooldetail/{uuid}', [SchoolDetailController::class, 'viewSchoolDetails'])->name('schoolDetail');
    Route::post('/view-school', [SchoolDetailController::class, 'addschoolforAdmin'])->name('School');
    Route::delete('/delete-school/{uuid}', [SchoolDetailController::class, 'deleteSchool'])->name('Delete');

    Route::get('/notification', [NotificationController::class, 'showNotificationsAdmin']);
    Route::get('/notificationAddView', [NotificationController::class, 'viewNotification']);
    Route::post('/notificationAdd', [NotificationController::class, 'sendNotification'])->name('sendNotification');
    Route::post('/book-detail', [BookDetailController::class, 'addbookDetails'])->name('Book Detail');
    Route::get('/view-book', [BookDetailController::class, 'viewBook'])->name('ViewBook');
    Route::get('/list-book', [BookDetailController::class, 'listbookforadmin'])->name('Book-list');
    Route::post('/add-class', [ClassesController::class, 'addClassforadmin'])->name('addClass');
    Route::get('/delete-class/{id}', [ClassesController::class, 'deleteClass'])->name('deleteClass'); 
    Route::get('/class', [ClassesController::class, 'listClassforadmin'])->name('class');
    Route::get('/editSchool/{uuid}', [SchoolDetailController::class, 'editSchool'])->name('editSchool');
    Route::post('/updateSchool/{uuid}', [SchoolDetailController::class, 'updateSchool'])->name('updateSchool');
    Route::post('/addBookToSchool', [SchoolDetailController::class, 'addBookToSchool'])->name('addBookToSchool');
    Route::get('/order', [OrderController::class, 'orderListToAdmin']);
    Route::post('/removeBookFromSchool', [SchoolDetailController::class, 'removeBookFromSchool'])->name('removeBookFromSchool');
    Route::get('/isBookAssociatedWithSchool/{bookId}', [SchoolDetailController::class, 'isBookAssociatedWithSchool'])->name('isBookAssociatedWithSchool');
    Route::post('/update-status', [OrderController::class, 'updateStatus'])->name('update-status');
    Route::get('/invoiceToAdmin/{orderId}', [OrderController::class, 'viewInvoiceToAdmin']);

    Route::get('/transactions', [OrderController::class, 'viewTransectionToAdmin'])->name('viewTransectionToAdmin');
    Route::get('/showInquiry', [InquiryController::class, 'showInquiry']);
    
    Route::get('/getinquiry',  [InquiryController::class, 'getinquiry']);
    Route::get('/list-inquiry', [InquiryController::class, 'showInquiry']);
    Route::post('/Transaction', [OrderController::class, 'storeTransactionforadmin'])->name('Transaction');


});
