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
    return view('backtemplate');
});

Route::resource('/department','DepartmentController');

Route::resource('/court','CourtController');

Route::resource('/lawyer','LawyerController');

Route::resource('/region','RegionController');

Route::resource('/law','LawController');

Route::resource('/chapter','ChapterController');

Route::resource('/detail','DetailController');



