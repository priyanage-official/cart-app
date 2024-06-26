<?php

use App\Http\Controllers\AdminController\CustomerVendorController;
use App\Http\Controllers\AdminController\DashboardController;
use App\Http\Controllers\AuthController\LoginController;
use App\Http\Controllers\AuthController\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [IndexController::class, 'index'])->name('homepage');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('register', [RegisterController::class, 'registerUser'])->name('register');
Route::post('login', [LoginController::class, 'loginUser'])->name('login');

//Product View
Route::get('product-details/{id}', [ProductController::class, 'index'])->name('product-details');

Route::group(['middleware' => ['auth', 'roleWiseLogin']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    //Customer View & List
    Route::get('customer-list', [CustomerVendorController::class, 'customerListView'])->name('customer-list');
    Route::get('customer-fetch', [CustomerVendorController::class, 'fetchCustomerList'])->name('customer-fetch');
    
    //Vendor View & List
    Route::get('vendor-list', [CustomerVendorController::class, 'vendorListView'])->name('vendor-list');
    Route::get('vendor-fetch', [CustomerVendorController::class, 'fetchVendorList'])->name('vendor-fetch');

    //Product View & List
    Route::get('product-list', [ProductController::class, 'productListView'])->name('product-list');
    Route::get('product-fetch', [ProductController::class, 'fetchProductList'])->name('product-fetch');

});

Route::group(['middleware' => ['auth']], function () {
    //Profile Page
    Route::get('profile-page', [ProfileController::class, 'index'])->name('profile-page');
    Route::post('save-profile', [ProfileController::class, 'updateUserProfile'])->name('save-profile');

    //Add And Remove Cart Item
    Route::post('add-to-cart', [CartController::class, 'AddProductInCart'])->name('add-to-cart');
    Route::post('remove-to-cart', [CartController::class, 'RemoveProductInCart'])->name('remove-to-cart');

    //Logout
    Route::post('logout', [LoginController::class, 'logoutUser'])->name('logout');
});
