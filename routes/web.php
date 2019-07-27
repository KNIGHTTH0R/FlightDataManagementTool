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

// Route::get('/', function () {
//     return view('welcome'); //redirect to /resouce/views/welcome.xxxxxx
// });
// Route::get('/search', 'SearchingController@index');
// Route::get('/getid/{ID}', 'SearchController@getID');
Route::resource('/', 'SearchingController');  // redirect to function create in searchingController
Route::resource('/summary/', 'summaryInfo');  // redirect to function create in searchingController