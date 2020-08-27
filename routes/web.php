<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'DashboardController@index')->name('dashboard');

Route::group(['prefix' => 'product'], function () {
    Route::get('/', 'ProductController@create')->name('product.create');
    Route::post('/', 'ProductController@store')->name('product.store');
    Route::get('/edit/{uuid}', 'ProductController@edit')->name('product.edit');
    Route::post('/update/{uuid}', 'ProductController@update')->name('product.update');
    Route::delete('/delete/{uuid}', 'ProductController@destroy')->name('product.delete');
});

Route::group(['prefix' => 'sale'], function () {
    Route::get('/', 'SaleController@create')->name('sale.create');
    Route::post('/', 'SaleController@store')->name('sale.store');
    Route::get('/edit/{uuid}', 'SaleController@edit')->name('sale.edit');
    Route::post('/update/{uuid}', 'SaleController@update')->name('sale.update');
    Route::delete('/delete/{uuid}', 'SaleController@destroy')->name('sale.delete');
});
