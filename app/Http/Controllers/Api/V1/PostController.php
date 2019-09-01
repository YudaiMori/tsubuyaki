<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\PostResource;
use App\Models\Post;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\Resource;

class PostController extends Controller
{
    /**
     * 投稿一覧を取得するApi
     * @return Post[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $posts = Post::all();

        return PostResource::collection($posts);
    }

    /**
     * 一件の投稿を取得するApi
     * @param Post $post
     * @return PostResource
     */
    public function show(Post $post)
    {
//        $post->load(['user']);

        $post->load(['comments' => function ($query) {
            $query->with(['user']);
        }]);

        return new PostResource($post);
    }

    /**
     * 投稿するApi
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|String|min:1|max:140'
        ]);

        $post = new Post();

        $post->content = $request->input('content');
        $post->user_id = $request->user()->id;

        $post->save();

        return (new PostResource($post))
            ->response()
            ->setStatusCode(201);
    }

}
