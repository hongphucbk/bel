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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'v1'], function() {
	Route::group(['prefix' => 'admin'], function() {
		Route::group(['prefix' => 'category'], function() {
		    Route::get('/', 'Course\Admin\CategoryController@getList');

        	Route::get('add',  'Course\Admin\CategoryController@getAdd');
        	Route::post('add', 'Course\Admin\CategoryController@postAdd');
		});

		Route::group(['prefix' => 'info'], function() {
		    Route::get('/', 'Course\Admin\InfoController@getList');

        	Route::get('add',  'Course\Admin\InfoController@getAdd');
        	Route::post('add', 'Course\Admin\InfoController@postAdd');
		});
        
    });
    
    Route::group(['prefix' => 'page'], function() {
        Route::get('/', 'Course\Fontend\LessonController@getLesson');
    });

});