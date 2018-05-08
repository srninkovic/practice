<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;

class CommentsController extends Controller
{

    public function store(Post $post)
    {
        $this->validate(request(), ['body' => 'required|min:2']);

        // $this->validate([
        //   'body' => request('body' => 'required|min:2'),
        //   'user_id' => auth()->id()
        // ]);

        $post->addComment(request('body'));

        return back();
    }
}
