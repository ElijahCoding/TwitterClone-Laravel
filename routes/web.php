<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/notifications','Notifications\NotificationController@index');

Route::get('/tweets/{tweet}', 'Tweets\TweetController@show');
