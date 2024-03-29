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

Route::get('/change-user-avatar/{id}',[
    'uses'=>'UserRegistrationController@changeUserAvatar',
    'as' => 'change-user-avatar'
])->middleware('auth');

Route::post('/update-user-photo',[
    'uses'=>'UserRegistrationController@updateUserPhoto',
    'as' => 'update-user-photo'
])->middleware('auth');

Route::get('/change-user-password/{id}',[
    'uses'=>'UserRegistrationController@changeUserPassword',
    'as' => 'change-user-password'
])->middleware('auth');


Route::post('/user-password-update',[
    'uses'=>'UserRegistrationController@userPasswordUpdate',
    'as' => 'user-password-update'
])->middleware('auth');

Route::get('/add-header-footer',[
    'uses'=>'HomePageController@addHeaderFooterForm',
    'as' => 'add-header-footer'
]);

Route::post('/header-and-footer-save',[
    'uses'=>'HomePageController@headerAndFooterSave',
    'as' => 'header-and-footer-save'
]);

Route::get('/manage-header-footer/{id}',[
    'uses'=>'HomePageController@manageHeaderFooter',
    'as' => 'manage-header-footer'
]);

Route::post('/header-footer-update',[
    'uses'=>'HomePageController@headerFooterUpdate',
    'as' => 'header-footer-update'
]);


Route::get('/add-slide',[
    'uses'=>'SliderController@addSlide',
    'as' => 'add-slide'
]);
Route::post('/upload-slide',[
    'uses'=>'SliderController@uploadSlide',
    'as' => 'upload-slide'
]);











