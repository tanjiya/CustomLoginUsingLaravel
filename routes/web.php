<?php

Route::get('/login', 'Auth\LoginController@view')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/admin', 'HomeController@index')->name('admin');