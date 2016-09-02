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

// auth route
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('/auth/github', 'Auth\SocialLoginController@githubLogin');
Route::get('/github/callback', 'Auth\SocialLoginController@githubCallback');
Route::get('/auth/twitter', 'Auth\SocialLoginController@twitterLogin');
Route::get('/twitter/callback', 'Auth\SocialLoginController@twitterCallback');
Route::get('/auth/google', 'Auth\SocialLoginController@googleLogin');
Route::get('/google/callback', 'Auth\SocialLoginController@googleCallback');

Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::group(['middleware' => 'auth'], function(){

    Route::get('/favorites', 'FavoriteController@index');
    Route::post('/favorite', 'FavoriteController@store');
    Route::delete('/favorite/{favorite}', 'FavoriteController@destroy');

    Route::get('/playlists', 'PlaylistController@index');
    Route::get('/my-playlists', 'PlaylistController@myPlaylists');
    Route::post('/playlist', 'PlaylistController@store');
    Route::put('/playlist/{playlist}', 'PlaylistController@update');
    Route::put('/playlist/{playlist}/like', 'PlaylistController@like');
    Route::delete('/playlist/{playlist}', 'PlaylistController@destroy');

    Route::get('/playlist/{playlist}/songs', 'SongController@index');
    Route::post('/song', 'SongController@store');
    Route::delete('/song/{song}', 'SongController@destroy');
    Route::put('/song/{song}/like', 'SongController@like');

    Route::get('/user/{user}', 'UserController@index');
    Route::get('/users', 'UserController@userList');

    Route::post('/follow', 'FollowController@follow');
});

Route::group(['prefix' => 'api', 'namespace' => 'Api'], function(){
    Route::get('/playlists', 'PlaylistController@apiIndex');
    //Route::post('/playlist', 'PlaylistController@store');
    Route::get('/playlist', 'PlaylistController@store');
    //Route::post('/song', 'SongController@store');
    Route::get('/song', 'SongController@store');
    //Route::post('/favorite', 'FavoriteController@store');
    Route::get('/favorite', 'FavoriteController@store');
});
