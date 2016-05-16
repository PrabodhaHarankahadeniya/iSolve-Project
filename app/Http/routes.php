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


Route::get('/logout', [
    'uses' => 'UserController@getLogout',
    'as' => 'logout'

]);

Route::post('/signin', [
    'uses' => 'UserController@postSignIn',
    'as' => 'signin'
]);

Route::post('/signup', [
    'uses' => 'UserController@postSignUp',
    'as' => 'signup'
]);

Route::get('/changePassword', [
    'uses' => 'UserController@getChangePassword',
    'as' => 'changePassword',
    'middleware' => 'auth'
]);

Route::patch('/changePassword', [
    'uses' => 'UserController@postChangePassword',
    'as' => 'requestChangePassword',
    'middleware' => 'auth'
]);


Route::get('/Dashboard', [
    'uses' => 'UserController@getDashboard',
    'as' => 'Dashboard',
    'middleware' => 'auth'
]);


//home page routes
Route::get('/EmployeeManagement', [
    'uses' => 'UserController@getEmployee',
    'as' => 'EmployeeManagement',
    'middleware' => 'auth'
]);

Route::get('/orderManagement', [
    'uses' => 'UserController@getOrder',
    'as' => 'orderManagement',
    'middleware' => 'auth'
]);

Route::get('/StockManagement', [
    'uses' => 'UserController@getStock',
    'as' => 'StockManagement',
    'middleware' => 'auth'
]);

Route::get('/FinancialManagement', [
    'uses' => 'UserController@getFinancial',
    'as' => 'FinancialManagement',
    'middleware' => 'auth'
]);


//Routes for StakeHolders

Route::get('/StakeHolders', [
    'uses' => 'UserController@getStakeHolders',
    'as' => 'StakeHolders',
    'middleware' => 'auth'
]);

Route::post('/linkCustomers', [
    'uses' => 'UserController@addCustomers',
    'as' => 'linkCustomers'
]);


Route::post('/addSupplier', [
    'uses' => 'UserController@addSupplier',
    'as' => 'addSupplier'
]);


Route::get('/Customer', [
    'uses' => 'UserController@getCustomer',
    'as' => 'Customer',
    'middleware' => 'auth'
]);

Route::get('/Supplier', [
    'uses' => 'UserController@getSupplier',
    'as' => 'Supplier',
    'middleware' => 'auth'
]);


//routes for financial management cheques

Route::get('/settledRecievable', [
    'uses' => 'FinancialManagementController@getSettledRecievableCheques',
    'as' => 'settledRecievable',
    'middleware' => 'auth'
]);

Route::get('/settledPayable', [
    'uses' => 'FinancialManagementController@getSettledPayableCheques',
    'as' => 'settledPayable',
    'middleware' => 'auth'
]);

Route::get('/nonSettledPayableCheque', [
    'uses' => 'FinancialManagementController@getNonSettledPayableCheques',
    'as' => 'nonSettledPayable',
    'middleware' => 'auth'
]);

Route::get('/nonSettledRecievable', [
    'uses' => 'FinancialManagementController@getNonSettledRecievableCheques',
    'as' => 'nonSettledRecievable',
    'middleware' => 'auth'
]);

Route::get('/returnedPayable', [
    'uses' => 'FinancialManagementController@getReturnedPayableCheques',
    'as' => 'returnedPayable',
    'middleware' => 'auth'
]);

Route::get('/returnedRecievable', [
    'uses' => 'FinancialManagementController@getReturnedRecievableCheques',
    'as' => 'returnedRecievable',
    'middleware' => 'auth'
]);

Route::post('/linkEditCheque',[
    'uses'=>'FinancialManagementController@postEditCheque',
    'as'=>'linkEditCheque',
    'middleware'=>'auth'


]);
Route::get('editCheque',[
    'uses'=>'FinancialManagementController@getEditCheque',
    'as'=>'editCheque',
    'middleware'=>'auth'



]);

//routes for business report
Route::get('/businessReport', [
    'uses' => 'FinancialManagementController@getBusinessReport',
    'as' => 'businessReport',
    'middleware' => 'auth'
]);

Route::post('submitDate',[
    'uses'=>'FinancialManagementController@postDate',
    'as'=>'submitDate',
    'middleware'=>'auth'

]);

