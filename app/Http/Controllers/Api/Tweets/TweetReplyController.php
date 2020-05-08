<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Events\Tweets\TweetRepliesWereUpdated;
use App\Http\Controllers\Controller;
use App\Tweet;
use App\TweetMedia;
use App\Tweets\TweetType;
use Illuminate\Http\Request;

class TweetReplyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->only('store');
    }

    public function store(Tweet $tweet, Request $request)
    {
        $reply = $request->user()->tweets()->replies()->create(array_merge($request->only('body'), [
            'type' => TweetType::Tweet,
            'parent_id' => $tweet->id
        ]));

        foreach($request->media as $id) {
            $tweet->media()->save(TweetMedia::find($id));
        }

        broadcast(new TweetRepliesWereUpdated($tweet));
    }
}
