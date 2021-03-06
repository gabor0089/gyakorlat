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

Route::get('/','QuestionsController@indexall');

Auth::routes();

Route::post('/tip','TipsController@store');
Route::post('/answer','AnswersController@store');
Route::get('/home','HomeController@index')->name('show');
Route::get('/q/{question}','QuestionsController@show');
Route::get('/question/create','QuestionsController@create');
Route::get('/question/all','QuestionsController@indexall');
Route::post('/question','QuestionsController@store');
Route::get('/question/{question}', 'QuestionsController@index')->name('show');
