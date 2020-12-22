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
use App\Member;

Route::get('/' ,'NoticeController@show');


Route::get('/dashboard', 'HomeController@index');
Auth::routes();


Route::get('logout', 'Auth\LoginController@logout')->name('logout');



View::composer(['*'], function ($view) {

    $members=Member::get();


    $view->with('active_users',$members);
});
/*===============   Under work    ===================*/

Route::get('test', function () {
    return "This Page is under development " ;
})->name("test.test");
/*===============   Admin    ===================*/
Route::resource('user' ,'UserController');
Route::get('change-status/{id}', 'UserController@change_status');
Route::get('change-status/{id}', 'UserController@change_status');
Route::get('/delete/{id}', 'UserController@delete');
Route::post('change-pass', 'UserController@change_pass');


/*== Board of director==*/
Route::get('director/index','DirectorController@index' )->name('director.index');
Route::get('director/delete/{id}','DirectorController@delete' )->name('director.delete');
Route::post('director/edit','DirectorController@edit' )->name('director.edit');
Route::post('director/update','DirectorController@update' )->name('director.update');
Route::get('director/create','DirectorController@create' )->name('director.create');
Route::post('director/store','DirectorController@store' )->name('director.store');
Route::post('director/pdf','DirectorController@director_pdf')->name('director.pdf');


/*==Board of Advisor==*/
Route::get('advisor/index','AdvisorController@index' )->name('advisor.index');
Route::get('advisor/delete/{id}','AdvisorController@delete' )->name('advisor.delete');
Route::post('advisor/edit','AdvisorController@edit' )->name('advisor.edit');
Route::post('advisor/update','AdvisorController@update' )->name('advisor.update');
Route::get('advisor/create','AdvisorController@create' )->name('advisor.create');
Route::post('advisor/store','AdvisorController@store' )->name('advisor.store');
Route::post('advisor/pdf','AdvisorController@director_pdf')->name('advisor.pdf');


/*===============   Notice   ===================*/
Route::get('/notice/create' ,'NoticeController@create')->name('Notice.create');
Route::post('/notice/store' ,'NoticeController@store')->name('Notice.store');
Route::get('/notice/index', 'NoticeController@index')->name('Notice.show');
Route::get('/notice/delete/{id}' ,'NoticeController@destroy')->name('Notice.delete');
Route::get('/notice/edit/{id}' ,'NoticeController@edit')->name('Notice.edit');


Route::get('application' ,'NoticeController@download')->name("app.download");
/* ===== android app download
/* Route::get('application', function () {


   /*  if (file_exists($file_path))
    {
        // Send Download
        return Response::download($file_path, $filename, [
            'Content-Length: '. filesize($file_path)
        ]);
    }
    else
    {
        // Error
        exit('Requested file does not exist on our server!');
    }
    return redirect()->back();
});

 */


/*===============   Member   ===================*/
Route::resource('member' ,'MemberController');
Route::post('member/delete','MemberController@destroy')->name('member.del');

/*===============   Cash In   ===================*/
Route::get('cash-in', 'CashInController@index')->name('cash_in.index');
Route::post('cash_in/update', 'CashInController@update')->name('cash_in.update');
Route::get('cash-in/create', 'CashInController@create');
Route::get('cash-in/edit-delete', 'CashInController@edit_delete');
Route::get('cash-in/delete/{id}', 'CashInController@destroy');

Route::post('cash-in/store', 'CashInController@store');

Route::post('cash-in/generate', 'CashInController@generate');
Route::post('cash-in/edit-delete/generate', 'CashInController@edit_delete_generate');
Route::post('cash-in/edit', 'CashInController@edit')->name('cash_in.edit');


/*===============   Cash Out   ===================*/
Route::get('cash-out', 'CashOutController@index')->name('cash_out.index');
Route::get('cash-out/create', 'CashOutController@create');
Route::get('cash-out/edit-delete', 'CashOutController@edit_delete');
Route::post('cash-out/store', 'CashOutController@store');

Route::post('cash-out/generate', 'CashOutController@generate');
Route::post('cash-out/edit-delete/generate', 'CashOutController@edit_delete_generate');
Route::post('cash-out/edit', 'CashOutController@edit')->name('cash_out.edit');
Route::get('cash-out/delete/{id}', 'CashOutController@destroy');
Route::post('cash_out/update', 'CashOutController@update')->name('cash_out.update');

/*===============   Reports   ===================*/
Route::get('/reports/create', 'ReportController@create');
Route::get('/reports/member_search', 'ReportController@search');
Route::post('/reports/show', 'ReportController@show')->name('member_report.show');

Route::post('reports', 'ReportController@index');
Route::post('reports-pdf', 'ReportController@reports_pdf');
Route::post('report-pdf', 'ReportController@report_pdf');
Route::get('/yearly_report' ,'ReportController@yearly_report')->name('report.yearly');
Route::post('/yearly_report/genereate','ReportController@yearly_report_generate')->name('report.yearly_generate');
Route::post('/yearly_report/pdf','ReportController@yearly_pdf')->name('yearly.pdf');



/*===============   Investments   ===================*/
Route::get('/investments', 'InvestmentController@index');
Route::get('/investments/create', 'InvestmentController@create');
Route::post('/investments/store', 'InvestmentController@store');

/*===============   Bank Balance   ===================*/
Route::get('/bank-balance', 'BankBalanceController@index');
Route::get('/bank-balance/edit', 'BankBalanceController@edit');
Route::post('/bank-balance/update', 'BankBalanceController@update');


/*===============   Others   ===================*/
Route::get('/others/number_list', 'OthersController@number_show')->name('others.number');
Route::post('/others/number_list/edit', 'OthersController@number_edit')->name('others.number_edit');
Route::post('/others/number_list/pdf', 'OthersController@number_pdf')->name('others.number_pdf');
Route::get('/others/blood_group_list', 'OthersController@blood_group_show')->name('others.blood_group');
Route::post('/others/blood_group_list/edit', 'OthersController@blood_group_edit')->name('others.blood_group_edit');
Route::post('/others/blood_group_list/pdf', 'OthersController@blood_group_pdf')->name('others.blood_pdf');
Route::get('/others/bday_list', 'OthersController@bday_show')->name('others.bday');
Route::post('/others/bday_list/edit', 'OthersController@bday_edit')->name('others.bday_edit');
Route::post('/others/bday_list/pdf', 'OthersController@bday_pdf')->name('others.bday_pdf');
