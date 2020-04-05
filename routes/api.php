<?php

use Illuminate\Support\Facades\Route;

Route::get('/timeline', 'Api\Timeline\TimelineController@index');
Route::post('/tweets', 'Api\Tweets\TweetController@store');

Route::post('/tweets/{tweet}/likes', 'Api\Tweets\TweetLikeController@store');
