<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TruyenController;

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
Route::get('/homs', function () {
    return view('homes');
});
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/admin', function () {
    return view('Admin.layout');
});
Route::get('admin/login', function () {
    return view('Admin.login');
});

// Route::get('/logins',[HomeController::class,'login'])->name('user.login');
// Route::get('/registers',[HomeController::class,'register'])->name('user.register');
Route::post('/comment',[UserController::class,'comment'])->name('user.comment');

Route::get('/detail-manga/{Ma_truyen}',[TruyenController::class,'detail_manga'])->name('detail_manga');
Route::get('/doc-truyen/{Ma_truyen}/{Ma_chap}',[TruyenController::class,'read_manga'])->name('detail_manga');

Route::prefix('user')->group(function(){
    Route::get('/profile',[UserController::class,'index'])->name('user.profile');
    // Route::get('/add-manga',[UserController::class,'add_manga'])->name('user.add_manga');
    Route::post('/save-manga',[UserController::class,'save_manga'])->name('user.save_manga');
    // Route::get('/add-chapter',[UserController::class,'add_chapter'])->name('user.add_chapter');
    Route::post('/save-chapter',[UserController::class,'save_chapter'])->name('user.save_chapter');
    Route::get('/profile',[UserController::class,'profile'])->name('user.profile');

});

Route::group(['prefix'=>'ajax'], function(){
    

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
        Route::get('/approval-manga',[AdminController::class,'approval_manga'])->name('admin.approval_manga');
        Route::get('/approval-change-manga/{ma}/{id}',[AdminController::class,'approval_change_manga'])->name('admin.approval_change_manga');
        Route::get('/approval-change-chapter/{ma}/{id}',[AdminController::class,'approval_change_chapter'])->name('admin.approval_change_chapter');
        Route::get('/delete-manga/{Ma_truyen}',[AdminController::class,'delete_manga'])->name('admin.delete_manga');

        Route::get('/dynamic-image/{path}', 'AdminController@getImage');
    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
