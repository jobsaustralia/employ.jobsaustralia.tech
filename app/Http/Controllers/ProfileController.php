<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile');
    }

 //update logged in user profie
    public function updateProfile(Request $request)
  {
    $user = $request->user();
    /* Validate incoming data */
    $this->validate($request, [
        'name' => 'required|string|regex:/^[a-zA-Z ]+$/|max:255',
        'email' => 'required|string|email|max:255|unique:employers,email,' . $user->id
    ]);

    //You can get a User's current ID like this.
    $id = Auth::user()->id;

    $user = User::findOrFail($id);
    $user->name=$request['name'];
    $user->email=$request['email'];

    $user->save();

    return Redirect::route('profile');
  }

}
