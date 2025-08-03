<?php

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

Route::get('/', [App\Http\Controllers\Website\HomeController::class, 'index'])->name('home');
	Route::get('/category', [App\Http\Controllers\Website\CategoryController::class, 'index'])->name('category');
	Route::get('/detail', [App\Http\Controllers\Website\DetailController::class, 'index'])->name('detail');

    Route::any('{any}', function ($any) {
        if (strpos($any, '/') === 0) {
            return response()->view('website::pages.not-found.index ');
        }
        return response()->view('website::pages.not-found.index ');
        abort(404, 'Page not found');
    })->where('any', '^(?!admin\/).*');