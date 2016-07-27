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

Route::get('/removeCustomer', [
    'uses' => 'UserController@removeCustomer',
    'as' => 'removeCustomer',
    'middleware' => 'auth'
]);

Route::post('/deleteCustomer', [
    'uses' => 'UserController@postremoveCustomer',
    'as' => 'deleteCustomer',
    'middleware' => 'auth'
]);

Route::post('/linkEditCustomer', [
    'uses' => 'UserController@postEditCustomer',
    'as' => 'linkEditCustomer',
    'middleware' => 'auth'
]);

Route::post('/editCustomer', [
    'uses' => 'UserController@postSaveCustomer',
    'as' => 'editCustomer',
    'middleware' => 'auth'
]);

Route::get('/Supplier', [
    'uses' => 'UserController@getSupplier',
    'as' => 'Supplier',
    'middleware' => 'auth'
]);
Route::get('/removeSupplier', [
    'uses' => 'UserController@removeSupplier',
    'as' => 'removeSupplier',
    'middleware' => 'auth'
]);


Route::post('/deleteSupplier', [
    'uses' => 'UserController@postRemoveSupplier',
    'as' => 'deleteSupplier',
    'middleware' => 'auth'
]);


Route::post('/linkEditSupplier', [
    'uses' => 'UserController@postEditSupplier',
    'as' => 'linkEditSupplier',
    'middleware' => 'auth'
]);

Route::post('/editSupplier', [
    'uses' => 'UserController@postSaveSupplier',
    'as' => 'editSupplier',
    'middleware' => 'auth'
]);
//routes for financial management cheques

Route::get('/settledRecievable', [
    'uses' => 'ChequeManagementController@getSettledRecievableCheques',
    'as' => 'settledRecievable',
    'middleware' => 'auth'
]);

Route::get('/settledPayable', [
    'uses' => 'ChequeManagementController@getSettledPayableCheques',
    'as' => 'settledPayable',
    'middleware' => 'auth'
]);

Route::get('/nonSettledPayableCheque', [
    'uses' => 'ChequeManagementController@getNonSettledPayableCheques',
    'as' => 'nonSettledPayable',
    'middleware' => 'auth'
]);

Route::get('/nonSettledRecievable', [
    'uses' => 'ChequeManagementController@getNonSettledRecievableCheques',
    'as' => 'nonSettledRecievable',
    'middleware' => 'auth'
]);

Route::get('/returnedPayable', [
    'uses' => 'ChequeManagementController@getReturnedPayableCheques',
    'as' => 'returnedPayable',
    'middleware' => 'auth'
]);

Route::get('/returnedRecievable', [
    'uses' => 'ChequeManagementController@getReturnedRecievableCheques',
    'as' => 'returnedRecievable',
    'middleware' => 'auth'
]);
Route::post('/linkEditCheque', [
    'uses' => 'ChequeManagementController@postEditCheque',
    'as' => 'linkEditCheque',
    'middleware' => 'auth'


]);

Route::post('/linkEditReturn', [
    'uses' => 'ChequeManagementController@postEditReturn',
    'as' => 'linkEditReturn',
    'middleware' => 'auth'


]);
Route::post('editCheque', [
    'uses' => 'ChequeManagementController@editCheque',
    'as' => 'editCheque',
    'middleware' => 'auth'


]);

Route::get('/linkReturnPayable', [
    'uses' => 'ChequeManagementController@postViewReturnPayable',
    'as' => 'linkReturnPayable',
    'middleware' => 'auth'


]);


Route::get('/linkReturnRecievable', [
    'uses' => 'ChequeManagementController@postViewReturnRecievable',
    'as' => 'linkReturnRecievable',
    'middleware' => 'auth'


]);
//routes for business report
Route::get('/businessReport', [
    'uses' => 'FinancialManagementController@getBusinessReport',
    'as' => 'businessReport',
    'middleware' => 'auth'
]);

Route::post('submitDate', [
    'uses' => 'FinancialManagementController@postDate',
    'as' => 'submitDate',
    'middleware' => 'auth'

]);

Route::post('printReport', [
    'uses' => 'FinancialManagementController@getDate',
    'as' => 'printReport',
    'middleware' => 'auth'

]);


// Routes for employee management

//routes for marking attendance
Route::post('submitAttendance', [
    'uses' => 'EmployeeManagementController@postAttendance',
    'as' => 'submitAttendance',
    'middleware' => 'auth'

]);

Route::post('saveAttendance', [
    'uses' => 'EmployeeManagementController@postAttendance',
    'as' => 'saveAttendance',
    'middleware' => 'auth'

]);


