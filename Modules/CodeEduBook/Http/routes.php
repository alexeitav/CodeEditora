<?php


Route::group(['middleware'=>['auth', config('codeeduuser.middleware.isVerified')]], function(){

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

    Route::group(['prefix' => 'trashed', 'as' => 'trashed.'], function() {

        Route::group(['prefix' => 'books', 'as' => 'books.'], function() {
            Route::get('', ['as'=>'index', 'uses'=>'BooksTrashedController@index']);
            Route::get('{book}/show', ['as'=>'show', 'uses'=>'BooksTrashedController@show']);
            Route::get('{book}/undelete', ['as'=>'undelete', 'uses'=>'BooksTrashedController@undelete']);
            Route::get('{book}/restore', ['as'=>'restore', 'uses'=>'BooksTrashedController@restore']);
        });

        Route::group(['prefix' => 'categories', 'as' => 'categories.'], function() {
            Route::get('', ['as'=>'index', 'uses'=>'CategoriesTrashedController@index']);
            Route::get('{category}/undelete', ['as'=>'undelete', 'uses'=>'CategoriesTrashedController@undelete']);
            Route::get('{category}/restore', ['as'=>'restore', 'uses'=>'CategoriesTrashedController@restore']);
        });

    });





});

