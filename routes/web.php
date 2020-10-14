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

    Route::prefix('/suppliers')->group(function () {
        Route::get('/', 'UserController@all')->name('siteManager.suppliers.all');
        Route::get('/add', 'UserController@add')->name('siteManager.suppliers.add');
        Route::post('/store', 'UserController@store')->name('siteManager.suppliers.store');
        Route::get('/view/{id}', 'UserController@view')->name('siteManager.suppliers.view');
        Route::get('/edit/{id}', 'UserController@edit')->name('siteManager.suppliers.edit');
        Route::post('/update/{id}', 'UserController@update')->name('siteManager.suppliers.update');
        Route::get('/delete/{id}', 'UserController@delete')->name('siteManager.suppliers.delete');
    });

    Route::prefix('/sites')->group(function () {
        Route::get('/', 'SiteController@all')->name('siteManager.sites.all');
        Route::get('/add', 'SiteController@add')->name('siteManager.sites.add');
        Route::post('/store', 'SiteController@store')->name('siteManager.sites.store');
        Route::get('/edit/{id}', 'SiteController@edit')->name('siteManager.sites.edit');
        Route::post('/update/{id}', 'SiteController@update')->name('siteManager.sites.update');
        Route::get('/delete/{id}', 'SiteController@delete')->name('siteManager.sites.delete');
    });

    Route::prefix('/items')->group(function () {
        Route::get('/', 'ItemController@all')->name('siteManager.items.all');
        Route::get('/add', 'ItemController@add')->name('siteManager.items.add');
        Route::post('/store', 'ItemController@store')->name('siteManager.items.store');
        Route::get('/edit/{id}', 'ItemController@edit')->name('siteManager.items.edit');
        Route::post('/update/{id}', 'ItemController@update')->name('siteManager.items.update');
        Route::get('/delete/{id}', 'ItemController@delete')->name('siteManager.items.delete');
    });

    Route::prefix('/orders')->group(function () {
        Route::get('/', 'OrderController@all')->name('siteManager.orders.all');

        Route::get('/add', 'OrderController@add')->name('siteManager.orders.add');
        Route::get('/storeOrder', 'OrderController@storeOrder')->name('siteManager.orders.storeOrder');
        Route::get('/storeOrderDelivery', 'OrderController@storeOrderDelivery')->name('siteManager.orders.storeOrderDelivery');
        Route::get('/storeOrderItem', 'OrderController@storeOrderItem')->name('siteManager.orders.storeOrderItem');
        Route::get('/removeOrderItem', 'OrderController@removeOrderItem')->name('siteManager.orders.removeOrderItem');
        Route::post('/storeOrderFinal', 'OrderController@storeOrderFinal')->name('siteManager.orders.storeOrderFinal');

        Route::get('/edit/{id}', 'OrderController@edit')->name('siteManager.orders.edit');
        Route::get('/updateOrder', 'OrderController@updateOrder')->name('siteManager.orders.updateOrder');
        Route::get('/updateOrderDelivery', 'OrderController@updateOrderDelivery')->name('siteManager.orders.updateOrderDelivery');

        Route::get('/view/{id}', 'OrderController@view')->name('siteManager.orders.view');

        Route::prefix('/comments')->group(function () {
            Route::post('/store', 'OrderController@storeComments')->name('siteManager.comments.orders.store');
        });
    });

    Route::prefix('/darft/orders')->group(function () {
        Route::get('/', 'OrderController@draftAll')->name('siteManager.draft.orders.all');
    });
});

Route::prefix('/accounting')->namespace('App\Http\Controllers\AccountingStaffArea')->group(function () {

    Route::get('/', 'HomeController@index')->name('accounting.index');
});

Route::prefix('/seniorManagement')->namespace('App\Http\Controllers\SeniorManagementArea')->group(function () {

    Route::get('/', 'HomeController@index')->name('seniorManagement.index');
});

Route::prefix('/supplier')->namespace('App\Http\Controllers\SupplierArea')->group(function () {

    Route::get('/', 'HomeController@index')->name('supplier.index');

    Route::prefix('/items')->group(function () {
        Route::get('/', 'ItemController@all')->name('supplier.items.all');
        Route::get('/add', 'ItemController@add')->name('supplier.items.add');
        Route::post('/store', 'ItemController@store')->name('supplier.items.store');
        Route::get('/edit/{id}', 'ItemController@edit')->name('supplier.items.edit');
        Route::post('/update/{id}', 'ItemController@update')->name('supplier.items.update');
        Route::get('/delete/{id}', 'ItemController@delete')->name('supplier.items.delete');
    });
});
