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
  return redirect('home');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');



Route::resource('articles', 'ArticleController');



Route::resource('articles', 'ArticleController');



Route::resource('articles', 'ArticleController');

Route::resource('articles', 'ArticleController');







Route::resource('comments', 'CommentController');







Route::resource('referrals', 'ReferralController');

Route::resource('rangeSalaries', 'RangeSalaryController');



Route::resource('provinces', 'ProvinceController');

Route::resource('cities', 'CityController');

Route::resource('subDistricts', 'SubDistrictController');

Route::resource('urbanVillages', 'UrbanVillageController');

Route::resource('akads', 'AkadController');

Route::resource('categories', 'CategoryController');

Route::resource('banks', 'BankController');

Route::resource('typeTransactions', 'TypeTransactionController');

















Route::resource('identityTypes', 'IdentityTypeController');



Route::resource('borrowers', 'BorrowerController');







Route::resource('campaigns', 'CampaignController');







Route::resource('lends', 'LendController');



Route::resource('investments', 'InvestmentController');





Route::resource('dtTransactions', 'DtTransactionController');



Route::resource('bankAccounts', 'BankAccountController');

Route::resource('transactions', 'TransactionController');