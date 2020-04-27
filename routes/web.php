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

use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\Question;
use App\User;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('surveys/update/{id}', function () {
    return view('surveys/update');
});

Route::post('/insert', 'SurveyController@insert');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('surveys/create', 'SurveyController@create');

Route::get('surveys/index', 'SurveyController@index');
Route::get('surveys/destroy/{id}', 'SurveyController@destroy');
Route::get('surveys/update/{id}', 'SurveyController@update');
Route::get('survey/edit/{id}','SurveyController@edit');

Route::get('surveys/test', 'SurveyController@test');


////////=========================================================================================

Route::get('/api/auth',function(Request $request){
    $user= User::get();
    return $user->first_name;
    // $isSucess =  $request->username ==$user->username &&  $request->password ==$user->password ? "True" : "False"; 
    // return $isSucess;
});
Route::get('/api/get_questions',function(Request $request){
    $questions = Question::get();
    return $questions;
});
//API login 
// Route::get('/api/auth',function(Request $request){
//     $isSucess =  $request->username =="abc" &&  $request->password =="123" ? "True" : "False"; 
//     return $isSucess;
// });
//API get Questions
// Route::get('/api/get_questions',function(Request $request){
//     $questions = Question::get();
//     return $questions;
// });

Route::middleware('web')
	->prefix(config('url_path', '/form-builder'))
	// ->namespace('App\Http\Controllers')
	// ->name('formbuilder::')
	->group(function () {
		Route::redirect('/', url(config('url_path', '/form-builder').'/forms'));

		/**
		 * Public form url
		 */
		Route::get('/form/{identifier}', 'RenderFormController@render')->name('form.render');
		Route::post('/form/{identifier}', 'RenderFormController@submit')->name('form.submit');
		Route::get('/form/{identifier}/feedback', 'RenderFormController@feedback')->name('form.feedback');

		/**
		 * My submission routes
		 */
		Route::resource('/my-submissions', 'MySubmissionController');
		
		/**
		 * Form submission management routes
		 */
		Route::name('forms.')
			->prefix('/forms/{fid}')
			->group(function () {
				Route::resource('/submissions', 'SubmissionController');
			});

		/**
		 * Form management routes
		 */
		Route::resource('/forms', 'FormController');
	});