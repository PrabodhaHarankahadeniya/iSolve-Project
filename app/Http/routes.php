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

Route::get('/EmployeeManagement/EmployeeManagement',[
    'uses'=>'UserController@getEmployee',
    'as'=>'EmployeeManagement/EmployeeManagement',
    'middleware'=>'auth'
]);

Route::get('/OrderManagement/OrderManagement',[
    'uses'=>'UserController@getOrder',
    'as'=>'OrderManagement/OrderManagement',
    'middleware'=>'auth'
]);

Route::get('/StockManagement/StockManagement',[
    'uses'=>'UserController@getStock',
    'as'=>'StockManagement/StockManagement',
    'middleware'=>'auth'
]);

Route::get('/FinancialManagement/FinancialManagement',[
    'uses'=>'UserController@getFinancial',
    'as'=>'FinancialManagement/FinancialManagement',
    'middleware'=>'auth'
]);

Route::post('/linkSettledCheque',[
    'uses'=>'FinancialManagementController@postSettledCheques',
    'as'=>'linkSettledCheque'
]);

Route::get('/FinancialManagement/SettledCheque',[
    'uses'=>'FinancialManagementController@getSettledCheques',
    'as'=>'FinancialManagement.SettledCheque',
    'middleware'=>'auth'
]);

Route::post('/linkNonSettledCheque',[
    'uses'=>'FinancialManagementController@postNonSettledCheques',
    'as'=>'linkNonSettledCheque'
]);

Route::get('/FinancialManagement/NonSettledCheque',[
    'uses'=>'FinancialManagementController@getNonSettledCheques',
    'as'=>'FinancialManagement.NonSettledCheque',
    'middleware'=>'auth'
]);
Route::post('/linkReturnedCheque',[
    'uses'=>'FinancialManagementController@postReturnedCheques',
    'as'=>'linkReturnedCheque'
]);

Route::get('/FinancialManagement/ReturnedCheque',[
    'uses'=>'FinancialManagementController@getReturnedCheques',
    'as'=>'FinancialManagement.ReturnedCheque',
    'middleware'=>'auth'
]);
Route::post('/linkBusinessReport',[
    'uses'=>'FinancialManagementController@postBusinessReport',
    'as'=>'linkBusinessReport'
]);

Route::get('/FinancialManagement/BusinessReport',[
    'uses'=>'FinancialManagementController@getBusinessReport',
    'as'=>'FinancialManagement.BusinessReport',
    'middleware'=>'auth'
]);

Route::post('/linkAttendance',[
    'uses'=>'EmployeeManagementController@postMarkingAttendance',
    'as'=>'linkAttendance'
]);

Route::get('/EmployeeManagement/MarkingAttendance',[
    'uses'=>'EmployeeManagementController@getMarkingAttendance',
    'as'=>'EmployeeManagement/MarkingAttendance',
    'middleware'=>'auth'
]);
Route::post('/linkAddEmployee',[
    'uses'=>'EmployeeManagementController@postAddEmployee',
    'as'=>'linkAddEmployee'
]);

Route::get('/EmployeeManagement/AddEmployee',[
    'uses'=>'EmployeeManagementController@getAddEmployee',
    'as'=>'EmployeeManagement/AddEmployee',
    'middleware'=>'auth'
]);
Route::group(['middleware'=>['web']],function(){


});

//Routes for StockManagementController
Route::post('/linkTodayRecords',[
    'uses'=>'StockManagementController@postTodayRecords',
    'as'=>'linkTodayRecords'
]);
Route::post('/linkPaddyStock',[
    'uses'=>'StockManagementController@postPaddyStock',
    'as'=>'linkPaddyStock'
]);
Route::post('/linkRiceStock',[
    'uses'=>'StockManagementController@postRiceStock',
    'as'=>'linkRiceStock'
]);
Route::post('/linkFlourStock',[
    'uses'=>'StockManagementController@postFlourStock',
    'as'=>'linkFlourStock'
]);
Route::post('/linkStockExchange',[
    'uses'=>'StockManagementController@postStockExchange',
    'as'=>'linkStockExchange'
]);

Route::get('/StockManagement/TodayRecords',[
    'uses'=>'StockManagementController@getTodayRecords',
    'as'=>'StockManagement/TodayRecords',
    'middleware'=>'auth'
]);

Route::get('/StockManagement/PaddyStock',[
    'uses'=>'StockManagementController@getPaddyStock',
    'as'=>'StockManagement/PaddyStock',
    'middleware'=>'auth'
]);

Route::get('/StockManagement/RiceStock',[
    'uses'=>'StockManagementController@getRiceStock',
    'as'=>'StockManagement/RiceStock',
    'middleware'=>'auth'
]);

Route::get('/StockManagement/FlourStock',[
    'uses'=>'StockManagementController@getFlourStock',
    'as'=>'StockManagement/FlourStock',
    'middleware'=>'auth'
]);

Route::get('/StockManagement/StockExchange',[
    'uses'=>'StockManagementController@getStockExchange',
    'as'=>'StockManagement/StockExchange',
    'middleware'=>'auth'
]);