<?php

namespace App\Http\Controllers;

use App\Job;
use App\User;

use Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ApplicationController extends Controller{

    /* Create a new controller instance. */
    public function __construct(){
        $this->middleware('auth');
    }

    /* Display applicants view. */
    public function index($id){
        $employer = Auth::user();
        $job = Job::findOrFail($id);

        if(User::findOrFail($job->employerid) == $employer){
            return view('applicants', ["id"=>$job->id, "title"=>$job->title]);
        }
        else{
            return Redirect::route('jobs');
        }
    }
}
