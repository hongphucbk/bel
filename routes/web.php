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
Route::get('register', 'UserAuth\Member\AuthController@getRegister');
Route::post('register', 'UserAuth\Member\AuthController@postRegister');
Route::get('confirm/{comfirm_code}', 'UserAuth\Member\AuthController@getConfirm');

Route::get('resetpass', 'UserAuth\Member\AuthController@getResetPass');
Route::post('resetpass', 'UserAuth\Member\AuthController@postResetPass');
Route::get('newpass/{code}', 'UserAuth\Member\AuthController@getNewPass');
Route::post('newpass/{code}', 'UserAuth\Member\AuthController@postNewPass')->name('newpass');

Route::get('login/zalo', 'UserAuth\Member\AuthController@getLoginZalo');
Route::get('login/test', 'UserAuth\Member\AuthController@getLoginZalo1');

Route::group(['prefix' => 'v1'], function() {
  Route::get('/a', 'Home\HomeController@getTestInterface');

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

      
    });

    Route::group(['prefix' => 'helpdesk'], function() {
      Route::get('/ticket', 'Helpdesk\Member\TicketController@getList');

      Route::get('/ticket/add', 'Helpdesk\Member\TicketController@getAdd');
      Route::post('/ticket/add', 'Helpdesk\Member\TicketController@postAdd');
      

      Route::get('/ticket/detail/{id}', 'Helpdesk\Member\TicketController@getDetail');

      // });
    });

    Route::group(['prefix' => 'profile'], function() {
      Route::get('/{id}', 'User\Member\ProfileController@getIndex');

      Route::post('/{id}/edit-infor', 'User\Member\ProfileController@postEditInfor');

      // Route::get('/ticket/add', 'Helpdesk\Member\TicketController@getAdd');
      // Route::post('/ticket/add', 'Helpdesk\Member\TicketController@postAdd');
      

      // Route::get('/ticket/detail/{id}', 'Helpdesk\Member\TicketController@getDetail');

      // });
    });
    
    Route::group(['prefix' => 'warehouse'], function() {
      Route::group(['prefix' => 'facility'], function() {
        Route::get('/', 'Warehouse\Member\FacilityController@getList');
        Route::post('/', 'Warehouse\Member\FacilityController@postList');

        Route::get('add', 'Warehouse\Member\FacilityController@getAdd');
        Route::post('add', 'Warehouse\Member\FacilityController@postAdd');

        Route::get('display/{id}', 'Warehouse\Member\FacilityController@getDisplay');

        Route::get('edit/{id}', 'Warehouse\Member\FacilityController@getEdit');
        Route::post('edit/{id}','Warehouse\Member\FacilityController@postEdit');

        Route::get('delete/{id}', 'Warehouse\Member\FacilityController@getDelete');
      });

      Route::group(['prefix' => 'warehouse'], function() {
        Route::get('/', 'Warehouse\Member\WarehouseController@getList');
        Route::post('/', 'Warehouse\Member\WarehouseController@postList');

        Route::get('add', 'Warehouse\Member\WarehouseController@getAdd');
        Route::post('add', 'Warehouse\Member\WarehouseController@postAdd');

        Route::get('display/{id}', 'Warehouse\Member\WarehouseController@getDisplay');

        Route::get('edit/{id}', 'Warehouse\Member\WarehouseController@getEdit');
        Route::post('edit/{id}','Warehouse\Member\WarehouseController@postEdit');

        Route::get('delete/{id}', 'Warehouse\Member\WarehouseController@getDelete');
      });
      
      Route::group(['prefix' => 'category'], function() {
        Route::get('/', 'Warehouse\Member\CategoryController@getList');
        Route::post('/', 'Warehouse\Member\CategoryController@postList');

        Route::get('add', 'Warehouse\Member\CategoryController@getAdd');
        Route::post('add', 'Warehouse\Member\CategoryController@postAdd');

        Route::get('display/{id}', 'Warehouse\Member\CategoryController@getDisplay');

        Route::get('edit/{id}', 'Warehouse\Member\CategoryController@getEdit');
        Route::post('edit/{id}','Warehouse\Member\CategoryController@postEdit');

        Route::get('delete/{id}', 'Warehouse\Member\CategoryController@getDelete');
      });

      Route::group(['prefix' => 'item'], function() {
        Route::get('/', 'Warehouse\Member\ItemController@getList');
        Route::post('/', 'Warehouse\Member\ItemController@postList');

        Route::get('add', 'Warehouse\Member\ItemController@getAdd');
        Route::post('add', 'Warehouse\Member\ItemController@postAdd');

        Route::get('display/{id}', 'Warehouse\Member\ItemController@getDisplay');

        Route::get('edit/{id}', 'Warehouse\Member\ItemController@getEdit');
        Route::post('edit/{id}','Warehouse\Member\ItemController@postEdit');

        Route::get('delete/{id}', 'Warehouse\Member\ItemController@getDelete');
      });

      Route::group(['prefix' => 'warehouse_item'], function() {
        Route::get('/', 'Warehouse\Member\WarehouseItemController@getList');
        Route::post('/', 'Warehouse\Member\WarehouseItemController@postList');

        Route::get('add', 'Warehouse\Member\WarehouseItemController@getAdd');
        Route::post('add', 'Warehouse\Member\WarehouseItemController@postAdd');

        Route::get('display/{id}', 'Warehouse\Member\WarehouseItemController@getDisplay');

        Route::get('edit/{id}', 'Warehouse\Member\WarehouseItemController@getEdit');
        Route::post('edit/{id}','Warehouse\Member\WarehouseItemController@postEdit');

        Route::get('delete/{id}', 'Warehouse\Member\WarehouseItemController@getDelete');
      });

      Route::group(['prefix' => 'supplier'], function() {
        Route::get('/', 'Warehouse\Member\SupplierController@getList');
        Route::post('/', 'Warehouse\Member\SupplierController@postList');

        Route::get('add', 'Warehouse\Member\SupplierController@getAdd');
        Route::post('add', 'Warehouse\Member\SupplierController@postAdd');

        Route::get('display/{id}', 'Warehouse\Member\SupplierController@getDisplay');

        Route::get('edit/{id}', 'Warehouse\Member\SupplierController@getEdit');
        Route::post('edit/{id}','Warehouse\Member\SupplierController@postEdit');

        Route::get('delete/{id}', 'Warehouse\Member\SupplierController@getDelete');
      });

    });

    Route::group(['prefix' => 'maintenance'], function() {
      Route::group(['prefix' => 'cost'], function() {
        Route::get('/', 'Warehouse\Member\FacilityController@getList');
        Route::post('/', 'Warehouse\Member\FacilityController@postList');

        Route::get('add', 'Warehouse\Member\FacilityController@getAdd');
        Route::post('add', 'Warehouse\Member\FacilityController@postAdd');

        Route::get('display/{id}', 'Warehouse\Member\FacilityController@getDisplay');

        Route::get('edit/{id}', 'Warehouse\Member\FacilityController@getEdit');
        Route::post('edit/{id}','Warehouse\Member\FacilityController@postEdit');

        Route::get('delete/{id}', 'Warehouse\Member\FacilityController@getDelete');
      });

      

    });


    Route::get('maint_quanlychiphi', 'MaintenanceController@getQuanLyChiPhi');
    Route::get('maint_quanlychiphi/them', 'MaintenanceController@getThemRecordChiPhi');
    Route::post('maint_quanlychiphi/them', 'MaintenanceController@postThemRecordChiPhi');
    Route::get('maint_quanlychiphi/sua/{id}', 'MaintenanceController@getSuaRecordChiPhi');
    Route::post('maint_quanlychiphi/sua/{id}', 'MaintenanceController@postSuaRecordChiPhi');
    Route::get('maint_quanlychiphi/xoa/{id}', 'MaintenanceController@getXoaRecordChiPhi');



  });
    
  Route::group(['prefix' => 'page'], function() {
    //Route::get('/appendix/{id}/', 'Course\Fontend\InfoController@getList');
    Route::get('/appendix/{id}/{slug}', 'Course\Fontend\InfoController@getList');

    Route::get('/appendix/{id}/lesson/{lesson_id}/{slug}', 'Course\Fontend\LessonController@getLesson');

    Route::get('/demo/course/{id}/lesson/{lesson_id}/{slug}', 'Course\Fontend\LessonController@getDemo');
    Route::get('/exercise/course/{id}/lesson/{lesson_id}/{slug}', 'Course\Fontend\LessonController@getExercise');

    Route::get('/appendix/{id}/lesson/{lesson_id}/{slug}/like', 'Course\Fontend\LikeController@getLike');
    Route::get('/appendix/{id}/lesson/{lesson_id}/{slug}/dislike', 'Course\Fontend\LikeController@getDislike');
    Route::post('/appendix/{id}/lesson/{lesson_id}/{slug}/comment', 'Course\Fontend\CommentController@postComment');
    Route::get('/appendix/{id}/lesson/{lesson_id}/{slug}/comment/delete/{cmt_id}', 'Course\Fontend\CommentController@getDelComment');

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

