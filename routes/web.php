<?php

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

// For Employee Login and Registration
Auth::routes();
Route::get('/home', 'HomeController@index')->name('employee.home');

// For Admin Login
Route::prefix('/admin')->group(function () {
    // Login
    Route::get('/login', 'Auth\AdminAuthController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminAuthController@login')->name('admin.login.submit');

    // Homepage after login
    Route::get('/', 'AdminController@index')->name('admin.home');
});

// For Company Login and Registration
Route::prefix('/company')->group(function () {
    // Login
    Route::get('/login', 'Auth\CompanyAuthController@showLoginForm')->name('company.login');
    Route::post('/login', 'Auth\CompanyAuthController@login')->name('company.login.submit');

    // Registration
    Route::get('/register', 'Auth\CompanyAuthController@showRegisterForm')->name('company.register');
    Route::post('/register', 'Auth\CompanyAuthController@register')->name('company.register.submit');

    // Homepage after login
    Route::get('/', 'CompanyController@index')->name('company.home');
});
