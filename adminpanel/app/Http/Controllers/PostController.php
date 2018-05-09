<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Carbon\Carbon;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->get();
        // $posts = Post::latest();
        //
        // if ($month = request('month')) {
        //     $posts->whereMonth('created_at',
        //     Carbon::parse($month)->month);
        // }
        //
        // if ($year = request('year')) {
        //     $posts->whereYear('created_at', $year);
        // }
        //
        // $posts = $posts->get();

        // $archives = Post::archives();

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
