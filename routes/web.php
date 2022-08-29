<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController\Userdashboardcontroller;
use App\Http\Controllers\AdminController\Admindashboardcontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('user')->middleware(['auth','IsUser'])->group(function(){
    
    Route::get('/dashboard', [Userdashboardcontroller::class, 'index']);
    Route::get('/checkbooks', [Userdashboardcontroller::class, 'checkbooks'])->name('checkbooks');
    Route::post('/requestbook', [Userdashboardcontroller::class, 'requestbook'])->name('requestbook');
    Route::post('/unrequestbook', [Userdashboardcontroller::class, 'unrequestbook'])->name('unrequestbook');
    Route::get('/viewbook/{id}', [Userdashboardcontroller::class, 'viewbook']);
    Route::get('/returned', [Userdashboardcontroller::class, 'returned'])->name('returned');
});
Route::prefix('admin')->middleware(['auth','IsAdmin'])->group(function(){
    // get requests
    Route::get('/dashboard', [Admindashboardcontroller::class, 'index'])->name('admindashboard');
    Route::get('/users', [Admindashboardcontroller::class, 'users'])->name('users');
    Route::get('/books', [Admindashboardcontroller::class, 'books'])->name('books');
    Route::get('/view/{id}', [Admindashboardcontroller::class, 'viewusers'])->name('viewuser');
    Route::get('/createbooks', [Admindashboardcontroller::class, 'createbooks'])->name('createbooks');
    Route::get('/viewbook/{id}', [Admindashboardcontroller::class, 'viewbook'])->name('viewbook');
    Route::get('/requestedbooks', [Admindashboardcontroller::class, 'requestedbooks'])->name('requestedbooks');
    Route::get('/viewrequests/{id}', [Admindashboardcontroller::class, 'viewrequests']);
    Route::get('/returnedbooks', [Admindashboardcontroller::class, 'returnedbooks'])->name('returnedbooks');
    // post requests
    Route::post('/createbook', [Admindashboardcontroller::class, 'createbook'])->name('createbook');
    Route::post('/return', [Admindashboardcontroller::class, 'returnbook'])->name('returnbook');
});
