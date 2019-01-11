<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('regles', 'RegleController@index')->name('regles');

Route::get('sources', 'SourceController@index')->name('sources');

Route::get('valides', 'SourceController@valides')->name('valides');

Route::post('validate', 'SourceController@make_valid');
Route::post('un_validate', 'SourceController@make_un_valid');

Route::get('sources/{id?}', 'SourceController@show');

Route::post('regles', 'RegleController@store');

Route::post('regles/updateItem', 'RegleController@updateItem');

Route::post('regles/{id}', 'RegleController@delete');
