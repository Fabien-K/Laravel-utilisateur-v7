<?php

use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified', 'mustbeapproved');
Route::get('/mustbeapproved', 'HomeController@mustbeapproved')->name('mustBeApproved');

Route::get('/admin/users', 'AdminController@index')
    ->name('admin.index')
    ->middleware('auth','isAdmin');

Route::get('/error/not-an-admin', function(){
    return view('errors.not-an-admin');
})->name('errors.not-an-admin');

Route::get('/admin/approved/{id}', 'AdminController@approved')
    ->name('admin.approve')
    ->middleware(['auth', 'isAdmin']);