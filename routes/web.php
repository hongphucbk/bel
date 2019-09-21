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
    Route::get('/', 'Course\News\NewsController@getIndex');
});

Route::group(['prefix' => 'v1'], function() {
	Route::group(['prefix' => 'admin'], function() {
		Route::group(['prefix' => 'category'], function() {
		    Route::get('/', 'Course\Admin\CategoryController@getList');

        	Route::get('add',  'Course\Admin\CategoryController@getAdd');
        	Route::post('add', 'Course\Admin\CategoryController@postAdd');

            Route::get('edit/{id}',  'Course\Admin\CategoryController@getEdit');
            Route::post('edit/{id}', 'Course\Admin\CategoryController@postEdit');

            Route::get('delete/{id}',  'Course\Admin\CategoryController@getDelete');
		});

		Route::group(['prefix' => 'info'], function() {
		    Route::get('/', 'Course\Admin\InfoController@getList');

        	Route::get('add',  'Course\Admin\InfoController@getAdd');
        	Route::post('add', 'Course\Admin\InfoController@postAdd');

            Route::get('edit/{id}',  'Course\Admin\InfoController@getEdit');
            Route::post('edit/{id}', 'Course\Admin\InfoController@postEdit');

            Route::get('delete/{id}',  'Course\Admin\InfoController@getDelete');
		});

        Route::group(['prefix' => 'lesson'], function() {
            Route::get('/', 'Course\Admin\LessonController@getList');

            Route::get('add',  'Course\Admin\LessonController@getAdd');
            Route::post('add', 'Course\Admin\LessonController@postAdd');

            Route::get('edit/{id}',  'Course\Admin\LessonController@getEdit');
            Route::post('edit/{id}', 'Course\Admin\LessonController@postEdit');

            Route::get('delete/{id}',  'Course\Admin\LessonController@getDelete');
        });

        Route::group(['prefix' => 'content'], function() {
            Route::get('/', 'Course\Admin\ContentController@getList');

            Route::get('add',  'Course\Admin\ContentController@getAdd');
            Route::post('add', 'Course\Admin\ContentController@postAdd');

            Route::get('edit/{id}',  'Course\Admin\ContentController@getEdit');
            Route::post('edit/{id}', 'Course\Admin\ContentController@postEdit');

            Route::get('delete/{id}',  'Course\Admin\ContentController@getDelete');
        });
        
    });
    
    Route::group(['prefix' => 'page'], function() {
        Route::get('/', 'Course\Fontend\LessonController@getLesson');
    });

});


Route::group(['prefix' => 'index'], function() {
    Route::get('/', 'Course\News\NewsController@getIndex');
});