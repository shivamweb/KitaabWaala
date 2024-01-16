<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolDetailController;
use App\Http\Controllers\SchoolLoginController;
use App\Http\Controllers\AdminDetailController;
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

Route::get('/', function () {
    return view('home');
 
});
Route::get('/show-login', [SchoolDetailController::class, 'showSchoolLoginForm']);
    Route::post('/school-signin', [SchoolDetailController::class, 'Schoolsignin'])->name('School-Login');
    Route::post('/register', [SchoolDetailController::class, 'createSchool'])->name('School-register');
    Route::post('/admin-signin', [AdminDetailController::class, 'Adminsignin'])->name('Admin-signin');
 Route::get('admin-login', [AdminDetailController::class, 'showAdminLoginForm']);