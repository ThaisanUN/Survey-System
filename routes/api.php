<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register','Api\AuthController@register');
Route::post('login','Api\AuthController@login');
Route::get('user', 'Api\AuthController@user');
Route::get('logout', 'Api\AuthController@logout');

Route::get('question/{id}', 'Api\QuestionController@getByUser');
//Question 
Route::middleware('auth:api')->group(function() {
    // Survey
    Route::get('survey', 'Api\SurveyApiController@index');
    Route::post('survey', 'Api\SurveyApiController@store');
    Route::put('survey/{id}', 'Api\SurveyApiController@update');
    Route::delete('survey/{id}', 'Api\SurveyApiController@destroy');
    // Question
    Route::get('question', 'Api\QuestionController@index');
    Route::post('question/{surveyID}', 'Api\QuestionController@store');
    Route::put('question/{id}', 'Api\QuestionController@update');
    Route::delete('question/{id}', 'Api\QuestionController@destroy');
});
