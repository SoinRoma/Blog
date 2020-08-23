<?php

use Illuminate\Support\Facades\Route;

Route::get('/','BlogController@index');
//Route::resource('/blog','BlogController');

Route::get('blog/', 'BlogController@index')->name('blog.index');
Route::get('blog/create', 'BlogController@create')->name('blog.create');
Route::get('blog/show/{id}','BlogController@show')->name('blog.show');
Route::get('blog/edit/{id}','BlogController@edit')->name('blog.edit');
Route::post('blog/', 'BlogController@store')->name('blog.store');
Route::patch('blog/show/{id}','BlogController@update')->name('blog.update');
Route::delete('blog/{id}','BlogController@destroy')->name('blog.destroy');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