Route::post('/linkAttendance', [
    'uses' => 'EmployeeManagementController@postMarkingAttendance',
    'as' => 'linkAttendance'
]);


Route::get('/viewAttendance',[
    'uses' => 'EmployeeManagementController@viewAttendance',
    'as' => 'viewAttendance',
    'middleware' => 'auth'
]);

Route::post('/submitDateAttendance', [
    'uses' => 'EmployeeManagementController@postviewAttendance',
    'as' => 'submitDateAttendance',
      'middleware' => 'auth'
]);


//routes for add employee
Route::get('/linkAddEmployee', [
    'uses' => 'EmployeeManagementController@getAddEmployee',
    'as' => 'linkAddEmployee',
    'middleware' => 'auth'
]);

//routes for edit employee
Route::post('/addEditEmployee', [
    'uses' => 'EmployeeManagementController@postAddEditEmployee',
    'as' => 'addEditEmployee',
    'middleware' => 'auth'
]);

//routes for search employee
Route::post('/searchForEmployee', [
    'uses' => 'EmployeeManagementController@postSearchEmployee',
    'as' => 'searchForEmployee',
    'middleware' => 'auth'
]);

//routes direct to search employee
Route::get('/linkSearchEmployee', [
    'uses' => 'EmployeeManagementController@getSearchEmployeeView',
    'as' => 'linkSearchEmployee',
    'middleware' => 'auth'
]);

//routes direct to edit employee
Route::post('/linkEditEmployee', [
    'uses' => 'EmployeeManagementController@getEditEmployee',
    'as' => 'linkEditEmployee',
    'middleware' => 'auth'
]);

//routes to edit employee
Route::post('/editEmployee', [
    'uses' => 'EmployeeManagementController@postEditSaveEmployee',
    'as' => 'editEmployee',
    'middleware' => 'auth'
]);

//routes direct to delete employee
Route::get('/linkDeleteEmployee', [
    'uses' => 'EmployeeManagementController@getDeleteEmployee',
    'as' => 'linkDeleteEmployee',
    'middleware' => 'auth'
]);

//routes to delete employee
Route::post('/deleteEmployee', [
    'uses' => 'EmployeeManagementController@postDeleteEmployee',
    'as' => 'deleteEmployee',
    'middleware' => 'auth'
]);

//routes for calculate salary and etf/epf
Route::get('/linkCalcEPF_ETF', [
    'uses' => 'EmployeeManagementController@getCalcEPF_ETF',
    'as' => 'linkCalcEPF_ETF',
    'middleware' => 'auth'
]);

//routes direct to calculate salary
Route::get('/linkCalculateSalary', [
    'uses' => 'EmployeeManagementController@getCalcSalary',
    'as' => 'linkCalculateSalary',
    'middleware' => 'auth'
]);

//routes to calculate salary
Route::post('/calculateSalaryReport', [
    'uses' => 'EmployeeManagementController@postCalculateSalary',
    'as' => 'calculateSalaryReport',
    'middleware' => 'auth'
]);

Route::group(['middleware' => ['web']], function () {


});

//Routes for StockManagementController

