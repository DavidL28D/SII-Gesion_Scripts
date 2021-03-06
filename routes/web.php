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

Route::get('/', function () {
    return view('home');
});

Route::get('/contacto', function () {
    return view('contact');
});

Route::get('/acerca', function () {
    return view('about');
});

Route::resource('languages', 'LanguageController');
Route::resource('companies', 'CompanyController');
Route::resource('sos', 'SoController');
Route::resource('resources', 'ResourceController');
Route::resource('scripts', 'ScriptController');