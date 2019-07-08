<?php

use Illuminate\Http\Request;

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
Route::get('/', function() {
    return response()->json(['message' => 'hello world']);
});

Route::post('/login', 'Api\AuthController@login');

Route::group(['prefix' => '/user', 'middleware' => 'auth:api'], function() {
    Route::get('profile', 'Api\UserController@profile');
});

Route::group(['prefix' => 'questions'], function() {
    Route::post('/', 'Api\QuestionsController@create')->middleware(['auth:api']);
    Route::get('/', 'Api\QuestionsController@index');
    Route::get('/{code}', 'Api\QuestionsController@fetchQuestionsForCourse');
});
