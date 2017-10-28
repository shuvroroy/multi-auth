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

// Homepage after login
Route::get('/home', 'HomeController@index')->name('employee.home');

// Employee profile
Route::get('/{user}/profile', 'HomeController@showProfile')->name('employee.show');
Route::get('/{user}/profile/edit', 'HomeController@editProfile')->name('employee.edit');
Route::post('/{user}/profile/update', 'HomeController@updateProfile')->name('employee.update');

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

    // Company profile
    Route::get('/{company}/profile', 'CompanyController@showProfile')->name('company.show');
    Route::get('/{company}/profile/edit', 'CompanyController@editProfile')->name('company.edit');
    Route::post('/{company}/profile/update', 'CompanyController@updateProfile')->name('company.update');
});

// For Admin Login
Route::prefix('/admin')->group(function () {
    // Login
    Route::get('/login', 'Auth\AdminAuthController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminAuthController@login')->name('admin.login.submit');

    // Homepage after login
    Route::get('/', 'AdminController@index')->name('admin.home');

    // Show all unapproved companies
    Route::get('/companies', 'AdminController@showCompanies')->name('admin.companies');

    // Approving and rejecting companies
    Route::post('/companies/{company}/approve', 'AdminController@approveCompany')->name('admin.companies.approve');
    Route::post('/companies/{company}/reject', 'AdminController@rejectCompany')->name('admin.companies.reject');

    // Show all unapproved employees
    Route::get('/employees', 'AdminController@showEmployees')->name('admin.employees');

    // Approving and rejecting employees
    Route::post('/employees/{employee}/approve', 'AdminController@approveEmployee')->name('admin.employees.approve');
    Route::post('/employees/{employee}/reject', 'AdminController@rejectEmployee')->name('admin.employees.reject');
});
