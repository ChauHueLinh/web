<?php

use Illuminate\Support\Facades\Route;

session_start();

Route::get('/', action: [\App\Http\Controllers\HomePageController::class, 'show_product'])->name(name: 'show_prosuct'); 

Route::get('/search', action: [\App\Http\Controllers\HomePageController::class, 'show_query_search'])->name(name: 'show_query_search');

Route::get('/signin', action: [\App\Http\Controllers\UserController::class, 'signin'])->name(name: 'signin');

Route::get('/signup', action: [\App\Http\Controllers\UserController::class, 'signup'])->name(name: 'signup');

Route::post('add_account', action: [\App\Http\Controllers\UserController::class, 'add_account'])->name(name: 'add_account');

Route::post('login', action: [\App\Http\Controllers\UserController::class, 'login'])->name(name: 'login');

Route::get('/logout', action: [\App\Http\Controllers\UserController::class, 'logout'])->name(name: 'logout');

Route::get('/admin', action: [\App\Http\Controllers\AdminController::class, 'index'])->name(name: 'admin');

Route::get('/admin/accounts', action: [\App\Http\Controllers\AdminController::class, 'accounts'])->name(name: 'admin/accounts');

Route::get('/admin/edit_account', action: [\App\Http\Controllers\AdminController::class, 'edit_account'])->name(name: 'admin/edit_account');

Route::get('/admin/delete_account', action: [\App\Http\Controllers\AdminController::class, 'delete_account'])->name(name: 'admin/delete_account');

Route::post('/admin/edit_account', action: [\App\Http\Controllers\AdminController::class, 'update_account'])->name(name: 'admin/update_account');

Route::get('/admin/search_account', action: [\App\Http\Controllers\AdminController::class, 'show_query_accounts_search'])->name(name: 'show_query_accounts_search');

Route::get('/admin/products', action: [\App\Http\Controllers\AdminController::class, 'products'])->name(name: 'admin/products');

Route::get('/admin/search_product', action: [\App\Http\Controllers\AdminController::class, 'show_query_products_search'])->name(name: 'show_query_products_search');

Route::get('/admin/edit_product', action: [\App\Http\Controllers\AdminController::class, 'edit_product'])->name(name: 'admin/edit_product');

Route::post('/admin/edit_product', action: [\App\Http\Controllers\AdminController::class, 'update_product'])->name(name: 'admin/update_product');

Route::get('/admin/delete_product', action: [\App\Http\Controllers\AdminController::class, 'delete_product'])->name(name: 'admin/delete_product');

Route::get('/admin/addPhoto_product', action: [\App\Http\Controllers\AdminController::class, 'addPhoto_product'])->name(name: 'admin/addPhoto_product');

Route::get('/admin/add_product', action: [\App\Http\Controllers\AdminController::class, 'add_product'])->name(name: 'admin/add_product');

Route::post('/admin/add_product', action: [\App\Http\Controllers\AdminController::class, 'add_product_process'])->name(name: 'admin/add_product_process');

Route::post('/admin/add_photo_process', action: [\App\Http\Controllers\AdminController::class, 'add_photo_process'])->name(name: 'admin/add_photo_process');

Route::get('/test', action: [\App\Http\Controllers\TestController::class, 'index'])->name(name: 'test');

