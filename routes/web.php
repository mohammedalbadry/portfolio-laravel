<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'admin'], function(){

    /* admin auth */
    Auth::routes([
        'register' => false, // Registration Routes...
        'reset' => false, // Password Reset Routes...
        'verify' => false, // Email Verification Routes...
    ]);

});

Route::group(['prefix' => 'admin', 'namespace'=> 'CPanal', 'middleware' => 'auth'], function(){

    Route::get('/markAsRead', function(){
        $admin = auth()->user();
        $admin->unreadNotifications->markAsRead();
    });
    
    Route::get('/',"HomeController@index");

    Route::get('setting',"SettingController@index");
    Route::post('setting',"SettingController@update");

    Route::get('profile',"AdminController@index");
    Route::post('profile',"AdminController@update");

    Route::resource('project', 'ProjectController')->except(['show']);
    Route::resource('section', 'SectionController')->except(['show']);
    Route::resource('section-details', 'SectionDetailsController')->except(['show']);
    Route::resource('email', 'EmailController')->except(['show']);
    Route::get('access',"AccessController@index");
    Route::post('access',"AccessController@fetch");

    Route::group(['prefix' => 'laravel-filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
   
   

    Route::get('message',"MessageController@index");
    Route::delete('message/{id}',"MessageController@destroy");

    Route::get('feedback',"FeedbackController@index");
    Route::delete('feedback/{id}',"FeedbackController@destroy");
    Route::post('feedback/{id}',"FeedbackController@approval");


});

Route::group(['namespace'=> 'EndUser', 'middleware' => 'isclosed'], function(){

    Route::get('/',"HomeController@index");
    Route::get('project/{id}',"ProjectController@index")->where('id', '[0-9]+');


    Route::post('feedback', "FeedbackController@add");
    Route::post('message', "MessageController@add");

});


Route::get('close', function () {
    return view('enduser.close');
});