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


if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}



Route::get('/services','PagesController@services');

Route::get('/', 'PagesController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('User','UserController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/doctor','ProfessorsController');

Route::resource('/admin','AdminController');

Route::get('/courses','AdminController@courses');

Route::get('/admins','AdminController@admins');

Route::get('/professors','AdminController@professors');

// Route::post('/student','AdminController@storeStudent');

// Route::get('/create/student','AdminController@createStudent');

Route::get('qr-code-g','QrCodeController@qrGenerator');

  Route::post('/assign/course/{courseId}','AdminController@assignCourse');
