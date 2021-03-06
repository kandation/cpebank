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

Route::get('/', 'CustomerIndexController@index');
Route::group(['middleware' => ['role:officer']], function () {
    //

    /* --- Older Route Dont use ------*/
    Route::get('/admin', 'AdminIndexController@index');
    Route::get('/admin/hq', 'AdminHQController@index');
    Route::get('/admin/hq/add', 'AdminHQController@add_show');
    Route::post('/admin/hq/add', 'AdminHQController@add');
    Route::get('/admin/hq/show', 'AdminHQController@hq_show');
    Route::match(['get', 'post'], '/admin/hq/edit', 'AdminHQController@edit');
    Route::match(['get', 'post'], '/admin/hq/edit/send', 'AdminHQController@edit_send');
    Route::post('/admin/hq/delete', 'AdminHQController@delete');
    Route::get('/admin/branch', 'AdminBranchController@index');


    Route::get('/admin/branch/show', 'AdminBranchController@show');
    Route::match(['get', 'post'], '/admin/branch/add', 'AdminBranchController@add');
    Route::match(['get', 'post'], '/admin/branch/edit', 'AdminBranchController@edit');
    Route::match(['get', 'post'], '/admin/branch/edit/send', 'AdminBranchController@edit_send');
    Route::post('/admin/branch/delete', 'AdminBranchController@delete');

    /* --- END Older Route Dont use ---- */


    Route::get('/admin/transaction', 'AdminTransactionController@index');
//    Route::get('/admin/loan', 'AdminLoanController@loan');
    Route::get('/admin/user', 'AdminUserController@index');
    Route::get('/admin/promotion', 'AdminIndexController@test6');
    Route::get('/admin/todo', 'AdminIndexController@test7');



    Route::get('/admin/promotion/manage', 'AdminIndexController@promotion');
    Route::post('/admin/promotion/del', 'AdminIndexController@promotion_del');
    Route::post('/admin/promotion/add', 'AdminIndexController@promotion_add');

    Route::get('/admin/todolist', 'AdminTodolistController@todolist');
    Route::post('/admin/todolist/del', 'AdminTodolistController@todolist_del');
    Route::post('/admin/todolist/add', 'AdminTodolistController@todolist_add');
    Route::post('/admin/todolist/edit', 'AdminTodolistController@todolist_edit');

//    Route::post('/admin/loan/add', 'AdminLoanController@add');
//    Route::post('/admin/loan/del', 'AdminLoanController@del');

    Route::get('/admin/loan', 'AdminLoanController@loan');
    Route::get('/admin/loanshow', 'AdminLoanController@showloan');
    Route::post('/admin/loan/add', 'AdminLoanController@loan_add');
    Route::post('/admin/loan/del', 'AdminLoanController@loan_del');
    Route::post('/admin/loan/edit', 'AdminLoanController@loan_edit');
    //Route::post('/admin/loan/edit_send', 'AdminLoanController@loan_edit_send');

    Route::get('/admin/asset', 'AdminAssetController@asset');
    Route::post('/admin/asset/add', 'AdminAssetController@asset_add');
    Route::post('/admin/asset/del', 'AdminAssetController@asset_del');


    Route::get('/admin/report', 'AdminReportController@report');
    Route::get('/admin/showreport', 'AdminReportController@showreport');
    Route::post('/admin/report/del', 'AdminReportController@report_del');
    Route::post('/admin/report/add', 'AdminReportController@report_add');

    Route::get('/admin/events', 'AdminEventController@index');

    Route::get('/admin/tracker', 'AdminTrackerController@tracker');
    Route::post('/admin/tracker/add', 'AdminTrackerController@add');
    Route::post('/admin/tracker/del', 'AdminTrackerController@del');
    
    Route::get('/admin/customer', 'AdminIndexController@customerDetail');
    Route::post('/admin/customer/request', 'AdminIndexController@customerDetailRequest');


    /*--- Admin User manage ---*/
    Route::get('/admin/user/show', 'AdminUserController@show');
    Route::get('/admin/user/pwd-print', 'AdminUserController@printpwd');
    Route::match(['get', 'post'], '/admin/user/pwd-reset', 'AdminUserController@reset_pwd');
    Route::match(['get', 'post'], '/admin/user/add', 'AdminUserController@add');
    Route::match(['get', 'post'], '/admin/user/edit', 'AdminUserController@edit');
    Route::match(['get', 'post'], '/admin/user/edit/send', 'AdminUserController@edit_send');
    Route::post('/admin/user/delete', 'AdminUserController@delete');


    /* --- Admin Officer Manage ---*/
    Route::get('/admin/user/officer', 'AdminOfficerController@index');
    Route::get('/admin/user/officer/show', 'AdminOfficerController@show');
    Route::post('/admin/user/officer/add', 'AdminOfficerController@add');
    Route::post('/admin/user/officer/delete', 'AdminOfficerController@delete');


    /* --- Admin Customer Manage ---*/
    Route::get('/admin/user/customer', 'AdminUserCustomerController@index');
    Route::get('/admin/user/customer/show', 'AdminUserCustomerController@show');
    Route::post('/admin/user/customer/add', 'AdminUserCustomerController@add');
    Route::post('/admin/user/customer/delete', 'AdminUserCustomerController@delete');

    /* --- Admin Transcript Manage ---*/
    Route::match(['get', 'post'], '/admin/transaction/deposit', 'AdminTransactionController@deposit');
    Route::match(['get', 'post'], '/admin/transaction/check', 'AdminTransactionController@check');
    Route::match(['get', 'post'], '/admin/transaction/draw', 'AdminTransactionController@draw');
    Route::match(['get', 'post'], '/admin/transaction/transfer', 'AdminTransactionController@transfer');


    /* --- Customer Info -----*/
    Route::get('/admin/customer', 'AdminIndexController@customerDetail');
    Route::post('/admin/customer/request', 'AdminIndexController@customerDetailRequest');


});

/*---------- Customer only use -------------*/
Route::group(['middleware' => ['role:customer']], function () {
    Route::get('/customer/test', function (){
        return 'test';
    });

    Route::get('/customer/loan', 'CustomerLoanController@index');
});




Route::get('test', function () {
    return view('customer.login');
});

/*---- Authen System -----*/
Route::get('/login', 'AuthenLoginController@index');
Route::post('/login', 'AuthenLoginController@authen');
Route::match(['get', 'post'], '/reset', 'AuthenLoginController@reset');
Route::get('/reset/email', 'AuthenLoginController@reset_email');
Route::get('/reset/auth@{token}', 'AuthenLoginController@reset_auth');
Route::match(['get', 'post'],'/reset/auth', 'AuthenLoginController@reset_auth_form');
Route::get('/logout', 'AuthenLoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');



Route::get('/customer/sendIssue', 'CustomerController@sendIssue');
Route::post('/customer/sendIssue', 'CustomerController@saveIssue');

Route::get('/customer/promotion', 'CustomerController@viewPromotion');
Route::get('/customer/balance', 'CustomerController@showBalance');
