<?php

use Illuminate\Support\Facades\Route;


//Route::get('/', [Admin\AuthController::class, 'home'])->name('home');

Route::name('admin.')->group(function () {
    Route::get('/', 'AuthController@login')->name('login');
   	Route::get('/login', 'AuthController@login')->name('login');
    Route::post('/login','AuthController@do_login')->name('login');
    Route::get('/logout','AuthController@logout')->name('logout');

    Route::middleware('admin-auth')->group(function() {
    	Route::get('/dashboard','Dashboard@index')->name('dashboard');
        Route::get('/edit-profile','SettingController@Edit_profile')->name('edit-profile');
        Route::post('/update_profile','SettingController@update_profile')->name('update_profile');
        Route::get('/change-password','SettingController@change_password')->name('change-password');
        Route::post('/update_password','SettingController@update_password')->name('update_password');
        Route::get('/ethinicity-list','EthinicityController@ethinicity_list')->name('ethinicity-list');
        Route::post('/add-ethinicity','EthinicityController@add_ethinicity')->name('add-ethinicity');
        Route::post('/edit-ethinicity','EthinicityController@edit_ethinicity')->name('edit-ethinicity');
         Route::get('/delete-ethinicity','EthinicityController@delete_ethinicity')->name('delete-ethinicity');
        Route::get('/eyes-list','EyesController@eyes_list')->name('eyes-list');
        Route::post('/add-eyes','EyesController@add_eyes')->name('add-eyes');
        Route::post('/edit-eyes','EyesController@edit_eyes')->name('edit-eyes');
        Route::get('/delete-eyes','EyesController@delete_eyes')->name('delete-eyes');
        Route::get('/hair-list','HairController@hair_list')->name('hair-list');
        Route::post('/add-hair-list','HairController@add_hair_list')->name('add-hair-list');
        Route::post('/edit-hair-list','HairController@edit_hair_list')->name('edit-hair-list');
        Route::get('/delete-hair-list','HairController@delete_hair_list')->name('delete-hair-list');
        Route::get('/tags-list','TagController@tags_list')->name('tags-list');
        Route::post('/add-tags','TagController@add_tags')->name('add-tags');
        Route::post('/edit-tags','TagController@edit_tags')->name('edit-tags');
        Route::get('/delete-tags','TagController@delete_tags')->name('delete-tags');
        Route::get('/height-list','HeightController@height_list')->name('height-list');
        Route::post('/add-height','HeightController@add_height')->name('add-height');
        Route::post('/edit-height','HeightController@edit_height')->name('edit-height');
        Route::get('/delete-height','HeightController@delete_height')->name('delete-height');
        Route::get('/weight-list','HeightController@weight_list')->name('weight-list');
        Route::post('/add-weight','HeightController@add_weight')->name('add-weight');
        Route::post('/edit-weight','HeightController@edit_weight')->name('edit-weight');
        Route::get('/delete-weight','HeightController@delete_weight')->name('delete-weight');
        Route::get('/category-list','CategoryController@category_list')->name('category-list');
        Route::post('/add-category','CategoryController@add_category')->name('add-category');
        Route::get('/delete-category','CategoryController@delete_category')->name('delete-category');
        Route::get('/edit-category','CategoryController@edit_category')->name('edit-category');
        Route::post('/update-category','CategoryController@category_update')->name('update-category');
        Route::get('/public-hair-list','HairController@public_hair_list')->name('public-hair-list');
        Route::post('/add-public-hair','HairController@add_public_hair')->name('add-public-hair');
        Route::get('/delete-public-hair', 'HairController@delete_public_hair')->name('delete-public-hair');
         Route::post('/edit-public-hair','HairController@edit_public_hair')->name('edit-public-hair');
         Route::get('/bust-list','BustController@bust_list')->name('bust-list');
        Route::post('/add-bust','BustController@add_bust')->name('add-bust');
        Route::post('/edit-bust','BustController@edit_bust')->name('edit-bust');
        Route::get('/delete-bust','BustController@delete_bust')->name('delete-bust');
        Route::get('/state-list','StateController@state_list')->name('state-list');
        Route::post('/add-state','StateController@add_state')->name('add-state');
        Route::get('/delete-state','StateController@delete_state')->name('delete-state');
        Route::post('/edit-state','StateController@edit_state')->name('edit-state');
        Route::get('/city-list','CityController@city_list')->name('city-list');
        Route::post('/select_state','CityController@select_state')->name('select_state');
        Route::post('/add-city','CityController@add_city')->name('add-city');
        Route::post('/edit-city','CityController@edit_city')->name('edit-city');
        Route::get('/delete-city','CityController@delete_city')->name('delete-city');
        Route::get('/pending-model','UserController@pending_model')->name('pending-model');
        Route::get('/accept-user-request','UserController@accept_user_request')->name('accept-user-request');
        Route::post('/add-reason','UserController@add_reason')->name('add-reason');
        Route::get('active-model-list','UserController@active_user_model')->name('active-model-list');
         Route::get('view-user-details','UserController@view_user_details')->name('view-user-details');
         Route::get('view-video-details','UserController@view_video_details')->name('view-video-details');
    	/*Route::get('/profile','Dashboard@profile')->name('profile');
    	Route::get('/change-password','Dashboard@password')->name('change-password');
        Route::post('/update_profile','Dashboard@update_profile')->name('update_profile');
        Route::post('/change_password','Dashboard@change_password')->name('change_password');*/
	});
});


