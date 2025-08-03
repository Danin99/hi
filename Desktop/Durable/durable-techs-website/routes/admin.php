<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::get('/admin', 'Backend\DashboardController@redirectAdmin')->name('index');


/**
 * Admin routes
 */

Route::prefix('admin')->group(function () {
   // Login Routes
   Route::get('/login', 'Backend\Auth\LoginController@showLoginForm')->name('admin.login');
   Route::post('/login/submit', 'Backend\Auth\LoginController@login')->name('admin.login.submit');

   // Logout Routes
   Route::post('/logout/submit', 'Backend\Auth\LoginController@logout')->name('admin.logout.submit');

   // Forget Password Routes
   Route::get('/password/reset', 'Backend\Auth\ForgetPasswordController@showLinkRequestForm')->name('admin.password.request');
   Route::post('/password/reset/submit', 'Backend\Auth\ForgetPasswordController@reset')->name('admin.password.update'); 
});

Route::middleware('AdminGuard')->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/dashboard', 'Backend\DashboardController@index')->name('admin.dashboard');
        Route::prefix('settings')->group(function () {
            Route::resource('roles', 'Backend\RolesController', ['names' => 'admin.roles']);

            Route::resource('admins', 'Backend\AdminsController', ['names' => 'admin.admins']);
            Route::post('/admins/hide-show', 'Backend\AdminsController@hideShow')->name('admin.admins.hide-show');

            Route::resource('categories', 'Backend\AdminsController', ['names' => 'admin.admins']);
            Route::post('/admins/hide-show', 'Backend\AdminsController@hideShow')->name('admin.admins.hide-show');

            Route::resource('users', 'Backend\UsersController', ['names' => 'admin.users']);
        });
    });
});