Route::post('/linkUpdateStocks', [
    'uses' => 'StockManagementController@postUpdateStocks',
    'as' => 'linkUpdateStocks',
    'middleware' => 'auth'
]);
Route::post('/linkPaddyStock', [
    'uses' => 'StockManagementController@postPaddyStock',
    'as' => 'linkPaddyStock',
    'middleware' => 'auth'
]);
Route::post('/linkRiceStock', [
    'uses' => 'StockManagementController@postRiceStock',
    'as' => 'linkRiceStock',
    'middleware' => 'auth'
]);
Route::post('/linkFlourStock', [
    'uses' => 'StockManagementController@postFlourStock',
    'as' => 'linkFlourStock',
    'middleware' => 'auth'
]);
Route::post('/linkStockExchange', [
    'uses' => 'StockManagementController@postStockExchange',
    'as' => 'linkStockExchange',
    'middleware' => 'auth'
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
Route::get('/getPaddyRiceStockExchange', [
    'uses' => 'StockManagementController@getPaddyRiceStockExchange',
    'as' => 'getPaddyRiceStockExchange',
    'middleware' => 'auth'
]);
Route::get('/getRiceFlourStockExchange', [
    'uses' => 'StockManagementController@getRiceFlourStockExchange',
    'as' => 'getRiceFlourStockExchange',
    'middleware' => 'auth'
]);
Route::post('/PaddyRiceStockExchange', [
    'uses' => 'StockManagementController@PaddyRiceStockExchange',
    'as' => 'PaddyRiceStockExchange',
    'middleware' => 'auth'
]);
Route::post('/RiceFlourStockExchange', [
    'uses' => 'StockManagementController@RiceFlourStockExchange',
    'as' => 'RiceFlourStockExchange',
    'middleware' => 'auth'
]);
//Routes for PaddyStockController
Route::post('/linkaddPaddy', [
    'uses' => 'PaddyStockController@addPaddy',
    'as' => 'linkaddPaddy',
    'middleware' => 'auth'
]);
Route::post('/linkPaddyStocktoRiceMill', [
    'uses' => 'PaddyStockController@getPaddy',
    'as' => 'linkPaddyStocktoRiceMill',
    'middleware' => 'auth'
]);

//Routes for RiceStockController
Route::post('/linkRiceMilltoRiceStock', [
    'uses' => 'RiceStockController@addRice',
    'as' => 'linkRiceMilltoRiceStock',
    'middleware' => 'auth'
]);
Route::post('/linkRiceStocktoFlourMill', [
    'uses' => 'RiceStockController@getRice',
    'as' => 'linkRiceStocktoFlourMill',
    'middleware' => 'auth'
]);
//Routes for FlourStockController
Route::post('/linkFlourMilltoFlourStock', [
    'uses' => 'FlourStockController@addFlour',
    'as' => 'linkFlourMilltoFlourStock',
    'middleware' => 'auth'
]);
Route::post('/linkGetFlour', [
    'uses' => 'FlourStockController@getFlour',
    'as' => 'linkGetFlour',
    'middleware' => 'auth'
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
Route::post('/orderManagement/RiceOrderReceipt', [
    'uses' => 'OrderManagementController@createRiceOrderReceipt',
    'as' => 'createRiceOrderReceipt',
    'middleware' => 'auth'
]);
Route::post('/orderManagement/FlourOrderReceipt', [
    'uses' => 'OrderManagementController@createFlourOrderReceipt',
    'as' => 'createFlourOrderReceipt',
    'middleware' => 'auth'
]);

//////////////////////////////////
Route::get('/orderManagement/SettledPurchases', [
    'uses' => 'OrderManagementController@getSettledPurchases',
    'as' => 'settledPurchases',
    'middleware' => 'auth'
]);
Route::get('/orderManagement/NonSettledPurchases', [
    'uses' => 'OrderManagementController@getNonSettledPurchases',
    'as' => 'nonSettledPurchases',
    'middleware' => 'auth'
]);
Route::get('/orderManagement/SettledOrders', [
    'uses' => 'OrderManagementController@getSettledOrders',
    'as' => 'settledOrders',
    'middleware' => 'auth'
]);

Route::get('/orderManagement/NonSettledOrders', [
    'uses' => 'OrderManagementController@getNonSettledOrders',
    'as' => 'nonSettledOrders',
    'middleware' => 'auth'
]);

Route::get('/orderManagement/showSettledPurchases/{purchase}', [
    'uses' => 'OrderManagementController@showSettledPurchases',
    'as' => 'showSettledPurchases',
    'middleware' => 'auth'
]);
Route::get('/orderManagement/showNonSettledPurchases/{purchase}', [
    'uses' => 'OrderManagementController@showNonSettledPurchases',
    'as' => 'showNonSettledPurchases',
    'middleware' => 'auth'
]);
Route::get('/orderManagement/showSettledOrders/{order}', [
    'uses' => 'OrderManagementController@showSettledOrders',
    'as' => 'showSettledOrders',
    'middleware' => 'auth'
]);
Route::get('/orderManagement/showNonSettledOrders/{order}', [
    'uses' => 'OrderManagementController@showNonSettledOrders',
    'as' => 'showNonSettledOrders',
    'middleware' => 'auth'
]);

Route::post('/orderManagement/settlePurchase', [
    'uses' => 'OrderManagementController@settlePurchase',
    'as' => 'settlePurchase',
    'middleware' => 'auth'
]);
Route::post('/orderManagement/NonSettledPurchases', [
    'uses' => 'OrderManagementController@getNonSettledPurchases',
    'as' => 'nonSettledPurchases2',
    'middleware' => 'auth'
]);
Route::post('/orderManagement/settleOrder', [
    'uses' => 'OrderManagementController@settleOrder',
    'as' => 'settleOrder',
    'middleware' => 'auth'
]);
// php artisan make:middelware DoctorMiddleware
// php aritisan make:middlelware NurseNiddleware

// Route::get('/test/'/ ' ')->middleware(['doctor', 'nurse']);