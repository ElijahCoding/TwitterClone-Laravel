<?php

namespace App\Http\Controllers\Api\Timeline;

use App\Http\Controllers\Controller;
use App\Http\Resources\TweetCollection;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function index(Request $request)
    {
        $tweets = $request->user()
                    ->tweetsFromFollowing()
                    ->latest()
                    ->with([
                        'user',
                        'likes',
                        'retweets',
                        'media.baseMedia',
                        'originalTweet.user',
                        'originalTweet.likes',
                        'originalTweet.retweets',
                        'originalTweet.media.baseMedia',
                    ])
                    ->paginate(8);

        return new TweetCollection($tweets);
    }
}