Route::post('printReport',[
    'uses'=>'FinancialManagementController@getDate',
    'as'=>'printReport',
    'middleware'=>'auth'

]);
// Routes for employee management

//routes for marking attendance
Route::post('submitAttendance',[
'uses' => 'EmployeeManagementController@postAttendance',
    'as' => 'submitAttendance',
    'middleware' => 'auth'

]);

Route::get('saveAttendance',[
    'uses' => 'EmployeeManagementController@getAttendance',
    'as' => 'saveAttendance',
    'middleware' => 'auth'

]);



Route::post('/linkAttendance', [
    'uses' => 'EmployeeManagementController@postMarkingAttendance',
    'as' => 'linkAttendance'
]);

Route::get('/MarkingAttendance', [
    'uses' => 'EmployeeManagementController@getMarkingAttendance',
    'as' => 'MarkingAttendance',
    'middleware' => 'auth'
]);

//routes for add employee
Route::get('/linkAddEmployee', [
    'uses' => 'EmployeeManagementController@getAddEmployee',
    'as' => 'linkAddEmployee'
  //  'middleware' => 'auth'
]);

//routes for edit employee
Route::post('/addEditEmployee', [
    'uses' => 'EmployeeManagementController@postAddEditEmployee',
    'as' => 'addEditEmployee'
//    'middleware' => 'auth'
]);


//routes for calculate salary and etf/epf
Route::get('/linkCalcEPF_ETF', [
    'uses' => 'EmployeeManagementController@getCalcEPF_ETF',
    'as' => 'linkCalcEPF_ETF',
     'middleware' => 'auth'
]);

Route::get('/linkCalculateSalary', [
    'uses' => 'EmployeeManagementController@getCalcSalary',
    'as' => 'linkCalculateSalary',
    'middleware' => 'auth'
]);

Route::post('/calculateSalaryReport', [
    'uses' => 'EmployeeManagementController@postCalculateSalary',
    'as' => 'calculateSalaryReport'
//    'middleware' => 'auth'
]);

Route::group(['middleware' => ['web']], function () {


});

//Routes for StockManagementController
/*Route::post('/linkPaddyStock',[
    'uses'=>'StockManagementController@linkPaddyStock',
    'as'=>'linkStockExchange'
]);*/
Route::post('/linkUpdateStocks', [
    'uses' => 'StockManagementController@postUpdateStocks',
    'as' => 'linkUpdateStocks'
]);
Route::post('/linkPaddyStock', [
    'uses' => 'StockManagementController@postPaddyStock',
    'as' => 'linkPaddyStock'
]);
Route::post('/linkRiceStock', [
    'uses' => 'StockManagementController@postRiceStock',
    'as' => 'linkRiceStock'
]);
Route::post('/linkFlourStock', [
    'uses' => 'StockManagementController@postFlourStock',
    'as' => 'linkFlourStock'
]);
Route::post('/linkStockExchange', [
    'uses' => 'StockManagementController@postStockExchange',
    'as' => 'linkStockExchange'
]);

Route::get('/UpdateStocks', [
    'uses' => 'StockManagementController@getUpdateStocks',
    'as' => 'UpdateStocks',
    'middleware' => 'auth'
]);

Route::get('/PaddyStock', [
    'uses' => 'StockManagementController@getPaddyStock',
    'as' => 'PaddyStock',
    'middleware' => 'auth'
]);

Route::get('/RiceStock', [
    'uses' => 'StockManagementController@getRiceStock',
    'as' => 'RiceStock',
    'middleware' => 'auth'
]);

Route::get('/FlourStock', [
    'uses' => 'StockManagementController@getFlourStock',
    'as' => 'FlourStock',
    'middleware' => 'auth'
]);

