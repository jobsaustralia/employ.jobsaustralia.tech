<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\JobSeeker;
use App\Application;
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

    /**
     * Show edit profile form.
     *
     * @return \Illuminate\Http\Response
     */
    public function editIndex()
    {
        return view('edit');
    }

    /**
     * Update profile.
     *
     * @param  Illuminate\Http\Request  $request
     * @return Illuminate\Support\Facades\Redirect
     */
    public function updateProfile(Request $request)
    {
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

    /**
     * Delete account.
     *
     * @return Illuminate\Support\Facades\Redirect
     */
    public function delete()
    {
        $id = Auth::user()->id;   
        User::destroy($id);

        return  Redirect::route('index');
    }

    public function getUser(){
        return Auth::user();
    }

    public function getExperience($id){
        $user = JobSeeker::findOrFail($id);
        $employer = Auth::user();
        $applications = Application::where('userid', $user->id)->get();

        $flag = true;
        foreach($applications as $application){
            if(User::findOrFail($application->employerid) != $employer){
                $flag = false;
                break;
            }
        }

        if($flag == true){
            return $user->experience;
        }
        else{
            return null;
        }
    }
}
