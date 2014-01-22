<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');
Route::get('overlay', 'ComponentController@index');
Route::get('test', 'FixedPageController@index');
Route::get('partials/overlay-modal', 'ComponentController@overlayModal');