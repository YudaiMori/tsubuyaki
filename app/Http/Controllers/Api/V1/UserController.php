<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\PostResource;
use App\Http\Resources\V1\UserResource;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * ユーザのプロフィール取得
     * @param Request $request
     * @return UserResource
     */
    public function profile(Request $request)
    {
        return new UserResource($request->user());
    }

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
