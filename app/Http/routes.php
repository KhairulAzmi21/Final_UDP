<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', function () {
    return view('welcome');
	});
    Route::get('/home', 'HomeController@index');


    Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
    {   
    Route::get('/admin', 'HomeController@is_admin');
    Route::post('permission/save','HomeController@permission_user');
    Route::get('/admin/view/{id}','HomeController@admin_view');
    Route::get('/admin/view/images/{id}','HomeController@admin_image_view');
    });

    Route::group(['middleware' => 'App\Http\Middleware\UserMiddleware'], function()
    {   
    Route::get('/gallery/list','GalleryController@viewGalleryList');
    Route::post('gallery/save','GalleryController@saveGallery');
    Route::get('gallery/view/{id}','GalleryController@viewGalleryPics');
    Route::post('image/do-upload','GalleryController@doImageUpload');
    Route::get('/upload/{id}', 'GalleryController@uploadImages');

    Route::get('gallery/delete/{id}','GalleryController@deleteGallery');
    Route::get('file/download/{id}', 'GalleryController@downloadImages');
    });

    
});
