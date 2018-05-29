@extends ('layouts.layout')

@section ('content')

  <div class="col-sm-8">

    <h1>Nieuw topic</h1>

    <hr />

    <form method="POST" action="/posts">

      {{ csrf_field() }}

      <div class="form-group">
          <label for="title">Title:</label>
          <input type="text" class="form-control" id="title" name="title"> <!-- required-->
      </div>

      <div class="form-group">
          <label for="exampleInputPassword1">body</label>
          <textarea name="body" id="body" class="form-control"></textarea><!-- required-->
      </div>

      <div class="form-group">
          <button type="submit" class="btn btn-primary">publish</button>
      </div>


      @include('layouts.errors')
    </form>

  </div>

@endsection
