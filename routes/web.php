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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user-registration',[
   'uses'=>'UserRegistrationController@showRegistrationFrom',
    'as' => 'user-registration'
])->middleware('auth');

Route::post('/user-registration',[
    'uses'=>'UserRegistrationController@userSave',
    'as' => 'user-save'
])->middleware('auth');

Route::get('/user-list',[
    'uses'=>'UserRegistrationController@userList',
    'as' => 'user-list'
])->middleware('auth');

Route::get('/user-profile/{userId}',[
    'uses'=>'UserRegistrationController@userProfile',
    'as' => 'user-profile'
])->middleware('auth');

Route::get('/change-user-info/{id}',[
    'uses'=>'UserRegistrationController@changeUserInfo',
    'as' => 'change-user-info'
])->middleware('auth');

Route::post('/user-info-update',[
    'uses'=>'UserRegistrationController@userInfoUpdate',
    'as' => 'user-info-update'
])->middleware('auth');
