<?php

namespace App\Http\Controllers\Tweets;

use App\Http\Controllers\Controller;
use App\Tweet;

class TweetController extends Controller
{
    public function show(Tweet $tweet)
    {
        return view('tweets.show', compact('tweet'));
    }
}
