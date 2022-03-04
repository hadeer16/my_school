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

Auth::routes();
Route::get('/', function () {
    return view('auth.login');
});
Route::group(
	[
		'prefix' => LaravelLocalization::setLocale(),
		'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
	], function(){ 
		Route::get('/dashboard', 'HomeController@index')->name('dashboard');
		Route::group(['namespace'=>'level'], function() {
			Route::resource('level', 'LevelController');
		});
		Route::group(['namespace'=>'classroom'], function() {
			Route::resource('classroom', 'ClassController');
		});
		Route::group(['namespace'=>'teacher'], function() {
			Route::resource('teacher', 'TeacherController');
			Route::get('/classet/{id}','TeacherController@getclasses');
		});
		Route::group(['namespace'=>'subject'], function() {
		Route::resource('subject', 'SubjectController');
		Route::get('/classet/{id}','SubjectController@getclasses');
		Route::get('/teachers/{id}','SubjectController@getteachers');
		});
		Route::group(['namespace'=>'parents'], function() {
			Route::resource('parents', 'ParentController');
		});
		Route::group(['namespace'=>'student'], function() {
			Route::resource('student', 'StudentController');
			Route::get('/classet/{id}','StudentController@getclasses');
			Route::resource('promotion', 'PromotionController');
			Route::resource('feess', 'FeessController');
			Route::resource('receipt', 'ReceiptController');
			Route::get('/amount/{id}','FeessController@getfeess');
		});
		Route::group(['namespace'=>'fees'], function() {
			Route::resource('fees', 'FeesController');
			Route::get('/classet/{id}','FeesController@getclasses');
		});
		Route::group(['namespace'=>'library'], function() {
			Route::resource('library', 'LibraryController');
		});
		Route::group(['namespace'=>'post'], function() {
			Route::resource('post', 'PostController');
		});
		Route::group(['namespace'=>'studeteach'], function() {
			Route::resource('studeteach', 'StudteachController');
		});
		Route::group(['namespace'=>'attendance'], function() {
			Route::resource('attendance', 'AttendanceController');
		});
		Route::group(['namespace'=>'online'], function() {
			Route::resource('online', 'OnlineController');
		});
		Route::group(['namespace'=>'file'], function() {
			Route::resource('file', 'FileController');
			Route::get('/classes/{id}','FileController@getsubject');
		});
		Route::group(['namespace'=>'studteacher'], function() {
			Route::resource('studteacher', 'StudteacherController');
			Route::resource('quizstud', 'QuizstudController');
			Route::resource('quiztion', 'QuiztionController');
		});
		Route::group(['namespace'=>'studsubject'], function() {
			Route::resource('studsubject', 'studsubjectController');
		});
		Route::group(['namespace'=>'box'], function() {
			Route::resource('box', 'BoxController');
			Route::resource('boxstud', 'BoxstudController');
		});
		Route::group(['namespace'=>'quizz'], function() {
			Route::resource('quizz', 'QuizController');
		});
		Route::group(['namespace'=>'question'], function() {
			Route::resource('question', 'QuestionController');
		});
	});


