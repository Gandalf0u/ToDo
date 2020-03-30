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

Route::get('/', function () {
    return view('welcome');
});

/* Ajax Todolist */
Route::post('/electedtodolist', 'SelectedlistController')->name('selectedtodolist');

/* Ajax indicateur Notifications */
Route::get('/notifications-push', 'NotificationspushController@notifpush')->name('notifications-push');

/* Ajax liste notifications */
Route::get('/notifications', 'NotificationspushController@notifications')->name('notifications');

/* Ajax amis */
Route::get('/list_amis', 'TodolistController@amis')->name('list_amis');

/* Auth */
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::resource('/Todolist', 'TodoListController');
    Route::resource('/Amis', 'AmisController');
    Route::resource('/Sharedtodolist', 'SharedtodoListController');
    Route::resource('/Profil', 'ProfilController');


});


