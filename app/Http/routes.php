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

Route::post('/linksettledcheque',[
    'uses'=>'UserController@postSettledCheques',
    'as'=>'linksettledcheque'
]);

Route::get('/settledcheque',[
    'uses'=>'UserController@getSettledCheques',
    'as'=>'settledcheque',
    'middleware'=>'auth'
]);

Route::post('/linknonsettledcheque',[
    'uses'=>'UserController@postNonSettledCheques',
    'as'=>'linknonsettledcheque'
]);

Route::get('/nonsettledcheque',[
    'uses'=>'UserController@getNonSettledCheques',
    'as'=>'nonsettledcheque',
    'middleware'=>'auth'
]);
Route::post('/linkreturnedcheque',[
    'uses'=>'UserController@postReturnedCheques',
    'as'=>'linkreturnedcheque'
]);

Route::get('/returnedcheque',[
    'uses'=>'UserController@getReturnedCheques',
    'as'=>'returnedcheque',
    'middleware'=>'auth'
]);
Route::post('/linkbusinessreport',[
    'uses'=>'UserController@postBusinessReport',
    'as'=>'linkbusinessreport'
]);

Route::get('/businessreport',[
    'uses'=>'UserController@getBusinessReport',
    'as'=>'businessreport',
    'middleware'=>'auth'
]);

Route::post('/linkattendance',[
    'uses'=>'UserController@postMarkingAttendance',
    'as'=>'linkattendance'
]);

Route::get('/markingattendance',[
    'uses'=>'UserController@getMarkingAttendance',
    'as'=>'markingattendance',
    'middleware'=>'auth'
]);

Route::group(['middleware'=>['web']],function(){


});