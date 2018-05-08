<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth')->except(['index', 'show']);
    }

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

      auth()->user()->publish(
          new Post(request(['title', 'body']))
      );

      // // Post::create(request(['title', 'body', 'user_id']));
      // Post::create([
      //     'title' => request('title'),
      //     'body' => request('body'),
      //     'user_id' => auth()->id()
      // ]);

      return redirect('/');
    }
}
