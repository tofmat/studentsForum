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

Route::get('/', 'Web\SiteController@index')->name('home');
Route::get('login', 'Web\AuthController@login')->name('login');
Route::post('login', 'Web\AuthController@doLogin')->name('do-login');

Route::get('/ask', 'Web\QuestionsController@new')->name('ask')
    ->middleware('auth');
Route::post('/ask', 'Web\QuestionsController@create')->name('do-ask')
    ->middleware('auth');
Route::get('/question/{id}', 'Web\QuestionsController@view')->name('view-question');

