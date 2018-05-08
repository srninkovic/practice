@extends('layouts.layout')

@section('content')

    <div class="col-md-8">

        <h1>Register</h1>

        <form method="POST" action="/register">
          {{ csrf_field() }}

          <div class="form-group">
              <label for="name">Naam: </label>
              <input type="text" class="form-control" id="name" name="name" required/>
          </div>

          <div class="form-group">
              <label for="email">E-mail: </label>
              <input type="email" class="form-control" id="email" name="email" required/>
          </div>

        <div class="form-group">
            <label for="password">Wachtwoord: </label>
            <input type="password" class="form-control" id="password" name="password" required/>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Herhaal Wachtwoord: </label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required/>
        </div>

      <div class="form-group">
          <button type="submit" class="btn btn-primary">Registreer gebruiker</button>
      </div>

      <div class="form-group">
          @include ('layouts.errors')
      </div>
    </form>

    </div>

@endsection
