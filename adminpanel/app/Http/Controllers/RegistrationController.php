<?php

namespace App\Http\Controllers;

use App\User;

class RegistrationController extends Controller
{
  public function create()
  {
      return view('sessions.create');
  }

  public function store()
  {
      //validate
      $this->validate(request(), [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed'
      ]);

      //create save
      // $user = User::create(request(['name', 'email', 'password']));
      $user = User::create([
        'name' => request('name'),
        'email'=> request('email'),
        'password' => bcrypt(request('password'))
      ]);


      //sign in & redirect
      auth()->login($user);
      return redirect()->home();
  }
}
