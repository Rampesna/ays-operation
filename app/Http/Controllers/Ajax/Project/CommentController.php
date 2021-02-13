<?php

namespace App\Http\Controllers\Ajax\Project;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create(Request $request)
    {
        $comment = (new CommentService(new Comment))->store($request);
        return response()->json(Comment::with(['creator'])->find($comment->id), 200);
    }

    public function edit(Request $request)
    {
        return response()->json(Comment::with(['creator'])->find($request->comment_id));
    }

    public function update(Request $request)
    {
        $comment = (new CommentService(Comment::find($request->comment_id)))->store($request);
        return response()->json(Comment::with(['creator'])->find($comment->id), 200);
    }

    public function delete(Request $request)
    {
        Comment::find($request->comment_id)->delete();
    }
}
