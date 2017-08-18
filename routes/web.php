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
//     return view('welcome');
// });

// Route::get('/home', function() {
//     return view('home');
// });


Auth::routes();

Route::get('/search', 'ReservationController@search');
Route::get('/', 'HomeController@index');

Route::get('user/{id}', 'UserController@show');
Route::get('user/{id}/edit', 'UserController@edit');
Route::put('user/{id}', 'UserController@update');

Route::resource('room', 'RoomController');
// Route::get('/room/{id}/{city}{start_date}{end_date}{person}', [
//   'as' => 'RoomSearch',
//   'uses' => 'ReservationController@RoomSearch'
// ]);
// Route::get('user/{itd}/room', 'RoomController@show');
Route::get('booking', 'BookingController@create');
Route::post('booking', 'BookingController@store');

Route::get('booking/payment', 'BookingController@payment');

Route::get('user/{id}/booking', 'BookingController@show');

Route::get('user/{id}/reservation', 'ReservationController@show');
Route::post('user/{id}/reservation', 'ReservationController@confirmation');
Route::get('/about', 'OtherController@about');
