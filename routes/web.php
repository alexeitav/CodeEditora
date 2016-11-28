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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware'=>'auth'], function(){

    //Route::resource('categories', 'CategoriesController', ['except'=>'show, destroy']);
    Route::group(['prefix' => 'categories'], function() {

        Route::get('', ['as'=>'categories.index', 'uses'=>'CategoriesController@index']);
        Route::get('create', ['as'=>'categories.create', 'uses'=>'CategoriesController@create']);
        Route::post('store', ['as'=>'categories.store', 'uses'=>'CategoriesController@store']);
        Route::get('{category}/edit', ['as'=>'categories.edit', 'uses'=>'CategoriesController@edit']);
        Route::put('{category}/update', ['as'=>'categories.update', 'uses'=>'CategoriesController@update']);
        Route::get('{category}/delete', ['as'=>'categories.delete', 'uses'=>'CategoriesController@delete']);
        Route::get('{category}/destroy', ['as'=>'categories.destroy', 'uses'=>'CategoriesController@destroy']);


    });

    Route::group(['prefix' => 'books'], function() {

        Route::get('', ['as'=>'books.index', 'uses'=>'BooksController@index']);
        Route::get('create', ['as'=>'books.create', 'uses'=>'BooksController@create']);
        Route::post('store', ['as'=>'books.store', 'uses'=>'BooksController@store']);
        Route::get('{book}/edit', ['as'=>'books.edit', 'uses'=>'BooksController@edit']);
        Route::put('{book}/update', ['as'=>'books.update', 'uses'=>'BooksController@update']);
        Route::get('{book}/delete', ['as'=>'books.delete', 'uses'=>'BooksController@delete']);
        Route::get('{book}/destroy', ['as'=>'books.destroy', 'uses'=>'BooksController@destroy']);


    });



});
