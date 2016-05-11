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
    'uses'=>'FinancialManagementController@postSettledCheques',
    'as'=>'linkSettledCheque'
]);

Route::get('/SettledCheque',[
    'uses'=>'FinancialManagementController@getSettledCheques',
    'as'=>'SettledCheque',
    'middleware'=>'auth'
]);

Route::post('/linkNonSettledCheque',[
    'uses'=>'FinancialManagementController@postNonSettledCheques',
    'as'=>'linkNonSettledCheque'
]);

Route::get('/NonSettledCheque',[
    'uses'=>'FinancialManagementController@getNonSettledCheques',
    'as'=>'NonSettledCheque',
    'middleware'=>'auth'
]);
Route::post('/linkReturnedCheque',[
    'uses'=>'FinancialManagementController@postReturnedCheques',
    'as'=>'linkReturnedCheque'
]);

Route::get('/ReturnedCheque',[
    'uses'=>'FinancialManagementController@getReturnedCheques',
    'as'=>'ReturnedCheque',
    'middleware'=>'auth'
]);
Route::post('/linkBusinessReport',[
    'uses'=>'FinancialManagementController@postBusinessReport',
    'as'=>'linkBusinessReport'
]);

Route::get('/BusinessReport',[
    'uses'=>'FinancialManagementController@getBusinessReport',
    'as'=>'BusinessReport',
    'middleware'=>'auth'
]);

Route::post('/linkAttendance',[
    'uses'=>'EmployeeManagementController@postMarkingAttendance',
    'as'=>'linkAttendance'
]);

Route::get('/MarkingAttendance',[
    'uses'=>'EmployeeManagementController@getMarkingAttendance',
    'as'=>'MarkingAttendance',
    'middleware'=>'auth'
]);

Route::group(['middleware'=>['web']],function(){


});