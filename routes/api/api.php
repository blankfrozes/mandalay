<?php

use Illuminate\Support\Facades\Route;


Route::get('/result', 'ResultController@index')->name('results');

Route::get('/livedraw', 'LiveController@livedraw')->name('livedraw');