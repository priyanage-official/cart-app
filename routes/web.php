<?php

use App\Http\Controllers\AdminController\DashboardController;
use App\Http\Controllers\AuthController\LoginController;
use App\Http\Controllers\AuthController\RegisterController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [IndexController::class,'index'])->name('homepage');

Route::get('login', [LoginController::class, 'index'])->name('login');

Route::post('register', [RegisterController::class, 'registerUser'])->name('register');
Route::post('login', [LoginController::class, 'loginUser'])->name('login');

Route::group(['middleware' => ['auth', 'roleWiseLogin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('logout', [LoginController::class, 'logoutUser'])->name('logout');
});

Route::group(['middleware' => ['auth']], function (){
    Route::get('profile-page', [ProfileController::class, 'index'])->name('profile-page');
    Route::post('save-profile', [ProfileController::class, 'updateUserProfile'])->name('save-profile');
});
