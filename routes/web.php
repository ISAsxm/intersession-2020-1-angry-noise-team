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
Route::get('/exist', 'ReportController@isRepo');
Route::post('/getRepos','ReportController@getUserRepositories');//TODO create Repo controller or User controller
Route::get('/cloneRepo','ReportController@getUserRepository');//TODO create Repo controller or User controller
Route::post('/mail', 'ReportController@mail');
