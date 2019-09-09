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
     * ユーザのプロフィール更新
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $user = $request->user();

        $this->validate($request, [
            'name' => 'string|min:1|max:50',
            'introduction' => 'nullable|string|max:160',
        ]);

        if ($request->input('name')) {
            $user->name = $request->input('name');
        }

        $user->update();

        return (new UserResource($user))
        ->response()
        ->setStatusCode(200);
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
