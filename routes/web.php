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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/searchFlights', 'HomeController@searchFlights')->name('searchFlights');
Route::get('/autocomplete-airports', 'HomeController@autocompleteAirports')->name('autocomplete.airports');
Route::get('/getAirports','HomeController@searchAirports')->name('getAirports');
Route::get('/updateCity', 'HomeController@updateCity')->name('updateCity');
Route::get('/hotelView','HomeController@hotelView')->name('hotelView');
Route::get('/autocomplete-hotels', 'HomeController@autocompleteHotels')->name('autocomplete.hotels');
Route::get('/hotelSearch', 'HomeController@hotelSearch')->name('hotelSearch');
Route::post('/allHotelPage', 'HomeController@allHotelPage')->name('allHotelPage');
Route::get('/searchHotelPost', 'HomeController@searchHotelPost')->name('searchHotelPost');
Route::post('/bookingRequest', 'HomeController@bookingRequest')->name('bookingRequest');
Route::get('/carView','HomeController@carView')->name('carView');
Route::post('/carBooking', 'HomeController@carBooking')->name('carBooking');
