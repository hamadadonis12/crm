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

Route::get('/', 'HomeController@index');

Auth::routes(['register' => false]);

Route::middleware(['auth', 'is-active'])->group(function () {
	Route::get('/home', 'HomeController@index')->name('home');
	
	//Route::resource('clients', 'ClientController')->except(['show']);
	//Route::get('clients/{client}/{slug}', 'ClientController@show')->name('clients.show');

	Route::resource('clients', 'ClientController');
	Route::resource('packages', 'PackageController');
	Route::resource('users', 'UserController');
	Route::resource('countries', 'CountryController');
	Route::resource('cities', 'CityController');


	Route::get('sales', 'SalesController@index')->name('sales.index');
	Route::get('clients-export', 'ClientController@export')->name('clients.export');
	Route::get('clients-filter', 'ClientController@filter')->name('clients.filter');
	Route::post('clients-do-filter', 'ClientController@doFilter')->name('clients.doFilter');
	Route::get('clients/{client}/pdf', 'ClientController@pdf')->name('clients.pdf');
	
	Route::get('packages-export', 'PackageController@export')->name('packages.export');
	Route::get('packagers-filter', 'PackageController@filter')->name('packages.filter');
	Route::post('packagers-do-filter', 'PackageController@doFilter')->name('packages.doFilter');
	Route::get('packages/{package}/pdf', 'PackageController@pdf')->name('packages.pdf');
	Route::get('countries/{countryCode}/cities', 'PackageController@loadCities')->name('packages.countries.cities');

	Route::get('notifications', 'NotificationsController@index')->name('notifications.index');
}); 