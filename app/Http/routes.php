<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'StaticPagesController@showHome');

Route::get('home', 'StaticPagesController@showHome');

Route::get('disclaimer', 'StaticPagesController@showDisclaimer');

Route::get('languages', 'LanguagesController@index');
Route::get('languages/{id}', 'LanguagesController@show');
Route::post('languages', 'LanguagesController@store');

Route::get('about', 'AboutController@showAbout');
Route::get('contact', 'ContactController@showContact');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);
