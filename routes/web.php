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
Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/siteManager')->namespace('App\Http\Controllers\SiteManagerArea')->group(function () {

    Route::get('/', 'HomeController@index')->name('siteManager.index');
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
