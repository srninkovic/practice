<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {
        return view('sessions.login');
    }

    public function store()
    {
        //attempt to authenticate
        if (! auth()->attempt(request(['email', 'password']))){
            return back()->withErrors([
                'message' => 'verkeerde gegevens ingevuld.'
            ]);
        }

        return redirect()->home();
    }

    public function destroy()
    {
      auth()->logout();

      return redirect()->home();
    }
}
