<?php

namespace App\Http\Controllers;

use App\User;

use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller{

    /* Create a new controller instance. */
    public function __construct(){
        $this->middleware('auth');
    }

    /* Display profile page. */
    public function index(){
        return view('profile');
    }

    /* Display edit profile page. */
    public function editIndex(){
        return view('edit');
    }

    /* Update user. */
    public function update(Request $request){
        $user = Auth::user();

        $this->validate($request, [
        'name' => 'required|string|regex:/^[a-zA-Z ]+$/|max:255',
        'email' => 'required|string|email|max:255|unique:employers,email,' . $user->id
        ]);

        $user->name=$request['name'];
        $user->email=$request['email'];

        $user->save();

        return Redirect::route('profile');
    }

    /* Delete user. */
    public function delete(){
        $id = Auth::user()->id;   
        User::destroy($id);

        return  Redirect::route('index');
    }
}
