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

      $this->validate(request(), [
        'title' => 'required',
        'body' => ' required'
      ]);

      auth()->user()->publish(
          new Post(request(['title', 'body']))
      );

      return redirect()->home();
    }

    public function edit($id){
            //get post data by id
            $post = Post::find($id);

            //load form view
            return view('posts.edit', ['post' => $post]);
        }

    public function update($id, Request $request){
        //validate post data
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        //get post data
        $postData = $request->all();

        //update post data
        Post::find($id)->update($postData);

        return redirect()->route('home');
    }

    public function delete($id){
        //update post data
        Post::find($id)->delete();

        return redirect()->route('home');
    }
}
