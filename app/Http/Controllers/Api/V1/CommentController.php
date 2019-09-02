<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * コメントするApi
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|String|min:1|max:140'
        ]);

        $comment = new Comment();

        $comment->content = $request->input('content');
        $comment->post_id = $request->input('post_id');
        $comment->user_id = $request->user()->id;

        $comment->save();

        return (new CommentResource($comment))
            ->response()
            ->setStatusCode(201);
    }
}
