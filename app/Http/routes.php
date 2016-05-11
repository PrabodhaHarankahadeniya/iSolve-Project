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
Route::post('/signup',[
    'uses'=>'UserController@postSignUp',
    'as'=>'signup'
]);


Route::get('/Dashboard',[
    'uses'=>'UserController@getDashboard',
    'as'=>'Dashboard',
    'middleware'=>'auth'
]);

Route::get('/EmployeeManagement',[
    'uses'=>'UserController@getEmployee',
    'as'=>'EmployeeManagement',
    'middleware'=>'auth'
]);

Route::get('/OrderManagement',[
    'uses'=>'UserController@getOrder',
    'as'=>'OrderManagement',
    'middleware'=>'auth'
]);

Route::get('/StockManagement',[
    'uses'=>'UserController@getStock',
    'as'=>'StockManagement',
    'middleware'=>'auth'
]);

Route::get('/FinancialManagement',[
    'uses'=>'UserController@getFinancial',
    'as'=>'FinancialManagement',
    'middleware'=>'auth'
]);

Route::post('/linkSettledCheque',[
    'uses'=>'UserController@postSettledCheques',
    'as'=>'linkSettledCheque'
]);

Route::get('/SettledCheque',[
    'uses'=>'UserController@getSettledCheques',
    'as'=>'SettledCheque',
    'middleware'=>'auth'
]);

Route::post('/linkNonSettledCheque',[
    'uses'=>'UserController@postNonSettledCheques',
    'as'=>'linkNonSettledCheque'
]);

Route::get('/NonSettledCheque',[
    'uses'=>'UserController@getNonSettledCheques',
    'as'=>'NonSettledCheque',
    'middleware'=>'auth'
]);
Route::post('/linkReturnedCheque',[
    'uses'=>'UserController@postReturnedCheques',
    'as'=>'linkReturnedCheque'
]);

Route::get('/ReturnedCheque',[
    'uses'=>'UserController@getReturnedCheques',
    'as'=>'ReturnedCheque',
    'middleware'=>'auth'
]);
Route::post('/linkBusinessReport',[
    'uses'=>'UserController@postBusinessReport',
    'as'=>'linkBusinessReport'
]);

Route::get('/BusinessReport',[
    'uses'=>'UserController@getBusinessReport',
    'as'=>'BusinessReport',
    'middleware'=>'auth'
]);

Route::post('/linkAttendance',[
    'uses'=>'UserController@postMarkingAttendance',
    'as'=>'linkAttendance'
]);

Route::get('/MarkingAttendance',[
    'uses'=>'UserController@getMarkingAttendance',
    'as'=>'MarkingAttendance',
    'middleware'=>'auth'
]);

Route::group(['middleware'=>['web']],function(){


});