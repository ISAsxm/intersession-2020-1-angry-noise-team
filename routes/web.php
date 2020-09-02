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

//Route::get('/test', 'TestController@test');
//Route::post('/test', 'TestController@testAxiosRouting');
Route::get('/test', 'ReportController@test');
Route::post('/test', 'ReportController@test');
Route::post('/getRepos', 'GitController@getUserRepositories');
Route::post('/cloneRepo', 'GitController@cloneRepository');
Route::post('/mail', 'ReportController@mail');
