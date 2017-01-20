<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


######################################
 //admin routes to filter & validate
######################################

Route::group(['prefix' => 'admin'], function () {
   
    //login
    Route::get('login', 'Backend\Auth\LoginController@index');
    Route::post('login', 'Backend\Auth\LoginController@adminLogin');
    Route::post('logout','Backend\Auth\LoginController@logout');
	
    //verify token
    Route::get('verifytoken', 'Backend\Auth\VerifyTokenController@showTokenForm');
    Route::post('verifytoken', 'Backend\Auth\VerifyTokenController@submitToken');
    
    //Dashboard
    Route::get('dashboard', 'Backend\DashboardController@index', compact(Auth::getSession()));
    
	
    	
    //get all categories
    Route::get('allcategories','Backend\CategoryController@all_categoreis');
    Route::get('addcategories','Backend\CategoryController@add_categoreis');
    Route::post('addcategories','Backend\CategoryController@add_categoreis');
    Route::get('editcategories/{id}','Backend\CategoryController@edit_categories');
	
	
});