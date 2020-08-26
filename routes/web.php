<?php

use Illuminate\Support\Facades\Route;



/*
Telas para ver o funcionamento sem dados
*/
Route::get('/sales', function () {
    return view('crud_sales');
});

Route::get('/', 'DashboardController@index')->name('dashboard');

Route::group(['prefix' => 'product'], function () {
    Route::get('/', 'ProductController@create')->name('product.create');
    Route::post('/', 'ProductController@store')->name('product.store');
    Route::get('/edit/{uuid}', 'ProductController@edit')->name('product.edit');
    Route::post('/update/{uuid}', 'ProductController@update')->name('product.update');
});
