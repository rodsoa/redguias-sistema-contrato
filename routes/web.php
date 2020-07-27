<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', function() {
    return redirect('home');
});

/* Users Routes */
Route::resource('users', 'UsersController')->middleware('auth');

/* Customers Routes */
Route::post('customers/store-and-create-contract', 'CustomersController@storeAndCreateNewAgreement')->middleware('auth');
Route::resource('customers', 'CustomersController')->middleware('auth');

/* Agreements Routes */
Route::get('agreements/{agreement}/download', 'AgreementsController@download')->name('agreements.download')->middleware('auth');
Route::get('agreements/{agreement}/renew', 'AgreementsController@renew')->name('agreements.renew')->middleware('auth');
Route::resource('agreements', 'AgreementsController')->middleware('auth');


Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Auth::routes();
Route::get('/logout', 'HomeController@logout')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
