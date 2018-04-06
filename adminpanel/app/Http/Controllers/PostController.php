<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostController extends Controller
{
    public function index()
    {
      $posts = Post::latest()->get();

      return view('posts.index', compact('posts'));
    }

    public function show(Post $post) //$id
    {
      // $posts = Post::find($id);
      return view('posts.show', compact('post'));
    }

    public function create()
    {
      return view('posts.create');
    }

    public function store()
    {
      // $post = new \App\Post;

      // $post->title = Request('title');
      // $post->body = Request('body');
      //
      // $post->save();

      // Post::create([
      //   'title' => request('title'),
      //   'body' => request('body')
      // ]);

      $this->validate(request(), [
        'title' => 'required',
        'body' => ' required'
      ]);

      Post::create(request(['title', 'body']));

      return redirect('/');
    }
}
