<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});








Route::resource('referrals', 'ReferralAPIController');

Route::resource('range_salaries', 'RangeSalaryAPIController');

Route::resource('identity_types', 'IdentityTypeAPIController');

Route::resource('provinces', 'ProvinceAPIController');

Route::resource('cities', 'CityAPIController');

Route::resource('sub_districts', 'SubDistrictAPIController');

Route::resource('urban_villages', 'UrbanVillageAPIController');

Route::resource('akads', 'AkadAPIController');

Route::resource('categories', 'CategoryAPIController');

Route::resource('banks', 'BankAPIController');

Route::resource('type_transactions', 'TypeTransactionAPIController');