<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/nosotros','PaginasController@nosotros')->name('nosotros');
Route::get('/productos','PaginasController@productos')->name('productos');

Route::resource('/servicios','ServiciosController');
Route::get('/images/{servicio_id}','ImageController@index')->name('images.index');
Route::post('/images','ImageController@store')->name('images.store');
Route::delete('/images/{id}','ImageController@destroy')->name('images.destroy');