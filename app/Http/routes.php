<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/hello', function () {
    return "hello";
});

Route::get('/',function(){
	
	return 'helloWorld';
});

Route::get('my',function(){
	
	return 'he';
});

Route::group(['prefix' => 'job'], function () {
    Route::post('add', [
        'as' => 'job.add', 'uses' => 'myController@jobAdd'
    ]);

    Route::post('delete', [
        'as' => 'job.delete', 'uses' => 'myController@jobDelete'
    ]);


   Route::get('list', [
        'as' =>     'job.list', 'uses' => 'myController@jobList'
    ]);
});