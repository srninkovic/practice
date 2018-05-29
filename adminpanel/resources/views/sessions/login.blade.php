<!-- @extends('layouts.layout') -->

 <!-- @section('content') -->

    <div class="col-md-6 offset-md-3">

        <h1>Login</h1>

        <form method="POST" action="/login">
          {{ csrf_field() }}

          <div class="form-group">
              <label for="email">E-mail: </label>
              <input type="email" class="form-control" id="email" name="email" required/>
          </div>

        <div class="form-group">
            <label for="password">Wachtwoord: </label>
            <input type="password" class="form-control" id="password" name="password" required/>
        </div>

      <div class="form-group">
          <button type="submit" class="btn btn-primary">Login</button>
      </div>

      <div class="form-group">
          @include ('layouts.errors')
      </div>
    </form>
    </div>

<!-- @endsection -->
