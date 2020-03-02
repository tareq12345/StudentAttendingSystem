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


// Route::get('/hello',function(){
//     return "hello world";
// });
// Route::get('/users/{id}/{name}',function($id,$name){
//     return "this user id is ".$id." and name is ".$name;
// });



Route::get('/services','PagesController@services');

Route::get('/', 'PagesController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('User','UserController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/doctor','UserController@index');