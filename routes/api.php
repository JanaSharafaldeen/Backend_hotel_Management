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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::post('test','FrontApi@testing');
Route::post('contect_form','FrontApi@save_contect_query');
Route::post('subscribe','FrontApi@subscribe_user');
Route::get('get_service','FrontApi@get_service');
Route::post('room_booking_request','FrontApi@room_booking_request');
Route::get('get_room_type','FrontApi@get_room_type');
Route::get('get_feedback_type','FrontApi@get_feedback_type');
Route::post('save_feedback','FrontApi@save_feedback');
Route::post('signup','AuthController@signup');
Route::post('login','AuthController@login');

