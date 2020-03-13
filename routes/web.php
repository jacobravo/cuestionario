<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'LoginController@index')->name('/');

Route::post('login', 'LoginController@login')->name('login');

Route::get('redirigir', 'CuestionarioController@index')->name('redirigir');

Route::get('logout', 'LoginController@logout')->name('logout');

Route::post('guardar', 'CuestionarioController@save')->name('guardar');
