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
    return view('welcome');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::prefix('members')->name('members.')->group(function() {
    Route::get('search', 'MemberController@index')->name('search');
});

Route::resource('members', 'MemberController', [
	'only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']
]);

Route::prefix('customer')->name('customer.')->group(function() {
	Route::get('search', 'CustomerController@index')->name('search');
});

Route::resource('customer', 'CustomerController', [
	'only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']
]);

Route::prefix('project')->name('project.')->group(function() {
	Route::get('search', 'ProjectController@index')->name('search');
});

Route::resource('project', 'ProjectController', [
	'only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']
]);

Route::prefix('status')->name('status.')->group(function() {
	Route::get('search', 'StatusController@index')->name('search');
});

Route::resource('status', 'StatusController', [
	'only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']
]);

Route::prefix('task')->name('task.')->group(function() {
	Route::get('search', 'TaskController@index')->name('search');
});

Route::resource('task', 'TaskController', [
	'only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']
]);