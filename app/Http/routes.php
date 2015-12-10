<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => '/api'], function(){

   Route::group(['prefix' => '/apparel'], function(){
       Route::post('/create','ApparelAPIController@createApparel');
       Route::get('/get-all','ApparelAPIController@getAllApparel');
       Route::post('/get','ApparelAPIController@getApparel');
       Route::post('/get-by-ref','ApparelAPIController@getApparelByRef');
       Route::post('/update','ApparelAPIController@updateApparel');
       Route::post('/delete','ApparelAPIController@deleteApparel');
   });

   Route::group(['prefix' => '/spells'], function(){
       Route::post('/create','SpellsAPIController@createSpell');
       Route::get('/get-all','SpellsAPIController@getAllSpells');
       Route::post('/get','SpellsAPIController@getSpell');
       Route::post('/get-by-ref','SpellsAPIController@getSpellByRef');
       Route::post('/update','SpellsAPIController@updateSpell');
       Route::post('/delete','SpellsAPIController@deleteSpell');
   });

   Route::group(['prefix' => '/weapons'], function(){
       Route::post('/create','WeaponsAPIController@createWeapon');
       Route::get('/get-all','WeaponsAPIController@getAllWeapons');
       Route::post('/get','WeaponsAPIController@getWeapon');
       Route::post('/get-by-ref','WeaponsAPIController@getWeaponByRef');
       Route::post('/update','WeaponsAPIController@updateWeapon');
       Route::post('/delete','WeaponsAPIController@deleteWeapon');
   });

   Route::group(['prefix' => '/reviews'], function(){
       Route::post('/create','ReviewsAPIController@createReview');
       Route::get('/get-all','ReviewsAPIController@getAllReviews');
       Route::post('/get','ReviewsAPIController@getReview');
       Route::post('/get-by-ref','ReviewsAPIController@getReviewByRef');
       Route::post('/update','ReviewsAPIController@updateReview');
       Route::post('/delete','ReviewsAPIController@deleteReview');
   });

   Route::group(['prefix' => '/user'], function(){
       Route::post('/create','UserAPIController@createUser');
       Route::get('/get-all','UserAPIController@getUser');
       Route::post('/get','UserAPIController@getAllUsers');
       Route::post('/change-password','UserAPIController@changePassword');
       Route::post('/login','UserAPIController@loginUser');
   });
});
