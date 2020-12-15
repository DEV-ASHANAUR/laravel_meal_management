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

Auth::routes();


Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    //manage user route
    Route::group(['prefix' => 'users'], function () {
        Route::get('/view', 'Backend\UserController@view')->name('users.view');
        Route::get('/show/{id}', 'Backend\UserController@show')->name('users.show');
        Route::get('/add', 'Backend\UserController@add')->name('users.add');
        Route::post('/store', 'Backend\UserController@store')->name('users.store');
        Route::get('/edit/{id}', 'Backend\UserController@edit')->name('users.edit');
        Route::post('/update/{id}', 'Backend\UserController@update')->name('users.update');
        Route::post('/delete', 'Backend\UserController@delete')->name('users.delete');
    });
    // manage profile route
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/view', 'Backend\ProfileController@view')->name('profile.view');
        Route::get('/edit', 'Backend\ProfileController@edit')->name('profile.edit');
        Route::post('/update', 'Backend\ProfileController@update')->name('profile.update');
        Route::get('/pass/view', 'Backend\ProfileController@passview')->name('profile.pass.view');
        Route::post('/pass/change', 'Backend\ProfileController@passchange')->name('profile.pass.change');
    });
    //manage mess
    Route::group(['prefix' => 'mess'], function () {
        Route::get('/create','Backend\MessController@index')->name('mess.create');
        Route::post('/store','Backend\MessController@store')->name('mess.store');
        Route::get('/show','Backend\MessController@show')->name('mess.show');
        Route::get('/edit','Backend\MessController@edit')->name('mess.edit');
        Route::post('/update','Backend\MessController@update')->name('mess.update');
        Route::get('/delete','Backend\MessController@delete')->name('mess.delete');
    });
    //manage meal
    Route::group(['prefix' => 'meal'], function () {
        Route::get('/view','Backend\MealController@index')->name('meal.view');
        Route::get('/show','Backend\MealController@show')->name('meal.show');
        Route::get('/create','Backend\MealController@create')->name('meal.create');
        Route::post('/store','Backend\MealController@store')->name('meal.store');
        Route::get('/edit/{date}','Backend\MealController@edit')->name('meal.edit');
        Route::post('/update','Backend\MealController@update')->name('meal.update');
        Route::get('/delete/{date}','Backend\MealController@delete')->name('meal.delete');

    });
    
});    