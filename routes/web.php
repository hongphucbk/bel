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

Route::get('/', 'Home\HomeController@getIndex');

Route::get('admin/login', 'UserAuth\Admin\AuthController@getLogin');
Route::post('admin/login', 'UserAuth\Admin\AuthController@postLogin');
Route::get('admin/logout', 'UserAuth\Admin\AuthController@getLogout');

Route::get('login', 'UserAuth\Member\AuthController@getLogin');
Route::post('login', 'UserAuth\Member\AuthController@postLogin');
Route::get('logout', 'UserAuth\Member\AuthController@getLogout');


Route::group(['prefix' => 'v1'], function() {
	Route::group(['prefix' => 'admin', 'middleware'=> 'adminLogin'], function() {
    Route::group(['prefix' => 'dashboard'], function() {
      Route::get('/', 'Dashboard\Admin\IndexController@getIndex');
    });

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

      Route::group(['prefix' => 'detail'], function() {
        Route::get('/{id}',  'Course\Admin\InfoController@getDetail');
        Route::get('/{id}/add',  'Course\Admin\InfoController@getDetailAdd');
      });
		});

    Route::group(['prefix' => 'lesson'], function() {
      Route::get('/', 'Course\Admin\LessonController@getList');

      Route::get('add',  'Course\Admin\LessonController@getAdd');
      Route::post('add', 'Course\Admin\LessonController@postAdd');

      Route::get('edit/{id}',  'Course\Admin\LessonController@getEdit');
      Route::post('edit/{id}', 'Course\Admin\LessonController@postEdit');

      Route::get('delete/{id}',  'Course\Admin\LessonController@getDelete');

      Route::group(['prefix' => 'detail'], function() {
        Route::get('/{id}',  'Course\Admin\LessonController@getDetail');
        Route::get('/{id}/add',  'Course\Admin\LessonController@getDetailAdd');
      });
    });

    Route::group(['prefix' => 'content'], function() {
      Route::get('/', 'Course\Admin\ContentController@getList');

      Route::get('add',  'Course\Admin\ContentController@getAdd');
      Route::post('add', 'Course\Admin\ContentController@postAdd');

      Route::get('edit/{id}',  'Course\Admin\ContentController@getEdit');
      Route::post('edit/{id}', 'Course\Admin\ContentController@postEdit');

      Route::get('delete/{id}',  'Course\Admin\ContentController@getDelete');
    });

    Route::group(['prefix' => 'course'], function() {
      Route::group(['prefix' => 'activity'], function() {
        Route::get('/','Course\Admin\ActivityController@getList');

        Route::get('add', 'Course\Admin\ActivityController@getAdd');
        Route::post('add','Course\Admin\ActivityController@postAdd');

        Route::get('edit/{id}',  'Course\Admin\ActivityController@getEdit');
        Route::post('edit/{id}', 'Course\Admin\ActivityController@postEdit');

        Route::get('delete/{id}',  'Course\Admin\ActivityController@getDelete');
      });
    });

    Route::group(['prefix' => 'helpdesk'], function() {
      Route::group(['prefix' => 'category'], function() {
        Route::get('/','Helpdesk\Admin\CategoryController@getList');

        Route::get('add', 'Helpdesk\Admin\CategoryController@getAdd');
        Route::post('add','Helpdesk\Admin\CategoryController@postAdd');

        Route::get('edit/{id}',  'Helpdesk\Admin\CategoryController@getEdit');
        Route::post('edit/{id}', 'Helpdesk\Admin\CategoryController@postEdit');

        Route::get('delete/{id}',  'Helpdesk\Admin\CategoryController@getDelete');
      });

      Route::group(['prefix' => 'status'], function() {
        Route::get('/','Helpdesk\Admin\StatusController@getList');

        Route::get('add', 'Helpdesk\Admin\StatusController@getAdd');
        Route::post('add','Helpdesk\Admin\StatusController@postAdd');

        Route::get('edit/{id}',  'Helpdesk\Admin\StatusController@getEdit');
        Route::post('edit/{id}', 'Helpdesk\Admin\StatusController@postEdit');

        Route::get('delete/{id}',  'Helpdesk\Admin\StatusController@getDelete');
      });

      Route::group(['prefix' => 'ticket'], function() {
        Route::get('/','Helpdesk\Admin\TicketController@getList');

        // Route::get('add', 'Helpdesk\Admin\CategoryController@getAdd');
        // Route::post('add','Helpdesk\Admin\CategoryController@postAdd');

        Route::get('edit/{id}',  'Helpdesk\Admin\TicketController@getAddSolution');
        Route::post('edit/{id}', 'Helpdesk\Admin\TicketController@postAddSolution');

        Route::get('activity/delete/{activity_id}/','Helpdesk\Admin\TicketController@getDelActivity');
      });
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

    Route::group(['prefix' => 'soft'], function() {
      Route::group(['prefix' => 'info'], function() {
        Route::get('/', 'Soft\Admin\InfoController@getList');

        Route::get('add',  'Soft\Admin\InfoController@getAdd');
        Route::post('add', 'Soft\Admin\InfoController@postAdd');

        Route::get('edit/{id}',  'Soft\Admin\InfoController@getEdit');
        Route::post('edit/{id}', 'Soft\Admin\InfoController@postEdit');

        Route::get('delete/{id}',  'Soft\Admin\InfoController@getDelete');
      });

      Route::group(['prefix' => 'content'], function() {
        Route::get('/', 'Soft\Admin\ContentController@getList');

        Route::get('add',  'Soft\Admin\ContentController@getAdd');
        Route::post('add', 'Soft\Admin\ContentController@postAdd');

        Route::get('edit/{id}',  'Soft\Admin\ContentController@getEdit');
        Route::post('edit/{id}', 'Soft\Admin\ContentController@postEdit');

        Route::get('delete/{id}',  'Soft\Admin\ContentController@getDelete');
      });

      Route::group(['prefix' => 'attach'], function() {
        Route::get('/', 'Soft\Admin\AttachController@getList');

        Route::get('add',  'Soft\Admin\AttachController@getAdd');
        Route::post('add', 'Soft\Admin\AttachController@postAdd');

        Route::get('edit/{id}',  'Soft\Admin\AttachController@getEdit');
        Route::post('edit/{id}', 'Soft\Admin\AttachController@postEdit');

        Route::get('delete/{id}',  'Soft\Admin\AttachController@getDelete');
        });
    });

    Route::group(['prefix' => 'news'], function() {
      Route::group(['prefix' => 'category'], function() {
        Route::get('/', 'News\Admin\CategoryController@getList');

        Route::get('add',  'News\Admin\CategoryController@getAdd');
        Route::post('add', 'News\Admin\CategoryController@postAdd');

        Route::get('edit/{id}',  'News\Admin\CategoryController@getEdit');
        Route::post('edit/{id}', 'News\Admin\CategoryController@postEdit');

        Route::get('delete/{id}',  'News\Admin\CategoryController@getDelete');
      });

      Route::group(['prefix' => 'info'], function() {
        Route::get('/', 'News\Admin\InfoController@getList');

        Route::get('add',  'News\Admin\InfoController@getAdd');
        Route::post('add', 'News\Admin\InfoController@postAdd');

        Route::get('edit/{id}',  'News\Admin\InfoController@getEdit');
        Route::post('edit/{id}', 'News\Admin\InfoController@postEdit');

        Route::get('delete/{id}',  'News\Admin\InfoController@getDelete');
      });

      Route::group(['prefix' => 'content'], function() {
        Route::get('/', 'News\Admin\ContentController@getList');

        Route::get('add',  'News\Admin\ContentController@getAdd');
        Route::post('add', 'News\Admin\ContentController@postAdd');

        Route::get('edit/{id}',  'News\Admin\ContentController@getEdit');
        Route::post('edit/{id}', 'News\Admin\ContentController@postEdit');

        Route::get('delete/{id}',  'News\Admin\ContentController@getDelete');
      });

      Route::group(['prefix' => 'attach'], function() {
        Route::get('/', 'Soft\Admin\AttachController@getList');

        Route::get('add',  'Soft\Admin\AttachController@getAdd');
        Route::post('add', 'Soft\Admin\AttachController@postAdd');

        Route::get('edit/{id}',  'Soft\Admin\AttachController@getEdit');
        Route::post('edit/{id}', 'Soft\Admin\AttachController@postEdit');

        Route::get('delete/{id}',  'Soft\Admin\AttachController@getDelete');
        });
    });

    Route::group(['prefix' => 'user'], function() {
        Route::get('/', 'User\Admin\UserController@getList');

        Route::get('add',  'User\Admin\UserController@getAdd');
        Route::post('add', 'User\Admin\UserController@postAdd');

        Route::get('edit/{id}',  'User\Admin\UserController@getEdit');
        Route::post('edit/{id}', 'User\Admin\UserController@postEdit');

        Route::get('delete/{id}',  'User\Admin\UserController@getDelete');
    });
  });

  Route::group(['prefix' => 'member'], function() {
    Route::group(['prefix' => 'course'], function() {
      Route::get('/', 'Course\Member\InfoController@getList');

      Route::get('/activity', 'Course\Member\ActivityController@getList');
      // Route::get('add',  'Course\Admin\InfoController@getAdd');
      // Route::post('add', 'Course\Admin\InfoController@postAdd');

      // Route::get('edit/{id}',  'Course\Admin\InfoController@getEdit');
      // Route::post('edit/{id}', 'Course\Admin\InfoController@postEdit');

      // Route::get('delete/{id}',  'Course\Admin\InfoController@getDelete');

      // Route::group(['prefix' => 'detail'], function() {
      //   Route::get('/{id}',  'Course\Admin\InfoController@getDetail');
      //   Route::get('/{id}/add',  'Course\Admin\InfoController@getDetailAdd');
      // });
    });

    Route::group(['prefix' => 'helpdesk'], function() {
      Route::get('/ticket', 'Helpdesk\Member\TicketController@getList');

      Route::get('/ticket/add', 'Helpdesk\Member\TicketController@getAdd');
      Route::post('/ticket/add', 'Helpdesk\Member\TicketController@postAdd');
      

      Route::get('/ticket/detail/{id}', 'Helpdesk\Member\TicketController@getDetail');

      // });
    });
    // Route::group(['prefix' => 'activity'], function() {
      

    //   // Route::get('add',  'Course\Admin\InfoController@getAdd');
    //   // Route::post('add', 'Course\Admin\InfoController@postAdd');

    //   // Route::get('edit/{id}',  'Course\Admin\InfoController@getEdit');
    //   // Route::post('edit/{id}', 'Course\Admin\InfoController@postEdit');

    //   // Route::get('delete/{id}',  'Course\Admin\InfoController@getDelete');

    //   // Route::group(['prefix' => 'detail'], function() {
    //   //   Route::get('/{id}',  'Course\Admin\InfoController@getDetail');
    //   //   Route::get('/{id}/add',  'Course\Admin\InfoController@getDetailAdd');
    //   // });
    // });
  });
    
  Route::group(['prefix' => 'page'], function() {
    //Route::get('/appendix/{id}/', 'Course\Fontend\InfoController@getList');
    Route::get('/appendix/{id}/{slug}', 'Course\Fontend\InfoController@getList');

    Route::get('/appendix/{id}/lesson/{lesson_id}/{slug}', 'Course\Fontend\LessonController@getLesson');
    Route::get('/appendix/{id}/lesson/{lesson_id}/{slug}/like', 'Course\Fontend\LikeController@getLike');
    Route::get('/appendix/{id}/lesson/{lesson_id}/{slug}/dislike', 'Course\Fontend\LikeController@getDislike');

    Route::get('/product/{id}', 'Product\Fontend\ProductController@getList');

    Route::get('/soft/{id}', 'Soft\Fontend\SoftController@getDetail');
    Route::get('/soft/{id}/{slug}', 'Soft\Fontend\SoftController@getDetail');

    Route::get('/news/{id}', 'News\Fontend\NewsController@getDetail');
    Route::get('/news/{id}/{slug}', 'News\Fontend\NewsController@getDetail');
  });
});


Route::group(['prefix' => 'index'], function() {
    Route::get('/', 'Home\HomeController@getIndex');
});

