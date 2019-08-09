<?php
use LaravelSample\Http\Middleware\HelloMiddleware;

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

Route::namespace('Sample')->group(function() {
    Route::get('/sample', 'SampleController@index');
    Route::get('/sample/other', 'SampleController@other');
});

Route::middleware([HelloMiddleware::class])->group(function() {
    Route::get('/hello', 'HelloController@index')->name('test');
    Route::get('/hello/user/{id}', 'HelloController@user')->where('id', '[0-9]+');
    Route::get('/hello/bye', 'HelloController@bye');
    Route::get('/hello/other', 'HelloController@other');
    Route::get('/hello/person/{person}', 'HelloController@person');
});

Route::get('/user', 'UserController@index');
Route::get('/user/create', 'UserController@create');
Route::get('/user/edit/{id}', 'UserController@edit');
Route::post('/user/store', 'UserController@store');
Route::post('/user/update/{id}', 'UserController@update');
Route::post('/user/destroy/{id}', 'UserController@destroy');