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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['prefix'=>'users'],function(){ 
    Route::post('register','UserController@register');
    Route::post('login','UserController@login');
    Route::get('me','UserController@me');
    Route::get('logout','UserController@logout'); 
});

Route::group(['prefix'=>'category'],function(){  
    Route::post('register','CategoryController@register');
    Route::post('remove','CategoryController@remove');  
});

Route::group(['prefix'=>'products'],function(){ 
    Route::post('register','ProductController@register');
   
});


