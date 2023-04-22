<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DocumentController;

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
Auth::routes(['verify' => true]);
Route::get('/', function () {
    return view('layout');
});

Route::get('/admin', function () {
    return view('Admin.layout');
});
Route::get('admin/login', function () {
    return view('Admin.login');
});

Route::prefix('admin')->group(function(){
    Route::get('/login',[AdminController::class,'index'])->name('admin.login');
    Route::post('/login',[AdminController::class,'account_verification'])->name('admin.account_verification');
    Route::get('/logout',[AdminController::class,'logout'])->name('admin.logout');
    Route::middleware(['admin'])->group(function(){
        Route::get('/',[AdminController::class,'dashboard'])->name('admin.dashboard');
        Route::get('/dashboard',[AdminController::class,'show_dashboard'])->name('admin.show_dashboard');
        Route::get('/add-manga',[AdminController::class,'add_manga'])->name('admin.add-manga');
        Route::get('/create',[DocumentController::class,'create_document'])->name('');
        Route::get('/the-loai',[AdminController::class,'list_the_loai'])->name('admin.the_loai');
        Route::get('/manga',[AdminController::class,'list_manga'])->name('admin.manga');
        Route::get('/them-the-loai',[AdminController::class,'create_the_loai'])->name('admin.create_the_loai');
        Route::post('/save-the-loai',[AdminController::class,'save_the_loai'])->name('admin.save_the_loai');
        Route::post('/save-manga',[AdminController::class,'save_manga'])->name('admin.save_manga');
        Route::get('/them-chapter',[AdminController::class,'create_chapter'])->name('admin.create_chapter');
        Route::post('/save-chapter',[AdminController::class,'save_chapter'])->name('admin.save_chapter');
        Route::get('/list-chapter/{Ma_truyen}',[AdminController::class,'list_chap_is_manga'])->name('admin.list_chap_is_manga');
        Route::get('/delete-chapter/{Ma_chap}',[AdminController::class,'delete_chapter'])->name('admin.delete_chapter');
        Route::get('/detail-chapter/{Ma_chap}',[AdminController::class,'detail_chapter'])->name('admin.detail_chapter');
        Route::get('/dynamic-image/{path}', 'AdminController@getImage');
    });
});