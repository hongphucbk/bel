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

Route::get('/', 'Course\News\NewsController@getIndex');

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

        Route::group(['prefix' => 'setting'], function() {
            Route::group(['prefix' => 'service'], function() {
                Route::get('/', 'Setting\Admin\ServiceController@getList');

                Route::get('add',  'Setting\Admin\ServiceController@getAdd');
                Route::post('add', 'Setting\Admin\ServiceController@postAdd');

                Route::get('edit/{id}',  'Setting\Admin\ServiceController@getEdit');
                Route::post('edit/{id}', 'Setting\Admin\ServiceController@postEdit');

                Route::get('delete/{id}',  'Setting\Admin\ServiceController@getDelete');
            });
        });

        Route::group(['prefix' => 'product'], function() {
            Route::group(['prefix' => 'info'], function() {
                Route::get('/', 'Product\Admin\InfoController@getList');

                Route::get('add',  'Product\Admin\InfoController@getAdd');
                Route::post('add', 'Product\Admin\InfoController@postAdd');

                Route::get('edit/{id}',  'Product\Admin\InfoController@getEdit');
                Route::post('edit/{id}', 'Product\Admin\InfoController@postEdit');

                Route::get('delete/{id}',  'Product\Admin\InfoController@getDelete');
            });

            Route::group(['prefix' => 'detail'], function() {
                Route::get('/', 'Product\Admin\DetailController@getList');

                Route::get('add',  'Product\Admin\DetailController@getAdd');
                Route::post('add', 'Product\Admin\DetailController@postAdd');

                Route::get('edit/{id}',  'Product\Admin\DetailController@getEdit');
                Route::post('edit/{id}', 'Product\Admin\DetailController@postEdit');

                Route::get('delete/{id}',  'Product\Admin\DetailController@getDelete');
            });

            Route::group(['prefix' => 'attach'], function() {
                Route::get('/', 'Product\Admin\AttachController@getList');

                Route::get('add',  'Product\Admin\AttachController@getAdd');
                Route::post('add', 'Product\Admin\AttachController@postAdd');

                Route::get('edit/{id}',  'Product\Admin\AttachController@getEdit');
                Route::post('edit/{id}', 'Product\Admin\AttachController@postEdit');

                Route::get('delete/{id}',  'Product\Admin\AttachController@getDelete');
            });
        });
    });
    
    Route::group(['prefix' => 'page'], function() {
        Route::get('/appendix/{id}', 'Course\Fontend\InfoController@getList');
        Route::get('/appendix/{id}/lesson/{lesson_id}', 'Course\Fontend\LessonController@getLesson');

        Route::get('/product/{id}', 'Product\Fontend\ProductController@getList');
    });
});


Route::group(['prefix' => 'index'], function() {
    Route::get('/', 'Course\News\NewsController@getIndex');
});