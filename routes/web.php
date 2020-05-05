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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/importexport', 'BlogController@create')->name('importexport.create');
Route::post('/importexport', 'BlogController@store')->name('importexport.store');

Route::post('/import', 'BlogController@import')->name('importexport.import');
Route::get('/export', 'BlogController@export')->name('importexport.export');
