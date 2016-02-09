<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'FilterController@index');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::group(['prefix' => 'api'], function () {
        Route::resource('country.city', 'Country\CityController', ['only' => ['index', 'create', 'store']]);
        Route::resource('country.city.language', 'Country\City\LanguageController', ['only' => ['index']]);

        //Route::resource('city.country', 'City\CountryController');
        //Route::resource('city.country.language', 'Country\City\LanguageController');

        Route::resource('country', 'CountryController');
        Route::resource('city', 'CityController');
        Route::resource('language', 'LanguageController');
    });
    Route::get('/country', function () {
        return view('country');
    });
    Route::get('/city', function () {
        return view('city');
    });
    Route::get('/language', function () {
        return view('language');
    });
});
