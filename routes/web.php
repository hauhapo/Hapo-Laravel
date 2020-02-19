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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/search', 'MemberController@index')->name('members.search');
Route::get('/member', 'MemberController@index')->name('member');
Route::get('/member', 'MemberController@index')->name('members.update');
Route::resource('members', 'MemberController');
