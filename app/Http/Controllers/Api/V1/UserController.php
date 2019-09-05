<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * ユーザの投稿一覧
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function myPosts(Request $request)
    {
        $posts = $request->user()->posts()->withCount(['comments'])->latest()->get();

        return PostResource::collection($posts);
    }
}
