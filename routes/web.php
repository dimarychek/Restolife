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

// Admin routes
Route::group(['prefix'=>'adminzone'], function()
{
    Route::get('/', 'AdminController@index');
    Route::resource('articles', 'ArticlesController');
    Route::resource('pages', 'PagesController');
    Route::resource('categories', 'CategoriesController');
    Route::get('comments', 'CommentsController@show');
    Route::get('comments/delete/{id}','CommentsController@delete');
    Route::get('comments/published/{id}','CommentsController@published');
});
Route::get('/login', 'AdminController@index');

// Site routes
Auth::routes();
Route::get('/', 'FrontController@index');
Route::get('/show/{id}', 'FrontController@show');
Route::post('/show/{id}', 'CommentsController@save');
Route::get('/page/{id}', 'FrontController@page');