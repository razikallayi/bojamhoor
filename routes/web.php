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



Route::get('/', 'MasterController@index');
Route::get('about', 'MasterController@about');
Route::get('projects', 'MasterController@projects');
Route::get('projects/{slug}', 'MasterController@projectDetails');
Route::get('resources', 'MasterController@resources');
Route::get('chairman-message', 'MasterController@chairmanMessage');
Route::get('policies', 'MasterController@policies');
Route::get('career', 'MasterController@career');
Route::get('clients', 'MasterController@clients');
Route::get('contact', 'MasterController@contact');

Route::post('contact', 'MasterController@contactMail');

Auth::routes();

Route::redirect('home', 'admin');
Route::group([
	'prefix' => 'admin',
	'middleware' => 'auth'], function () {

	Route::get('/', 'DashboardController@index');
	Route::get('my-account', 'DashboardController@myAccount');
	Route::put('my-account', 'DashboardController@updateAccount');

	Route::get('banners','BannerController@index');
	Route::get('banners/add','BannerController@create');
	Route::post('banners','BannerController@store');
	Route::get('banners/edit/{id}','BannerController@create');
	Route::put('banners/edit/{id}','BannerController@store');
	// Route::get('banners/sort','BannerController@cardView');
	// Route::post('banners/sort','BannerController@sort');
	Route::post('banners/image','BannerController@saveImage');
	Route::delete('banners/{id}','BannerController@destroy');



	Route::get('projects','ProjectController@index');
	Route::post('projects','ProjectController@store');
	Route::get('projects/add','ProjectController@create');
	Route::get('projects/edit/{id}','ProjectController@create');
	Route::put('projects/edit/{id}','ProjectController@store');
	// Route::get('projects/sort','ProjectController@cardView');
	// Route::post('projects/sort','ProjectController@sort');
	Route::delete('projects/image','ProjectController@deleteImage');
	Route::post('projects/image/sort','ProjectController@sortImage');
	Route::post('projects/image','ProjectController@saveImage');
	Route::delete('projects/{id}','ProjectController@destroy');

});
