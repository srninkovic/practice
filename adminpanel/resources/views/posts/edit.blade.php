@extends('layouts.layout')

@section ('content')
<div class="col-sm-8 blog-main">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Post
            </div>
            <div class="panel-body">
                <form action="{{ route('posts.update', $post->id) }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Content</label>
                        <div class="col-sm-10">
                            <textarea name="body" id="body" class="form-control" value="{{ $post->body }}">{{ $post->body }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-default" value="Update Post" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="form-group">
            @include ('layouts.errors')
        </div>
      </div>

@endsection
