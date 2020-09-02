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

Route::get('/parse', 'ReportController@test');
Route::post('/parse', 'ReportController@test');
Route::get('/mail', 'ReportController@mail');
Route::get('/mailTest', 'ReportController@mailTest');
Route::post('/getRepos', 'GitController@getUserRepositories');
Route::post('/cloneRepo', 'GitController@cloneRepository');
Route::get('/cloneRepo', 'GitController@cloneRepository');
