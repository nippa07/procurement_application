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

Auth::routes();
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('index');

Route::prefix('/siteManager')->namespace('App\Http\Controllers\SiteManagerArea')->group(function () {

    Route::get('/', 'HomeController@index')->name('siteManager.index');

    Route::get('/users', 'UserController@all')->name('siteManager.users.all');
    Route::get('/users/add', 'UserController@add')->name('siteManager.users.add');
    Route::post('/users/store', 'UserController@store')->name('siteManager.users.store');
    Route::get('/users/view/{id}', 'UserController@view')->name('siteManager.users.view');
    Route::get('/users/edit/{id}', 'UserController@edit')->name('siteManager.users.edit');
    Route::post('/users/update/{id}', 'UserController@update')->name('siteManager.users.update');
    Route::get('/users/delete/{id}', 'UserController@delete')->name('siteManager.users.delete');
});

Route::prefix('/accounting')->namespace('App\Http\Controllers\AccountingStaffArea')->group(function () {

    Route::get('/', 'HomeController@index')->name('accounting.index');
});

Route::prefix('/seniorManagement')->namespace('App\Http\Controllers\SeniorManagementArea')->group(function () {

    Route::get('/', 'HomeController@index')->name('seniorManagement.index');
});

Route::prefix('/supplier')->namespace('App\Http\Controllers\SupplierArea')->group(function () {

    Route::get('/', 'HomeController@index')->name('supplier.index');
});
