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

Route::get('/', function (){
    return view('dashboard');
})->name('dashboard');
Route::get('/jobs', 'JobController@index')->name('jobs.index');
Route::get('/jobs/create', 'JobController@create')->name('jobs.create');
Route::post('/jobs', 'JobController@store')->name('jobs.store');
Route::get('/jobs/{job}', 'JobController@show')->name('jobs.show');
Route::get('/jobs/{job}/edit', 'JobController@edit')->name('jobs.edit');
Route::patch('/jobs/{job}', 'JobController@update')->name('jobs.update');
Route::delete('/jobs/{job}','JobController@destroy')->name('jobs.destroy');
Route::get('/jobs/verify/{token}', 'JobController@verify')->name('jobs.verify');
