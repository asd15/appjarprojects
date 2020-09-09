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


Route::get('/projects', 'ProjectController@index')->middleware('auth');
Route::get('/projects/create', 'ProjectController@create');
Route::post('/projects', 'ProjectController@store');
Route::get('/projects/{id}', 'ProjectController@show')->middleware('auth');
Route::delete('/projects/{id}', 'ProjectController@destroy')->middleware('auth');

Route::post('/emails/{id}', 'ProjectController@send')->middleware('auth');

Auth::routes([
    'register' => false
]);

Route::get('/home', 'HomeController@index')->name('home');
