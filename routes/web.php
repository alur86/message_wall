<?php

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
Route::get('home', 'HomeController@index')->name('home');
Route::get('/', 'DashboardController@index')->name('dashboard');
Route::post('/postmessage', 'DashboardController@postMessage')->name('postmessage'); 
Route::get('/messagethanks', 'DashboardController@messageThanks')->name('messagethanks');

