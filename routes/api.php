<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::ApiResource('/department','Api\DepartmentController');

Route::ApiResource('/court','Api\CourtController');

Route::ApiResource('/lawyer','Api\LawyerController');

Route::ApiResource('/chapter','Api\ChapterController');

Route::ApiResource('/region','Api\RegionController');

Route::ApiResource('/law','Api\LawController');

Route::ApiResource('/detail','Api\DetailController');

Route::get('/filterByLawId','Api\LawController@filterByLawId');

Route::get('/filterByRegionId','Api\LawController@filterByRegionId');

Route::get('/searchChapterbyId','Api\ChapterController@searchChapterbyId');

Route::get('/detaillaw','Api\DetailController@detaillaw');