<?php

use Illuminate\Support\Facades\Route;


Route::get('/dashboard', 'AdminController@result')->name('dashboard');

Route::get('/profile', 'AdminController@profile')->name('profile');