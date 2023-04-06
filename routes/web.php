<?php

use Illuminate\Support\Facades\Route;
session_start();
Route::get('/test', action: [\App\Http\Controllers\ClientController::class, 'test']);
// start Client
Route::get('/', action: [\App\Http\Controllers\ClientController::class, 'girls'])->name('girls');
Route::get('/view_girl', action: [\App\Http\Controllers\ClientController::class, 'view_girl'])->name('view_girl');
Route::get('/bill', action: [\App\Http\Controllers\CartController::class, 'bill'])->name('bill');

// start Account
Route::get('/cookie', action: [\App\Http\Controllers\AccountController::class, 'cookie'])->name('cookie');
Route::get('/signup', action: [\App\Http\Controllers\AccountController::class, 'signup'])->name('signup');
Route::post('/signup_process', action: [\App\Http\Controllers\AccountController::class, 'signup_process'])->name('signup_process');
Route::get('/signin', action: [\App\Http\Controllers\AccountController::class, 'signin'])->name('signin');
Route::post('/signin_process', action: [\App\Http\Controllers\AccountController::class, 'signin_process'])->name('signin_process');
Route::get('/signout', action: [\App\Http\Controllers\AccountController::class, 'signout'])->name('signout');
Route::get('/account', action: [\App\Http\Controllers\AccountController::class, 'account'])->name('account');
Route::get('/edit_account', action: [\App\Http\Controllers\AccountController::class, 'edit_account'])->name('edit_account');
Route::post('/edit_account', action: [\App\Http\Controllers\AccountController::class, 'edit_account_process'])->name('edit_account_process');
Route::get('/change_password', action: [\App\Http\Controllers\AccountController::class, 'change_password'])->name('change_password');
Route::post('/change_password', action: [\App\Http\Controllers\AccountController::class, 'change_password_process'])->name('change_password_process');

// start photo
Route::get('/photo', action: [\App\Http\Controllers\PhotoController::class, 'photo'])->name('photo');
Route::get('/add_photo', action: [\App\Http\Controllers\PhotoController::class, 'add_photo'])->name('add_photo');
Route::post('/add_photo', action: [\App\Http\Controllers\PhotoController::class, 'add_photo_process'])->name('add_photo_process');
Route::get('/delete_photo', action: [\App\Http\Controllers\PhotoController::class, 'delete_photo'])->name('delete_photo');

// start Admin
Route::get('/admin', action: [\App\Http\Controllers\AdminController::class, 'index'])->name('admin');

Route::get('/girl', action: [\App\Http\Controllers\AdminController::class, 'girl'])->name('girl');
Route::get('/add_girl', action: [\App\Http\Controllers\AdminController::class, 'add_girl'])->name('add_girl');
Route::post('/add_girl', action: [\App\Http\Controllers\AdminController::class, 'add_girl_process'])->name('add_girl_process');
Route::get('/delete_girl', action: [\App\Http\Controllers\AdminController::class, 'delete_girl'])->name('delete_girl');
Route::get('/edit_girl', action: [\App\Http\Controllers\AdminController::class, 'edit_girl'])->name('edit_girl');
Route::post('/edit_girl', action: [\App\Http\Controllers\AdminController::class, 'edit_girl_process'])->name('edit_girl_process');

Route::get('/origin', action: [\App\Http\Controllers\AdminController::class, 'origin'])->name('origin');
Route::get('/add_origin', action: [\App\Http\Controllers\AdminController::class, 'add_origin'])->name('add_origin');
Route::post('/add_origin', action: [\App\Http\Controllers\AdminController::class, 'add_origin_process'])->name('add_origin_process');
Route::get('/delete_origin', action: [\App\Http\Controllers\AdminController::class, 'delete_origin'])->name('delete_origin');
Route::get('/edit_origin', action: [\App\Http\Controllers\AdminController::class, 'edit_origin'])->name('edit_origin');
Route::post('/edit_origin', action: [\App\Http\Controllers\AdminController::class, 'edit_origin_process'])->name('edit_origin_process');

Route::get('/level', action: [\App\Http\Controllers\AdminController::class, 'level'])->name('level');
Route::get('/add_level', action: [\App\Http\Controllers\AdminController::class, 'add_level'])->name('add_level');
Route::post('/add_level', action: [\App\Http\Controllers\AdminController::class, 'add_level_process'])->name('add_level_process');
Route::get('/edit_level', action: [\App\Http\Controllers\AdminController::class, 'edit_level'])->name('edit_level');
Route::post('/edit_level', action: [\App\Http\Controllers\AdminController::class, 'edit_level_process'])->name('edit_level_process');

Route::get('/bills', action: [\App\Http\Controllers\AdminController::class, 'bills'])->name('bills');
// start cart
Route::get('/add_to_cart', action: [\App\Http\Controllers\CartController::class, 'add_to_cart'])->name('add_to_cart');
Route::get('/remove_from_cart', action: [\App\Http\Controllers\CartController::class, 'remove_from_cart'])->name('remove_from_cart');
Route::get('/cart', action: [\App\Http\Controllers\CartController::class, 'cart'])->name('cart');
Route::post('/cart', action: [\App\Http\Controllers\CartController::class, 'cart_process'])->name('cart_process');
?>