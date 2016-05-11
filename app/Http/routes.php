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
Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::get('/logout',[
    'uses'=>'UserController@getLogout',
    'as'=>'logout'

]);

Route::post('/signin',[
    'uses'=>'UserController@postSignIn',
    'as'=>'signin'
]);


Route::get('/dashboard',[
    'uses'=>'UserController@getDashboard',
    'as'=>'dashboard',
    'middleware'=>'auth'
]);

Route::get('/employeeManagement',[
    'uses'=>'UserController@getEmployee',
    'as'=>'employeeManagement',
    'middleware'=>'auth'
]);

Route::get('/orderManagement',[
    'uses'=>'UserController@getOrder',
    'as'=>'orderManagement',
    'middleware'=>'auth'
]);

Route::get('/stockManagement',[
    'uses'=>'UserController@getStock',
    'as'=>'stockManagement',
    'middleware'=>'auth'
]);

Route::get('/financialManagement',[
    'uses'=>'UserController@getFinancial',
    'as'=>'financialManagement',
    'middleware'=>'auth'
]);


Route::group(['middleware'=>['web']],function(){


});