Route::get('/StockExchange', [
    'uses' => 'StockManagementController@getStockExchange',
    'as' => 'StockExchange',
    'middleware' => 'auth'
]);
Route::get('/addPaddytoStock', [
    'uses' => 'StockManagementController@addPaddytoStock',
    'as' => 'addPaddytoStock',
    'middleware' => 'auth'
]);
Route::get('/paddyStocktoRiceMill', [
    'uses' => 'StockManagementController@getPaddyStocktoRiceMill',
    'as' => 'paddyStocktoRiceMill',
    'middleware' => 'auth'
]);
Route::get('/riceMilltoRiceStock', [
    'uses' => 'StockManagementController@getRiceMilltoRiceStock',
    'as' => 'riceMilltoRiceStock',
    'middleware' => 'auth'
]);
Route::get('/riceStocktoFlourMill', [
    'uses' => 'StockManagementController@getRiceStocktoFlourMill',
    'as' => 'riceStocktoFlourMill',
    'middleware' => 'auth'
]);
Route::get('/flourMilltoFlourStock', [
    'uses' => 'StockManagementController@getFlourMilltoFlourStock',
    'as' => 'flourMilltoFlourStock',
    'middleware' => 'auth'
]);
Route::get('/getFlourfromStock', [
    'uses' => 'StockManagementController@getFlourfromStock',
    'as' => 'getFlourfromStock',
    'middleware' => 'auth'
]);
//Routes for PaddyStockController
Route::post('/linkaddPaddy', [
    'uses' => 'PaddyStockController@addPaddy',
    'as' => 'linkaddPaddy'
]);
Route::post('/linkPaddyStocktoRiceMill', [
    'uses' => 'PaddyStockController@getPaddy',
    'as' => 'linkPaddyStocktoRiceMill'
]);

//Routes for RiceStockController
Route::post('/linkRiceMilltoRiceStock', [
    'uses' => 'RiceStockController@addRice',
    'as' => 'linkRiceMilltoRiceStock'
]);
Route::post('/linkRiceStocktoFlourMill', [
    'uses' => 'RiceStockController@getRice',
    'as' => 'linkRiceStocktoFlourMill'
]);
//Routes for FlourStockController
Route::post('/linkFlourMilltoFlourStock', [
    'uses' => 'FlourStockController@addFlour',
    'as' => 'linkFlourMilltoFlourStock'
]);
Route::post('/linkGetFlour', [
    'uses' => 'FlourStockController@getFlour',
    'as' => 'linkGetFlour'
]);

//Routes for OrderManagementController
Route::get('/orderManagement/purchasePaddy', [
    'uses' => 'OrderManagementController@getPurchasepaddyForm',
    'as' => 'purchasePaddyForm',
    'middleware' => 'auth'
]);
Route::get('/orderManagement/purchaseRice', [
    'uses' => 'OrderManagementController@getPurchaseRiceForm',
    'as' => 'purchaseRiceForm',
    'middleware' => 'auth'
]);
Route::get('/orderManagement/SellRice', [
    'uses' => 'OrderManagementController@getSellRiceForm',
    'as' => 'sellRiceForm',
    'middleware' => 'auth'
]);
Route::get('/orderManagement/SellFlour', [
    'uses' => 'OrderManagementController@getSellFlourForm',
    'as' => 'sellFlourForm',
    'middleware' => 'auth'
]);

Route::post('/OrderManagemet/PurchasePaddy', [
    'uses' => 'OrderManagementController@createPaddyPurchase',
    'as' => 'createPaddyPurchase',
    'middleware' => 'auth'
]);
Route::post('/orderManagement/PurchaseRice', [
    'uses' => 'OrderManagementController@createRicePurchase',
    'as' => 'createRicePurchase',
    'middleware' => 'auth'
]);
Route::post('/orderManagement/PurchasePaddyInvoice', [
    'uses' => 'OrderManagementController@createPaddyPurchaseInvoice',
    'as' => 'createPaddyPurchaseInvoice',
    'middleware' => 'auth'
]);
Route::post('/orderManagement/PurchaseRiceInvoice', [
    'uses' => 'OrderManagementController@createRicePurchaseInvoice',
    'as' => 'createRicePurchaseInvoice',
    'middleware' => 'auth'
]);
Route::post('/orderManagement/sellRice', [
    'uses' => 'OrderManagementController@createRiceOrder',
    'as' => 'createRiceOrder',
    'middleware' => 'auth'
]);
Route::post('/orderManagement/sellFlour', [
    'uses' => 'OrderManagementController@createFlourOrder',
    'as' => 'createFlourOrder',
    'middleware' => 'auth'
]);


// php artisan make:middelware DoctorMiddleware
// php aritisan make:middlelware NurseNiddleware

// Route::get('/test/'/ ' ')->middleware(['doctor', 'nurse']);