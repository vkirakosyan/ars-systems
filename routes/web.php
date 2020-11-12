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

Auth::routes();
// Website Pages
Route::get('/', 'HomeController@index');
Route::get('/team', 'TeamController@index');
Route::get('/outsourcing', 'OutsourcingController@index');
Route::get('/services', 'ServicesController@index');
Route::get('/career', 'CareerController@index');
Route::get('/contact', 'ContactController@index');
// AJAX/Form
Route::post('career', 'CareerController@sendMail');
Route::post('contact', 'ContactController@sendMail');
Route::post('admin/team/sortMembers', 'Admin\\TeamController@sortMembers');
// Admin routes
Route::get('admin', 'Admin\AdminController@index');
Route::resource('admin/roles', 'Admin\RolesController');
Route::resource('admin/permissions', 'Admin\PermissionsController');
Route::resource('admin/users', 'Admin\UsersController');
Route::get('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
Route::post('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);
Route::resource('admin/categories', 'Admin\\CategoriesController');
Route::resource('admin/careers', 'Admin\\CareersController');
Route::resource('admin/team', 'Admin\\TeamController');
Route::resource('admin/services', 'Admin\\ServicesController');
Route::resource('admin/clients', 'Admin\\ClientsController');
Route::resource('admin/portfolio', 'Admin\\PortfolioController');
Route::resource('admin/videos', 'Admin\\VideosController');
