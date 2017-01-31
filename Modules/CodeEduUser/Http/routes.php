<?php



Route::group(['as' => 'codeeduuser.'], function(){

    Route::group(['prefix' => 'admin', 'middleware'=>['auth', config('codeeduuser.middleware.isVerified'), 'can:user-admin']], function() {

        Route::group(['prefix' => 'users', 'as' => 'users.'], function() {
            Route::get('', ['as'=>'index', 'uses'=>'UsersController@index']);
            Route::get('create', ['as'=>'create', 'uses'=>'UsersController@create']);
            Route::post('store', ['as'=>'store', 'uses'=>'UsersController@store']);
            Route::get('{user}/edit', ['as'=>'edit', 'uses'=>'UsersController@edit']);
            Route::put('{user}/update', ['as'=>'update', 'uses'=>'UsersController@update']);
            Route::get('{user}/delete', ['as'=>'delete', 'uses'=>'UsersController@delete']);
            Route::get('{user}/destroy', ['as'=>'destroy', 'uses'=>'UsersController@destroy']);
        });

        Route::group(['prefix' => 'roles', 'as' => 'roles.'], function() {
            Route::get('', ['as'=>'index', 'uses'=>'RolesController@index']);
            Route::get('create', ['as'=>'create', 'uses'=>'RolesController@create']);
            Route::post('store', ['as'=>'store', 'uses'=>'RolesController@store']);
            Route::get('{role}/edit', ['as'=>'edit', 'uses'=>'RolesController@edit']);
            Route::put('{role}/update', ['as'=>'update', 'uses'=>'RolesController@update']);
            Route::get('{role}/delete', ['as'=>'delete', 'uses'=>'RolesController@delete']);
            Route::get('{role}/destroy', ['as'=>'destroy', 'uses'=>'RolesController@destroy']);
        });


    });

    Route::get('users/settings', 'UserSettingsController@edit')->name('user_settings.edit');
    Route::put('users/settings', 'UserSettingsController@update')->name('user_settings.update');

    Route::get('email-verification/error', 'UserConfirmationController@getVerificationError')->name('email-verification.error');
    Route::get('email-verification/check/{token}', 'UserConfirmationController@getVerification')->name('email-verification.check');


});




