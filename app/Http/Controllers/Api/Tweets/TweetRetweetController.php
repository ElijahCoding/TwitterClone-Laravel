<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Http\Controllers\Controller;
use App\Tweet;
use Illuminate\Http\Request;

class TweetRetweetController extends Controller
{
    public function store(Tweet $tweet, Request $request)
    {
        dd('store');
    }

    public function destroy(Tweet $tweet, Request $request)
    {
        dd('delete');
    }
}
