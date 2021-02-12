<?php

namespace App\Services;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentService
{
    private $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function store(Request $request)
    {
        $this->comment->creator_id = $request->creator_id;
        $this->comment->creator_type = $request->creator_type;
        $this->comment->relation_id = $request->relation_id;
        $this->comment->relation_type = $request->relation_type;
        $this->comment->comment = $request->comment;
        $this->comment->save();

        return $this->comment;
    }
}
