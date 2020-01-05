<?php

use Illuminate\Http\Request;

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

// Route::get('/meme/all','HomeController@all');
// Route::get('/meme/id/{id}','HomeController@id');
// Route::get('/meme/page/{page}','HomeController@page');
// Route::get('/meme/popular','HomeController@popular');
// Route::get('/meme/create','HomeController@create');
// Route::post('/meme/save','HomeController@save');

Route::prefix('meme')->group(function () {
    Route::get('/', function () {
        return response()->json([
            "system" => "Welcome To our Impavid-Defects"
        ],200);
    });
    
    Route::get('all','ImagesController@all');
    Route::get('id/{id}','ImagesController@id');
    Route::get('page/{page}','ImagesController@page');
    Route::get('popular','ImagesController@popular');
    Route::get('create','ImagesController@create');
    Route::post('save','ImagesController@save');

});