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
Route::get('/questions', 'Web\QuestionsController@index')->name('questions');
Route::get('/question/{id}', 'Web\QuestionsController@view')->name('view-question');
Route::post('/question/answer', 'Web\QuestionsController@addAnswer')
    ->name('question.answer')
    ->middleware('auth');

Route::get('/feed', 'Web\UserController@feed')->name('feed');
Route::get('/user/profile', 'Web\UserController@profile')->name('user.profile');
Route::get('/user/edit', 'Web\UserController@edit')->name('user.edit');
Route::get('/user/update-courses', 'Web\UserController@updateCourses')->name('user.update-courses');

